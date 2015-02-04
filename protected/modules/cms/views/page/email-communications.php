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
           <h1><?php echo $this->GetcontentByid(115,$res) ?></h1>
       </div></div>

   <div class="container">

       


       <div class="inner-text1" style="border:none; padding-top:30px;">
           <h5><?php echo $this->GetcontentByid(116,$res) ?></h5>
  <strong><?php echo $this->GetcontentByid(117,$res) ?></strong><br />
<br />

           <?php echo $this->GetcontentByid(118,$res) ?>

</div>
<div class="inner-text1" style="border:none;">
  <h6> <?php echo $this->GetcontentByid(119,$res) ?></h6>

    <?php echo $this->GetcontentByid(120,$res) ?>
  <!--<ul>
 <li> Hosted Microsoft Exchange</li>
    <li> Online Backup & Archiving</li>
   <li>  Google Apps Integration</li>
    <li> Website Hosting</li>
   <li>  Email Marketing</li>
   <li>  Business Apps</li>
  <li>   Cloud File Sharing</li>


  </ul>-->
  
</div>

 <div class="inner-text1" style="border:none;">
           <h6><?php echo $this->GetcontentByid(121,$res) ?></h6>

     <?php echo $this->GetcontentByid(122,$res) ?>
           
           </div>












       <div class="inner-text1"  style="border-bottom:none; border-top: solid 1px #1189d5; padding-top:30px;">
           <h6>Beto Paredes</h6>
           Chief Executive Officer
           <!--<img src="<?php /*echo $themeurl */?>/images/beto.png" alt="" style="display:block; margin:15px auto;">-->
           <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(102,$res)?>" style="display:block; margin:15px auto;" >
           <?php echo $this->GetcontentByid(103,$res) ?>

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







