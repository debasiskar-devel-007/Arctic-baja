

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
           <h1><?php echo $this->GetcontentByid(68,$res) ?></h1>
       </div></div>

   <div class="container">

       <div class="inner-gallery-contain">
           <div class="gallery-wrapper">
               <ul class="rslides" id="banner1">
                   <?php $htmlcontent  = " <li><img src='htmlcontent1'  alt='#'/></li>     ";

                   echo  $this->getmultipleContent(70,$res,$htmlcontent);
                   ?>
                  <!-- <li><img src="<?php /*echo $themeurl */?>/images/4.jpg" alt=""></li>
                   <li><img src="<?php /*echo $themeurl */?>/images/5.jpg" alt=""></li>
                   <li><img src="<?php /*echo $themeurl */?>/images/6.jpg" alt=""></li>-->
               </ul>


           </div>

       </div>


       <div class="inner-text1">
           <h2 style="background-image:url(<?php echo $themeurl ?>/images/hicon.png)"><?php echo $this->GetcontentByid(71,$res) ?></h2>
           <?php echo $this->GetcontentByid(72,$res) ?>

         <!-- Need some help at your home? We will send one of our experienced technicians to your home or business for professional on-site support. Our experts can help you with a number of services, including setting up a secure wireless network, setting up a new computer or network printer, and sharing documents, music, and photos. We are also happy to troubleshoot any technical problems you may have, such as virus removal and networking problems.<br />
<br />


We offer on-site, emergency data recovery and hard drive repair, to restore your valuable data, including photos, videos, documents, and music.<br />
<br />


On-Site services are available throughout Freemont and Madison Counties: <strong>Rexburg</strong>, <strong>Saint Anthony</strong>, <strong>Ashton</strong>, <strong>Parker</strong>, <strong>Sugar City</strong>, <strong>Salem</strong>, Island Park and all surrounding areas 
-->
       </div>


       <div class="row">
           <div class="col-md-4">
               <div class="service-block">

                   <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(74,$res)?>">

                   <h3> <?php echo $this->GetcontentByid(75,$res) ?></h3>

                   <p> <?php echo $this->GetcontentByid(76,$res) ?></p>
                   <a href="#" page_ink_id="22" pagename="contact" style="background:#<?php echo $this->GetcontentByid(58,$res) ?>!important ">Contact Us</a>


               </div>

           </div>

           <div class="col-md-4">
               <div class="service-block">

                   <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(77,$res)?>">

                   <h3><?php echo $this->GetcontentByid(78,$res) ?></h3>

                   <p><?php echo $this->GetcontentByid(79,$res) ?></p>
                   <a href="#" page_ink_id="22" pagename="contact" style="background:#<?php echo $this->GetcontentByid(58,$res) ?>!important ">Contact Us</a>


               </div>

           </div>
           <div class="col-md-4">
               <div class="service-block">

                   <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(80,$res)?>">

                   <h3><?php echo $this->GetcontentByid(81,$res) ?></h3>

                   <p><?php echo $this->GetcontentByid(82,$res) ?></p>
                   <a href="#" page_ink_id="22" pagename="contact" style="background:#<?php echo $this->GetcontentByid(58,$res) ?>!important ">Contact Us</a>


               </div>

           </div>

       </div>

       <div class="row">
           <div class="col-md-6">
               <div class="service-block">

                   <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(83,$res)?>">

                   <h3><?php echo $this->GetcontentByid(84,$res) ?></h3>

                   <p><?php echo $this->GetcontentByid(85,$res) ?></p>
                   <a href="#" page_ink_id="22" pagename="contact" style="background:#<?php echo $this->GetcontentByid(58,$res) ?>!important ">Contact Us</a>


               </div>

           </div>

           <div class="col-md-6">
               <div class="service-block">

                   <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(87,$res)?>">

                   <h3><?php echo $this->GetcontentByid(88,$res) ?></h3>

                   <p><?php echo $this->GetcontentByid(89,$res) ?></p>
                   <a href="#" page_ink_id="22" pagename="contact" style="background:#<?php echo $this->GetcontentByid(58,$res) ?>!important ">Contact Us</a>


               </div>

           </div>
           

       </div>




   </div>

   <div class="inner-tab">

       <div class="container">

           <style>
               .inner-tab .nav-tabs > li > a:before{

                   border-color: #<?php echo $this->GetcontentByid(67,$res) ?> transparent transparent #<?php echo $this->GetcontentByid(67,$res) ?>!important;

               }
           </style>
           <!-- Nav tabs -->
           <ul class="nav nav-tabs" role="tablist">
               <li class="active"><a href="#home" style="background:#<?php echo $this->GetcontentByid(67,$res) ?>!important; color:#fff!important;" role="tab" data-toggle="tab"><?php echo $this->GetcontentByid(59,$res) ?></a></li>
               <li><a href="#profile" style="background:#<?php echo $this->GetcontentByid(67,$res) ?>!important; color:#fff!important;" role="tab" data-toggle="tab"><?php echo $this->GetcontentByid(60,$res) ?></a></li>
               <li><a href="#messages" style="background:#<?php echo $this->GetcontentByid(67,$res) ?>!important; color:#fff!important;" role="tab" data-toggle="tab"> <?php echo $this->GetcontentByid(61,$res) ?></a></li>
               <!--<li><a href="#messages2" style="background:#<?php /*echo $this->GetcontentByid(67,$res) */?>!important; color:#fff!important;" role="tab" data-toggle="tab"><?php /*echo $this->GetcontentByid(62,$res) */?></a></li>-->

           </ul>

           <!-- Tab panes -->


           <div class="tab-content">
               <div class="tab-pane active" id="home">

                   <?php echo $this->GetcontentByid(63,$res) ?>
                   <!--       ComputerIQ's service location is located at 10 N Bridge St Saint Anthony ID on the corner of the main street stop light. Our in-store services are very fairly priced, meaning that no matter how long it takes to repair your computer, it will not kill your pocket book. We charge a diagnostic fee of $20 per computer _ that allows us to properly inspect the issue described, determine the problem, and estimate the cost & time to repair. If you approve our estimate, we’ll be happy to credit the diagnostic fee towards your service.here to help -<br />
                          <br />


                          <strong>Street Address:</strong> 10 N Bridge St Saint Anthony ID, 83445<br />

                          <strong>Hours of Operation:</strong> Monday _ Friday | 9:00am _ 5:00pm | Weekends by Appointment<br />

                          <strong>Call Us Anytime: </strong>Someone will answer the phone 24 hours a day _ 208.754.7402-->

               </div>


               <div class="tab-pane" id="profile">


                   <?php echo $this->GetcontentByid(64,$res) ?>

                   <!--We are available to send one of our expert technicians to your home or business for on-site service. Our technicians can perform a number of different services online ranging from computer repair services, wireless networking, printer setup, and file sharing. We do not charge any trip fee, and there's only a one hour minimum. Appointments are available during regular business hours, and on an emergency basis after hours and on weekends.<br />
                   <br />


                   <strong>Schedule An Appointment Today!</strong><br />

                   <strong>Click To Send Us An Email:</strong> Contact Computer IQ<br />

                   <strong>Call Us Anytime:</strong> Our phone lines are open 24 hours a day _ 208.754.7402 -->


               </div>

               <div class="tab-pane" id="messages">

                   <?php echo $this->GetcontentByid(65,$res) ?>

                   <!--   There are a large number of computer services that we can offer through remote support. We use an easy to install and run secure desktop sharing application that allows us to share control of your computer, and troubleshoot your issue remotely. This can be very effective and a lot of times will save you a bit of money by not requiring us to make a service call.<br />
                      <br />


                      <strong>Call For Immediate Remote Support:</strong> 208.754.7402
   -->

               </div>

               <!--<div class="tab-pane" id="messages2">


                   <?php /*echo $this->GetcontentByid(66,$res) */?>


               </div>-->

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


               <!--
                       <h4>In the area over 30 years!</h4>

                       <p>ComputerIQ is a family business. Our father, Tito from Tito's TV has been here serving the Saint Anthony, Ashton and Rexburg Idaho area for over 30 years! We are proud to carry on that tradition. We are also a receiving center for his television sales and repair business.</p>
               -->




