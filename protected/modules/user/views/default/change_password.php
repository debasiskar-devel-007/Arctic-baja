<?php
    $baseUrl =  Yii::app()->baseurl;
    $themeUrl = Yii::app()->theme->baseUrl;  
?>




 <div class="inner-wrapper" style="width:100%;">
<!-- login-left-->
   
 
 <!-- login-left end -->
<!-- login-form-->
 <div class="login-form">
   <div class="logintop">

        <h2 id="pageTitle">Change Password</h2> 
        
        </div>                                                    


        <div class="login-body">  

        <?php /** @var TbActiveForm $form */
            $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation' =>true, 
            )
            ); ?>                
              <?php


                        $this->widget('bootstrap.widgets.TbAlert', array(
                        'block' => true,
                        'fade' => true,
                        'closeText' => '&times;', // false equals no close link
                        'events' => array(),
                        'htmlOptions' => array(),
                        //'userComponentId' => 'user',
                        'alerts' => array( // configurations per alert type
                        // success, info, warning, error or danger
                        'success' => array('closeText' => '&times;'),
                        'info', // you don't need to specify full config
                        'warning' => array('block' => false, 'closeText' => false),
                        'error' => array('block' => false, 'closeText' => 'AAARGHH!!')
                        ),
                        ));
                    ?>                
        


        <?php echo $form->passwordFieldRow(
            $model,
            'new_password',
            array('placeholder'=>'Enter new Password')
            ); ?>

        <?php echo $form->passwordFieldRow(
            $model,
            'new_conf_password',
             array('placeholder'=>'Confirm Password')
            ); ?>

 

        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Submit',
            'htmlOptions' => array('class'=>'button'),
            ) 
            ); ?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array('buttonType' => 'reset', 'label' => 'Cancel','htmlOptions' => array('class'=>'button','onclick'=>'javascript:window.location.href=\''.$baseUrl.'/user/default/login/\''))
            ); ?>

        <?php
            $this->endWidget(); ?>
    <div class="clear"></div>

 </div>
    <div class="loginbottom">
   
   
   </div>
 
 </div>
 
 <!-- login-form end -->
 
 <div class="clear"></div>
 </div>


