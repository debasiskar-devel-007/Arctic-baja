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


 <!--banner-->

   <div class="inner-banner" style="background: url('<?php echo $bannerpath;?>') no-repeat scroll center top rgba(0, 0, 0, 0) !important;">
       <div class="container">
           <h1><?php echo $this->GetcontentByid(90,$res) ?></h1>
       </div></div>

   <div class="container">

       


       <div class="inner-text1" style="border:none; margin-top:-30px;">
           <h6><?php echo $this->GetcontentByid(91,$res) ?></h6>
       <strong><?php echo $this->GetcontentByid(92,$res) ?></strong>
<br />
<br />
           <?php echo $this->GetcontentByid(93,$res) ?>

</div>
<div class="inner-text1" style="border:none;">
  <h6><?php echo $this->GetcontentByid(94,$res) ?></h6>
    <?php echo $this->GetcontentByid(95,$res) ?>
  
</div>
<div class="inner-text1" style="border:none; ">
  <h6><?php echo $this->GetcontentByid(96,$res) ?></h6>
    <?php echo $this->GetcontentByid(97,$res) ?>
  
   </div>

<div class="inner-text1" style="border:none;">
  <h6><?php echo $this->GetcontentByid(98,$res) ?></h6>
    <?php echo $this->GetcontentByid(99,$res) ?>
       </div>
       
       
       <div class="inner-text1" style="border:none;">
  <h6> <?php echo $this->GetcontentByid(100,$res) ?></h6>
  <img src="<?php echo $themeurl ?>/images/sg100.png" alt="" style="display:block; margin:0 auto; margin-bottom:25px">
           <?php echo $this->GetcontentByid(101,$res) ?>

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

         <img src="<?php echo $themeurl ?>/images/footer-devider.png" alt="#"  style="width:100%; display:block; margin:30px auto;"/>
         <?php echo $this->GetcontentByid(24,$res)?>




