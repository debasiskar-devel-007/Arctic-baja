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

        <?php echo $form->textFieldRow($model, 'news_link'); ?>



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

