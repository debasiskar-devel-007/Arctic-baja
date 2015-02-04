<?php $themeurl = Yii::app()->theme->baseUrl;
//var_dump($res);

$banner = Addicontentinfo::model()->fetchupdatedetails(6);

$bannerpath =  $themeurl."/images/banner-bg.png";

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



<div class="top-banner" style="background: url('<?php echo $bannerpath;?>') no-repeat scroll center top rgba(0, 0, 0, 0) !important;">
    <div class="container">
       <!-- <h1>Servicing Rexburg, Saint Anthony, Ashton & all surrounding areas</h1>

        <h2>A family business with over 30+ successful years in the East Idaho Snake River Valley...</h2>-->

        <?php echo $this->GetcontentByid(1,$res) ?>


        <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(25,$res)?>" class="img1" >
        <div class="clear"></div>

    </div>
</div>

<div class="story">
    <div id="brand_s1"></div>
    <div class="banner-bottom-con">
       <!-- <h2>Technology</h2>
        <h3>Simplified</h3>
        <p>Professional IT Support, Fast Computer Repair & Virtual IT</p>

        <a href="#">For Your Home</a>
        <a href="#">For Your Business</a>-->
        <?php echo $this->GetcontentByid(2,$res) ?>
        <a href="#"  page_ink_id="17" pagename="homesupport" style="background:#<?php echo $this->GetcontentByid(29,$res) ?> !important "><?php echo $this->GetcontentByid(28,$res) ?></a>
        <a href="#"  page_ink_id="16" pagename="desktop" style="background:#<?php echo $this->GetcontentByid(31,$res) ?> !important"><?php echo $this->GetcontentByid(30,$res) ?></a>

    </div>
    <div class="clear"></div>



    <div class="middle-blog-contain">

        <div class="container">
            <div class="middle-wrapper">

                <div class="row">
                    <div class="col-md-6">
                       <!-- <img src="<?php /*echo $themeurl */?>/images/icon1.png" alt="#" />-->
                        <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(3,$res)?>">
                        <?php echo $this->GetcontentByid(4,$res) ?>
                        <a href="#" page_ink_id="16" pagename="desktop" style="position:relative;z-index:9999999;background:#<?php echo $this->GetcontentByid(32,$res) ?>!important">Learn More</a>
                        <!--<strong>Computer Repair</strong>
                        <p>Visit our service shop in Saint Anthony, ID for expert computer repair, laptop repair, and PC tune up services. We offer fixed priced services for many computer services – and we guarantee you’ll be satisfied.</p>

                        <a href="#">Learn More</a>-->


                    </div>
                    <div class="col-md-6">
                        <!--<img src="<?php /*echo $themeurl */?>/images/icon2.png" alt="#" />-->
                        <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(5,$res)?>">
                        <?php echo $this->GetcontentByid(6,$res) ?>
                        <!--<strong>IT Services</strong>
                        <p>Comprehensive IT support, maintenance, and managed services for businesses large and small. Let us manage your office network, servers, and workstations – so you can focus on growing your business.</p>
-->
                        <a href="#"  page_ink_id="19" pagename="itconsulting"  style="position:relative;z-index:999999;background:#<?php echo $this->GetcontentByid(32,$res) ?>!important">Learn More</a>

                    </div>

                </div>


            </div>
        </div>

    </div>

</div>
<div class="story">
    <div id="brand_s2"></div>

    <div class="container">

        <ul id="scroller2">

            <?php $htmlcontent  = " <li><img src='htmlcontent1'  alt='#'/></li>     ";

            echo  $this->getmultipleContent(7,$res,$htmlcontent);
            ?>

           <!-- <li><img src="<?php /*echo $themeurl */?>/images/p1.png" alt=""/></li>
            <li><img src="<?php /*echo $themeurl */?>/images/p2.png" alt=""/></li>
            <li><img src="<?php /*echo $themeurl */?>/images/p3.png" alt=""/></li>
            <li><img src="<?php /*echo $themeurl */?>/images/p4.png" alt=""/></li>
            <li><img src="<?php /*echo $themeurl */?>/images/p5.png" alt=""/></li>
            <li><img src="<?php /*echo $themeurl */?>/images/p1.png" alt=""/></li>
            <li><img src="<?php /*echo $themeurl */?>/images/p2.png" alt=""/></li>
            <li><img src="<?php /*echo $themeurl */?>/images/p3.png" alt=""/></li>
            <li><img src="<?php /*echo $themeurl */?>/images/p4.png" alt=""/></li>
            <li><img src="<?php /*echo $themeurl */?>/images/p5.png" alt=""/></li>
-->


        </ul>


    </div>


    <div class="tabtop-contain">
        <!--<h2>The Computer <span>IQ Promise</span></h2>
        <p>Our Commitment To An Outstanding Consumer Experience</p>-->
        <?php echo $this->GetcontentByid(8,$res) ?>

    </div>



    <div class="container">
        <!-- Nav tabs -->
        <style>
            .nav-tabs > li.active > a:before{

                border-color: #<?php echo $this->GetcontentByid(32,$res) ?> transparent transparent #<?php echo $this->GetcontentByid(32,$res) ?>!important;

            }
        </style>
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#home" style="background:#<?php echo $this->GetcontentByid(32,$res) ?>!important;color:#<?php echo $this->GetcontentByid(113,$res) ?>!important" role="tab" data-toggle="tab">General Info</a></li>
            <li><a href="#profile" role="tab" style="background:#<?php echo $this->GetcontentByid(32,$res) ?>!important;color:#<?php echo $this->GetcontentByid(113,$res) ?>!important" data-toggle="tab">IT Services</a></li>
            <li><a href="#messages" style="background:#<?php echo $this->GetcontentByid(32,$res) ?>!important;color:#<?php echo $this->GetcontentByid(113,$res) ?>!important" role="tab" data-toggle="tab">Repair</a></li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home"><!--Computer IQ is absolutely committed to the highest quality Computer Repair and IT services. The experience we want each one of our clients to have is of top importance. As a top-rated Rexburg and Saint Anthony IT Service, take the responsible for technology infrastructure of all businesses throughout Freemont and Madison counties. In addition, our Computer Repair shop, we like to call the Tech bench, consistently helps customers with PC related issues, varying from virus removals, laptop LCD screen replacements, all the way to in-home installation and even custom-built home theater computers. We guarantee our work 100% for 30 days from the time of service, so if you experience any problems, we’ll be happy to resolve the issue at no charge. Our IT Services department is happy to offer a Free Technology Assessment, including analysis of your network infrastructure, backup and disaster recovery plan, internet connectivity, and options for Cloud Solutions. We’re-->
                <?php echo $this->GetcontentByid(9,$res) ?>
            </div>
            <div class="tab-pane" id="profile"> <?php echo $this->GetcontentByid(10,$res) ?>

            </div>
            <div class="tab-pane" id="messages"><!--We offer a number a variety of repair and upgrade services for your personal desktop computer. Whether you utilize your computer for work, pleasure, gaming, home theater, or any other purpose – our team of expert technicians will be happy to run diagnostics and remedy any problems you might be facing. Our services range from virus removal, problems with startup, blue screen of death, upgrades of all types (RAM, Hard Drive, Video Card, Sound Card, etc.), and a range of optimization procedures to keep your computer healthy and running fast. We offer emergency data recovery and hard drive repair. We can restore your valuable data, including photos, videos, documents, and music.<br />
                <br />


                We service all brands of desktop computers, including Dell, HP, Compaq, Lenovo, Sony Vaio, Acer, Asus, Toshiba, Samsung, eMachines, Gateway, Alienware, and many others. </div>
-->
                <?php echo $this->GetcontentByid(11,$res) ?>

            </div>
    </div>

    <div class="bottom-body">



        <div class="container">

            <div class="row">

                <div class="col-md-4">

                    <div class="div-contain">

                        <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(12,$res)?>" >
                        <h2 style="background:#<?php echo $this->GetcontentByid(34,$res) ?>!important;color:#<?php echo $this->GetcontentByid(114,$res) ?>!important"><?php echo $this->GetcontentByid(13,$res)?></h2>
                        <?php echo $this->GetcontentByid(14,$res)?>
                       <!-- <p><span>Remote repair:</span> $50 an hour<br />

                            <span>In shop: </span>$50 an hour (plus cost of parts if required)<br />

                            <span>Home / office visit:</span> $65 an hour<br />

                            <span>Network / printer set up:</span> $65 an hour (plus cost of parts if required).</p>-->


                    </div>


                </div>
                <div class="col-md-4">

                    <div class="div-contain">

                        <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(15,$res)?>" >
                        <h2 style="background:#<?php echo $this->GetcontentByid(34,$res) ?>!important;color:#<?php echo $this->GetcontentByid(114,$res) ?>!important"><?php echo $this->GetcontentByid(16,$res)?></h2>
                        <?php echo $this->GetcontentByid(17,$res)?>
                       <!-- <img src="<?php /*echo $themeurl */?>/images/bimg2.png"  alt="#"/>
                        <h2>One Price Services</h2>
                        <p><span>Full system tune up:</span><br />

                            $95 (in shop)<br />

                            <span>Operating system install:</span><br />

                            $125 (in shop) </p>

-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="div-contain">
                        <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $this->GetcontentByid(18,$res)?>" >
                        <style>
                            .bottom-body .div-contain h2:before{

                                border-color: #<?php echo $this->GetcontentByid(34,$res) ?> transparent transparent #<?php echo $this->GetcontentByid(34,$res) ?>!important;

                            }
                        </style>
                        <h2 style="background:#<?php echo $this->GetcontentByid(34,$res) ?>!important;;color:#<?php echo $this->GetcontentByid(114,$res) ?>!important"><?php echo $this->GetcontentByid(19,$res)?></h2>
                        <?php echo $this->GetcontentByid(20,$res)?>


                        <!--<img src="<?php /*echo $themeurl */?>/images/bimg3.png"  alt="#"/>
                        <h2>Maintenance contracts</h2>
                        <p><span>Up to 5 computers:</span><br />

                            $100 a month (2 visits)<br />

                            <span>6 to 10 computers:</span><br />

                            $175 a month (2 visits)<br />

                            <span>10 or more:</span><br />

                            Contact us for a quote </p>
-->

                    </div>
                </div>


            </div>
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
        <span><a href="#" page_ink_id="20" pagename="emailservices">Email & Communications</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
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

<!--
        <h4>In the area over 30 years!</h4>

        <p>ComputerIQ is a family business. Our father, Tito from Tito's TV has been here serving the Saint Anthony, Ashton and Rexburg Idaho area for over 30 years! We are proud to carry on that tradition. We are also a receiving center for his television sales and repair business.</p>
-->



