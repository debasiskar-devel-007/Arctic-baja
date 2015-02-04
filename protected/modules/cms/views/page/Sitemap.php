<script type="text/javascript">

    $(document).ready(function(){
//alert(1);
        $('.article').readmore({
            speed: 75,
            maxHeight: 150
        });

    });
</script>
<?php
$baseUrl =  Yii::app()->baseUrl;
$themeUrl = Yii::app()->theme->baseUrl;

$banner = Addicontentinfo::model()->fetchupdatedetails(5);

$bannerpath =  $themeUrl."/images/innerbg.png";

if(count($banner)){
    $bannerpath =  yii::app()->getBaseUrl(true)."/uploads/content_image/originalsize/".$banner[0]['content_type'];
}



?>
<div class="inner-banner" style="background: url('<?php echo $bannerpath;?>') no-repeat scroll center top rgba(0, 0, 0, 0) !important;">
    <div class="container">
        <h1> <?php echo $this->GetcontentByid(104,$res) ?></h1>
    </div></div>
<div class="container">

    <div style="border:none; margin-top:0px;">
        <h6 style="font-family: 'open_sansregular';color: #3030ee;font-size: 44px;padding-bottom: 15px;">Site Map</h6>



    <ul>


        &nbsp;&nbsp;<li><a href="#" page_ink_id="1" pagename="home" style="color: #000">Home</a></li><br />
        &nbsp;&nbsp;<li>Computer Repair</li><br />
        <ul>
            &nbsp;&nbsp;&nbsp;&nbsp;<li><a href="#" page_ink_id="16" pagename="desktop" style="color: #000">Desktop Computer Repair</a></li><br />
            &nbsp;&nbsp;&nbsp;&nbsp;<li><a href="#" page_ink_id="17" pagename="desktop" style="color: #000">In-Home Support Repair</a></li><br />
        </ul>
        &nbsp;&nbsp;<li>Business It Services</li><br />
        <ul>
            &nbsp;&nbsp;&nbsp;&nbsp;<li><a class="plink" href="#" page_ink_id="18" pagename="onSite-remoteIT" style="color: #000">On Site & Remote IT</a></li><br />

            &nbsp;&nbsp;&nbsp;&nbsp;<li><a class="plink" href="#" page_ink_id="19" pagename="ITConsulting-services" style="color: #000"> IT Consulting Services</a></li><br />

            &nbsp;&nbsp;&nbsp;&nbsp;<li><a class="plink" href="#" page_ink_id="21" pagename="online-webServices" style="color: #000">Online Web Services</a></li><br />

        </ul>
        &nbsp;&nbsp;<li>Web Services</li><br />
        <ul>
            &nbsp;&nbsp;&nbsp;&nbsp;<li><a class="plink" href="#" page_ink_id="23" pagename="website-products" style="color: #000">Website Products</a></li><br />

            &nbsp;&nbsp;&nbsp;&nbsp;<li><a class="plink" href="#" page_ink_id="28" pagename="website-designing" style="color: #000">Website Designing</a></li><br />

            &nbsp;&nbsp;&nbsp;&nbsp;<li><a class="plink" href="#" page_ink_id="35" pagename="content-developement" style="color: #000">Content Developement</a></li><br />

            &nbsp;&nbsp;&nbsp;&nbsp;<li><a class="plink" href="#" page_ink_id="36" pagename="internet-marketing" style="color: #000"> Internet Marketing</a></li><br />

            &nbsp;&nbsp;&nbsp;&nbsp;<li><a class="plink" href="#" page_ink_id="38" pagename="custom-serveices" style="color: #000"> Custom Services</a></li><br />


        </ul>


        &nbsp;&nbsp;<li ><a href="http://toponlinedesigns.com/" target="_blank" style="color: #000">Our Design Work</a></li><br />


        &nbsp;&nbsp;<li ><a class="plink" href="#" page_ink_id="22" pagename="contact" style="color: #000">Contact Us</a></li><br />

        &nbsp;&nbsp;<li ><a class="plink" href="#" page_ink_id="39" pagename="custom-service" style="color: #000">Review</a></li><br />

        &nbsp;&nbsp;<li ><a class="plink" href="<?php echo yii::app()->getBaseUrl(true) ?>/News-BLOG"  pagename="blog" style="color: #000">Blog</a></li><br />

        &nbsp;&nbsp;<li ><a class="plink" href="#" page_ink_id="39"  pagename="Sitemap" style="color: #000">Site Map</a></li><br />

    </ul>



</div>
</div>


        <div class="footer-block">
            <div class="container">
                <h4>Computer Repair</h4>
                <img src="<?php echo $themeUrl ?>/images/b.png"  alt="#"/>
                <span>Desktop Computer Repair</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="<?php echo $themeUrl ?>/images/b.png"  alt="#"/>
                <span>In-Home Support</span>

                <img src="<?php echo $themeUrl ?>/images/footer-devider.png" alt="#"  style="width:100%; display:block; margin:30px auto;"/>
                <h4>IT Support</h4>
                <img src="<?php echo $themeUrl ?>/images/b.png"  alt="#"/>
                <span>Onsite & Remote IT</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="<?php echo $themeUrl ?>/images/b.png"  alt="#"/>
                <span>IT Consulting</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="<?php echo $themeUrl ?>/images/b.png"  alt="#"/>
                <span>Email & Communications</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="<?php echo $themeUrl ?>/images/b.png"  alt="#"/>
                <span>Online Services</span>
                <img src="<?php echo $themeUrl ?>/images/footer-devider.png" alt="#"  style="width:100%; display:block; margin:30px auto;"/>

                <h4>Partner Companies</h4>
                <img src="<?php echo $themeUrl ?>/images/b.png"  alt="#"/>
                <span>InfluxIQ Dev Drp</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="<?php echo $themeUrl ?>/images/b.png"  alt="#"/>
                <span>SpectrumIQ Finders</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="<?php echo $themeUrl ?>/images/b.png"  alt="#"/>
                <span>Tito's TV</span>
                <img src="<?php echo $themeUrl ?>/images/footer-devider.png" alt="#"  style="width:100%; display:block; margin:30px auto;"/>

