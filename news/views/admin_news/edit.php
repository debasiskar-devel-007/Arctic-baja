<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('news').'/assets/js/jquery.Jcrop.js'), CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('news').'/assets/css/uploadify.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('news').'/assets/css/jquery.Jcrop.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('news').'/assets/css/facebox.css'));


?>

<div id="main">
    <div id="content">

        <h2 id="pageTitle">Edit News</h2>

        <?php

        $imagesize = Yii::app()->params['news_image_size'];
        //if(is_array($mod['image']))
            //$previmage = array_unique(array_merge($previmage, $mod['image']));;
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
        
         <div class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">User Image</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload1" name="file_upload1" type="file" multiple="false">
            </div>

            <div id="show_thumb" style="margin-left:235px">
                <?php //foreach($res as $row){ if (file_exists("./uploads/product_image/thumb/".$row['imag_name'])) 
                
                if($model['user_image']!='' )
                {?>
                    <div class="imglist" style="position:relative; width:150px; margin-bottom:10px;">
                    <a href="javascript:void(0);">
                    <img name="<?php echo $model['user_image'];?>" src="<?php echo Yii::app()->request->baseUrl;?>/uploads/proimage/thumb/<?php echo $model['user_image'];?>" style="max-height:150px;max-width:150px; border:solid 1px #979797;margin-left:0px" /></a></br><input type="button" class="crop_btn" onclick="crop_image1('<?php echo $model['user_image'];?>')" value="Crop"><input type="button" style="margin-left:5px;" class="crop_btn" onclick="del_up_image(this)" value="Delete"><input type="hidden" name="News[user_image]" value="<?php echo $model['user_image'];?>" /></div>
                    <?php //}
                
                }?>
                <div id="clr" class="clear:both;"></div>
            </div>
        </div>
        <div id="youtube_video" class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">Video :</label>
            <div id="upvideo1" style="margin-left: 235px;margin-bottom:35px; ">

                <div id="file_upload_video-button1" class="uploadify-button " style="height: 30px; line-height: 30px; ">
                    <span class="uploadify-button-text">SEARCH YOUTUBE</span>
                </div>
                <!--<input type="hidden" id="y_vid_name" name="Newsvid['name'][]"  value="<?php /*echo $mod->name;*/?>">-->
            </div>
            <span id="Video_name_err" class="help-inline error" style="margin-left: 180px; margin-bottom: 20px;"><?php echo @$val_error['name'][0];?></span>

            <div id="show_thumb1" style="margin-left:235px" style="display:none" >


            <?php

            if(is_array($mod1)){
            foreach($mod1 as $a)
            {

            ?>
            <div style="width:480px;height:320px"><object width="480" height="320">
                    <param value="http://www.youtube-nocookie.com/v/'<?php echo $a['name'] ?>?version=3&hl=en_US name=movie">
                    <param value="true" name="allowFullScreen"><param value="always" name="allowscriptaccess">
                    <embed width="480" height="320" wmode="opaque" allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="http://www.youtube-nocookie.com/v/<?php echo $a['name'] ?>?version=3&hl=en_US"></object>
                <img class="closeImg2" src="<?php echo yii::app()->getBaseUrl(true) ?>/images/close.png" title="Close Image"  style="margin-bottom:180px;" onclick="removeVideo(this)">
                <input type="hidden"  name="Newsvid[name][]"  value="<?php echo $a['name'] ?>">

            </div>

                <br /><br /><br />
            <?php }} ?>

            </div>
        </div>

        <div class="input-box" style="margin-top:20px;" >
            <label for="profile_pr_image" class="control-label required">News Image</label>
            <div id="upImage" style="margin-left: 235px;margin-bottom:35px; ">
                <input id="file_upload2" name="file_upload2" type="file" multiple="false">
            </div>

            <div id="show_thumb2">
                <?php if(count($previmage)){
                    foreach($previmage as $val){
                        ?>
                        <div class="imglist-box2"><img src="<?php echo yii::app()->getBaseUrl(true)?>/images/close.png" class="closediv" onclick="delImage('<?php echo $val;?>',this)">
                            <?php foreach($imagesize as $size){ ?>
                                <div class="image-main-div">
                                    <img style="max-height:150px;max-width:150px; border:solid 1px #979797;" src="<?php echo Yii::app()->getBaseUrl(true);?>/uploads/news_image/thumb/<?php echo $size[0];?>X<?php echo $size[1];?>/<?php echo $val;?>" name="<?php echo $val;?>" folder="<?php echo $size[0];?>X<?php echo $size[1];?>">
                                    <div class="crop-img"><img src="<?php echo yii::app()->getBaseUrl(true)?>/images/crop.png" onclick="crop_image('<?php echo $val;?>','<?php echo $size[0];?>','<?php echo $size[1];?>')"></div>
                                </div>
                            <?php } ?>
                            <input type="hidden" name="NewsImg[image][]" value="<?php echo $val;?>" />
                            <div style="clear: both;"></div>
                        </div>
                    <?php }} ?>
                <div id="clr" class="clear:both;"></div>
            </div>
        </div>

        <?php echo $form->toggleButtonRow($model, 'news_status',array('options'=>array('enabledLabel'=>'Active' , 'disabledLabel'=>'Inactive','width' => '150'))); ?>

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

