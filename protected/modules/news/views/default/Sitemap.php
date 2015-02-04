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

    <div class="inner-text1" style="border:none; margin-top:-30px;">
        <h6>Site Map</h6>

    <ul>
        <li>Home</li>
        <li>About</li>
        <li>Products</li>
        <ul>
            <li>Silver</li>
            <li>Gold</li>
        </ul>
        <li>Press</li>
        <li>Stores</li>
        <li>Contact Us</li>
        <li>Site Map</li>
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

