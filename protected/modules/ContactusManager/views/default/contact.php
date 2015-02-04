<?php  $themeUrl = Yii::app()->theme->baseUrl;
$base =  Yii::app()->request->baseUrl;


?>





<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm',
    array(
        'id' => 'horizontalForm',
        'type' => 'horizontal',
        'enableClientValidation' =>true,


        'action'=>$base.'/Contactus/default/index',
    )
); ?>



<?php echo $form->textFieldRow(
    $model,
    'name',
    array('placeholder'=>'Name','class'=>'cinput1')
); ?>


<?php echo $form->textFieldRow(
    $model,
    'email',
    array('placeholder'=>'Email','class'=>'cinput1')
); ?>


<?php echo $form->textFieldRow(
    $model,
    'phone',
    array('placeholder'=>'Phone','class'=>'cinput1')
); ?>

<?php echo $form->textAreaRow(
    $model,
    'message',
    array('placeholder'=>'Message','class'=>'cinput2')
); ?>

<div class="clear"></div>

<?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Submit',
        'htmlOptions' => array('class'=>'subbtn1'),
    )
); ?>



<?php
$this->endWidget(); ?>
        
