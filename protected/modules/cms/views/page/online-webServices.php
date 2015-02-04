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
           <h1><?php echo $this->GetcontentByid(123,$res) ?></h1>
       </div></div>

   <div class="container">

       


       <div class="inner-text1" style="border:none; margin-top:-30px;">
           <h6><?php echo $this->GetcontentByid(124,$res) ?></h6>
           <!--<img src="<?php /*echo $themeurl */?>/images/o1.jpg" alt="" style="display:block; margin:0 auto; margin-bottom:25px; border-radius:6px; box-shadow:1px 1px 5px #888; padding:5px;">-->
           <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(125,$res)?>" style="display:block; margin:0 auto; margin-bottom:25px; border-radius:6px; box-shadow:1px 1px 5px #888; padding:5px;">

           <?php echo $this->GetcontentByid(126,$res) ?>
</div>




       
       
       <div class="inner-text1" style="border:none;">
  <h6><?php echo $this->GetcontentByid(127,$res) ?></h6>
           <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(128,$res)?>" style="display:block; margin:0 auto; margin-bottom:25px; border-radius:6px; box-shadow:1px 1px 5px #888; padding:5px;">
           <?php echo $this->GetcontentByid(129,$res) ?>

       </div>
       
       
           
       <div class="inner-text1" style="border:none;">
  <h6><?php echo $this->GetcontentByid(130,$res) ?></h6>
           <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(131,$res)?>" style="display:block; margin:0 auto; margin-bottom:25px; border-radius:6px; box-shadow:1px 1px 5px #888; padding:5px;">
           <?php echo $this->GetcontentByid(132,$res)?>

       </div>


       <div class="inner-text1" style="border:none;">
           <h6><?php echo $this->GetcontentByid(133,$res) ?></h6>
           <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(134,$res)?>" style="display:block; margin:0 auto; margin-bottom:25px; border-radius:6px; box-shadow:1px 1px 5px #888; padding:5px;">
           <?php echo $this->GetcontentByid(135,$res)?>

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





