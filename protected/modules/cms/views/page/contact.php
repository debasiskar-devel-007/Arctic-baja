 <?php $themeurl=yii::app()->theme->baseurl;
 $banner = Addicontentinfo::model()->fetchupdatedetails(5);

 $bannerpath =  $themeurl."/images/innerbg.png";

 if(count($banner)){
     $bannerpath =  yii::app()->getBaseUrl(true)."/uploads/content_image/originalsize/".$banner[0]['content_type'];
 }



 ?>

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


 <script type="text/javascript">
 $(document).ready(function(){


 var flag = '<?php echo @Yii::app()->session['contactsubmitvar']; ?>';
 //alert(flag);
 if(flag == 1)
 {

 //bootbox.dialog("<div style=color:#000000>Thank You! We will Contact You Soon.</div>");
  bootbox.alert("Hello world!");
 $.get(base_url+'/ContactusManager/default/resetsession',function(res){


 });
 }


 });
 </script>

<!--banner-->

   <div class="inner-banner" style="background: url('<?php echo $bannerpath;?>') no-repeat scroll center top rgba(0, 0, 0, 0) !important;">
       <div class="container">
           <h1><?php echo $this->GetcontentByid(136,$res) ?></h1>
       </div></div>

   <div class="container">
   


      <div class="row">
  <div class="col-md-6">
  
     <div class="contact-box">
    <h2>Please fill out the form below</h2>

        <?php $this->renderPartial('ContactusManager.views.default.contact',array('model'=>new Contact())); ?>







         <!-- <label>Full Name: (REQUIRED) </label>

             <input type="text" class="cinput1" />

             <label> Email: (REQUIRED) </label>

             <input type="text" class="cinput1" />


               <label> Phone Number:  </label>

             <input type="text" class="cinput1" />


                   <label> Message: </label>
                <textarea class="cinput2"></textarea>

                <input type="submit" value="Submit" class="subbtn1" />-->
      </div>
  
  </div>
  
    <div class="col-md-6">  
    
    <div class="contact-address">
    
    <img src="<?php echo $themeurl ?>/images/logo.png" alt="#"  style=" display:block;"/>
        <?php echo $this->GetcontentByid(137,$res) ?>

    
    </div>
    
    
    
      </div>











   </div>
  
     </div>





 <div class="footer-block">
     <div class="container">
         <h4><?php echo $this->GetcontentByid(21,$res)?></h4>
         <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
         <span><a href="#" page_ink_id="16" pagename="desktop">Desktop Computer repair</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
         <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
         <span><a href="#" page_ink_id="17" pagename="homesupport">In-Home Support</a></span>

         <img src="<?php echo $themeurl ?>/images/footer-devider.png" alt="#"  style="width:100%; display:block; margin:30px auto;"/>
         <h4><?php echo $this->GetcontentByid(22,$res)?></h4>
         <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
         <span><a href="#" page_ink_id="18" pagename="itsupport">Onsite & Remote IT</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
         <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
         <span><a href="#" page_ink_id="19" pagename="itconsulting">IT Consulting</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
         <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
         <span><a href="#" page_ink_id="20" pagename="emails">Email & Communications</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
         <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
         <span><a href="#" page_ink_id="21" pagename="onlineservices">Online Services</a></span>
         <img src="<?php echo $themeurl ?>/images/footer-devider.png" alt="#"  style="width:100%; display:block; margin:30px auto;"/>

         <h4><?php echo $this->GetcontentByid(23,$res)?></h4>
         <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
         <span><a href="http://www.influxiq.com/" target="_blank">InfluxIQ Dev Drp</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
         <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
         <span><a href="http://www.spectrumiq.com/" target="_blank">SpectrumIQ Finders</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
         <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
         <span><a href="http://www.titostv.com/" target="_blank">Tito's TV</a></span>
         <img src="<?php echo $themeurl ?>/images/footer-devider.png" alt="#"  style="width:100%; display:block; margin:30px auto;"/>
         <?php echo $this->GetcontentByid(24,$res)?>






