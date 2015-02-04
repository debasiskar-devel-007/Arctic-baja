 <?php $themeurl=yii::app()->theme->baseurl;
 
 $model = new InfluxiqApplyDetails();

 ?>
<style>
#add-note label{
    display: none !important;
}
</style>

 <script>
     $(function(){
         $('.plink').parent().removeClass('active');
         $('.plink').closest('li.dropdown').removeClass('active');
         $('.plink').each(function(){
             var pagename = $(this).attr('pagename');
             if($(this).closest('li.dropdown').length){


                 if(pagename == '<?php echo $pagename;?>'){
                     $(this).closest('li.dropdown').addClass('active');
                     return false;
                 }
             }else{

                 if(pagename == '<?php echo $pagename;?>'){
                     $(this).parent().addClass('active');
                     return false;
                 }
             }

         });
     });

 </script>


     <div class="container">
     

   
   
    
    
    <div class="hosting-div" style="margin:25px 0 0 0;">
      <img src="<?php  echo $themeurl?>/images/services-banner.jpg"  alt="#"/>
      
      </div>
      
      
       
       
       <div class="aboutbox">
<div class="aboutbox_left">
InfluxIQ brings a new level of professional attention to every project that we work on. We are Engineers not just developers. We will help you bring your vision to life with our unique approach to custom development.
</div>
<div class="aboutbox_right">
<div id="downbutton">
<a class="buttondown" href="#"></a>
</div>
</div>

<div class="clear"></div>
</div>



   <div class="specialsubconts">
    <div class="row">
  <div class="col-md-4">  <img src="<?php  echo $themeurl?>/images/service_topbg.png"  alt="#"/></div>
  <div class="col-md-8">
  <h5>Specialties</h5>
  <ul>
<li>Senior Level Software Engineering and Architectural Design</li>
<li>Advanced Web Development in LAMP (Linux, Apache Server, MySQL and PHP)</li>
<li>Advanced Language Experience including XML, AJAX, SOAP and JavaScript</li>
<li>Mobile HTML5 Language and SDK Experience</li>
<li>UI / UX / CSS Interface Blueprinting and Design</li>
<li>Website Design for Large and Small Business</li>
<li>Facebook Open Graph Development for Websites</li>
<li>Online Video Portal Development for YouTube and Self Hosted Plaforms</li>
<li>Brand and Marketing Management for Online Product Sales</li>
<li>Custom eCommerce Scripting for a Variety of Platforms</li>
<li>API Gateway Scripting for PayPal, Authorize.net, NMI and Several Others</li>
<li>Opensource Scripting for Joomla, Zen Cart and Word Press</li>
</ul>
  
  <h5 style="padding-bottom:25px;">Get a hold of us </h5>
  
  
  <div class="specialsubconts-form">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'add-note',
    'enableAjaxValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    )
)); ?>

<?php echo $form->hiddenField(
    $model,
    's_product_id',array('value'=>'Custom Services')
); ?>

<?php echo $form->hiddenField(
    $model,
    's_aff_type',array('value'=>'services')
); ?>

<?php echo $form->textFieldRow(
    $model,
    's_app_name',array('placeholder'=>'Name','class'=>'loginbox')
); ?>

<?php echo $form->textFieldRow(
    $model,
    's_email',array('placeholder'=>'Email','class'=>'loginbox')
); ?>

<?php echo $form->textAreaRow(
    $model,
    's_comment',array('placeholder'=>'Questions - Comments','class'=>'loginarea')
); ?>
<!--
<input id="pack1" type="hidden" value="Custom Services" name="pack">
<input id="name1" class="loginbox" type="text" placeholder="Name" name="name">
<input id="email1" class="loginbox" type="text" placeholder="Email" name="email">
<textarea id="comments1" class="loginarea" rows="" cols="" name="comments" type="textarea" placeholder="Questions - Comments"></textarea>-->
 <?php  echo CHtml::ajaxSubmitButton(
            'Send',
            Yii::app()->createUrl('cms/page/addapply'),
            array(
                'dataType'=>'json',
                'type' => 'POST',
                'data' => "js:$('#add-note').serialize()",
                'success'=>'function(data){
                    if(data["msg"]=="success"){
                         bootbox.dialog("Apply Successfully");
                         setTimeout(function(){bootbox.hideAll();},2000);
                         
                         $("#InfluxiqApplyDetails_s_app_name").val("");
                         $("#InfluxiqApplyDetails_s_email").val("");
                         $("#InfluxiqApplyDetails_s_comment").val("");

                    }else{
                        formerrorshow($("#add-note"),data["val"]);
                    }
                    }',

               // 'beforeSend'=>'before',
            ),
            array(
                'class'=>'Send_btn2'
            )
        );
        ?>

    <?php $this->endWidget() ?></div>
  </div>
  </div>
  
  
  </div>

      
      <div class="Botomorgarea">
<div class="Botomcontsection">
<h5 style="color:#fff; font-size:24px;">Industries we have Experience in</h5>
<div class="Botomcontsection_left">
<ul>
<li>Direct Response Marketing (CPA / Affiliate)</li>
<li>Multi-Level Marketing (Core Development and Marketing Systems)</li>
<li>Human Resources and Payroll</li>
<li>Massive Social Network Development</li>
</ul>
</div>
<div class="Botomcontsection_right">
<ul>
<li>Small Business and Local Search</li>
<li>Sales Organization and CRM Technologies</li>
<li>Portal Based Subscription Systems</li>
<li>Online eCommerce Web Stores</li>
</ul>
</div>

<div class="clear"></div>
</div>
</div>
      
      
   <div class="aboutbox">
<div class="aboutbox_left">
InfluxIQ brings a new level of professional attention to every project that we work on. We are Engineers not just developers. We will help you bring your vision to life with our unique approach to custom development.
</div>
<div class="aboutbox_right">
<div id="downbutton">
<a class="buttondown" href="#"></a>
</div>
</div>

<div class="clear"></div>
</div>   
 
</div>
   






 <div class="footer-block">
     <div class="container">






