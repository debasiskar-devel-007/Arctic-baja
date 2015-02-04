<?php 
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('news').'/assets/js/jquery.Jcrop.js'), CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('news').'/assets/css/uploadify.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('news').'/assets/css/jquery.Jcrop.css'));
    Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('news').'/assets/css/facebox.css'));

    
?>

<div id="main">
    <div id="content">

        <h2 id="pageTitle">Add A News</h2>

        <?php

        $imagesize = Yii::app()->params['news_image_size'];
        $previmage = $mod1['name'];
            $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation' =>true, 
            )
            ); 

        ?>

        <?php echo $form->textFieldRow($model, 'news_title'); ?><br />
        <?php echo $form->ckEditorRow($model, 'news_desc', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));?>
        <?php echo $form->textFieldRow($model, 'postby',array('class'=>'firstname')); ?><br />
        
                <!--<div class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">Image</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload1" name="file_upload1" type="file" multiple="false">
            </div>

            <div id="show_thumb" style="margin-left:235px">
            <div id="clr" class="clear:both;"></div>
            </div>
        </div> -->
        <?php echo $form->textFieldRow($model, 'news_link'); ?>

        <?php echo $form->toggleButtonRow($model, 'news_status',array('options'=>array('enabledLabel'=>'Active' , 'disabledLabel'=>'Inactive','width' => '150'))); ?>

		<!-- <?php /*echo $form->toggleButtonRow($model, 'isvideo',array('options'=>array('enabledLabel'=>'Youtube' , 'disabledLabel'=>'Desktop','width' => '150'))); */?>
        
		<div id="desktop_video" class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">Video :</label>
            <div id="upvideo" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload_video1" name="file_upload_video" type="file" multiple="false">
                <div style="display:inline-block;margin:-20px 0 0 200px;color:#ff0000">
                    (only flv,3gp,mp4,wmv,mpg,asf are allowed)
                </div>
                   
            </div>
            

            <div id="show_thumb1" style="margin-left:235px">
                <div class="vid1">
                <?php /*if(!empty($model->name) && $model->isvideo==0){*/?>
                <div>
                    <div style="margin-top:-20px;margin-left:5px;position:relative">
                        <a href="<?php /*echo Yii::app()->getBaseUrl(true);*/?>/uploads/video/converted/<?php /*echo $model->name;*/?>" target="_blank"></a>
                        <a href="<?php /*echo Yii::app()->getBaseUrl(true);*/?>/uploads/video/converted/<?php /*echo $model->name;*/?>" id="player" style="display:block;width:400px;height:300px;margin:10px;padding:1px;border:2px solid #ccc" > </a>
                    </div>
                </div>
                <script>
                $(function(){
                    flowplayer("player" ,base_url+'/swf/flowplayer.commercial-3.2.15.swf',{clip:{autoPlay:false}});
                })
                </script>
                <?php /*} */?>
                </div>
            <div id="clr" class="clear:both;"></div>
            </div>
        </div>-->
		
<!--		<div id="youtube_video" class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">Video :</label>
            <div id="upvideo1" style="margin-left: 235px;margin-bottom:35px; ">

                <div id="file_upload_video-button1" class="uploadify-button " style="height: 30px; line-height: 30px; ">
                    <span class="uploadify-button-text">SEARCH YOUTUBE</span>
                </div>

            </div>
            <span id="Video_name_err" class="help-inline error" style="margin-left: 180px; margin-bottom: 20px;"><?php /*echo @$val_error['name'][0];*/?></span>

            <div id="show_thumb1" style="margin-left:235px" style="display:none" >

            </div>
        </div>

        <div class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">News Image</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload2" name="file_upload2" type="file" multiple="false">
            </div>

            <div id="show_thumb2">
                <?php /*if(count($previmage)){
                    foreach($previmage as $val){
                        */?>
                        <div class="imglist-box2"><img src="<?php /*echo $this->actionGetAssetsUrl();*/?>/images/closenew.png" class="closediv" onclick="delImage('<?php /*echo $val;*/?>',this)">
                            <?php /*foreach($imagesize as $size){ */?>
                                <div class="image-main-div">
                                    <img style="max-height:150px;max-width:150px; border:solid 1px #979797;" src="<?php /*echo Yii::app()->getBaseUrl(true);*/?>/uploads/news_image/thumb/<?php /*echo $size[0];*/?>X<?php /*echo $size[1];*/?>/<?php /*echo $val;*/?>" name="<?php /*echo $val;*/?>" folder="<?php /*echo $size[0];*/?>X<?php /*echo $size[1];*/?>">
                                    <div class="crop-img"><img src="<?php /*echo $this->actionGetAssetsUrl();*/?>/images/crop.png" onclick="crop_image('<?php /*echo $val;*/?>','<?php /*echo $size[0];*/?>','<?php /*echo $size[1];*/?>')"></div>
                                </div>
                            <?php /*} */?>
                            <input type="hidden" name="NewsImg[image][]" value="<?php /*echo $val;*/?>" />
                            <div style="clear: both;"></div>
                        </div>
                    <?php /*}} */?>
                <div id="clr" class="clear:both;"></div>
            </div>
        </div>-->



        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); 
        ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>

        <?php
            $this->endWidget(); 

        ?>
          <?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal-img','htmlOptions'=>array('style'=>'left:30%;width:80%;display:none;'))
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Image</h4>
</div>

<div class="modal-body">

</div>

<div class="modal-footer">
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
        'type' => 'primary',
        'label' => 'Crop',
        'id' =>'sub_image',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal','class'=>'btn'),
        )
        ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal','class'=>'btn'),
        )
        ); ?>
    </div>
 
<?php $this->endWidget(); ?>
            <!-- Modal for crop Image [end] -->

        <?php $this->beginWidget(
            'bootstrap.widgets.TbModal',
            array('id' => 'selyoutubevid',
                'htmlOptions'=>array('style'=>'width:80%;left:33%;display:none;'),

            )
        ); ?>

        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>

            <div style="width:420px; margin:0 auto;"> <h4>Search Video : </h4>
                <div style="display:inline-block;margin:-25px 0 0 -171px;color:#ff0000">
                    Press enter after put your search keyword
                </div>
                <input type="text" id="youtube_txt" >

                <div style="clear:both;"></div>
            </div>
        </div>

        <div class="modal-body" style="margin: 0 auto; width:90%;text-align:center;overflow: inherit;height: auto ">

            <div id="videos2" style="width:100%;"></div>
        </div>



        <?php $this->endWidget(); ?>


    </div>   
</div>   

