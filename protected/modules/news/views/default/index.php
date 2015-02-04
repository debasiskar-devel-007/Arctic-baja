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



?>
<div class="container">

        <?php

        $resblog=News::model()->findAll('news_status=1');
        /*echo "<pre>";
        var_dump($resblog);
        exit;*/

               foreach($resblog as $b){

            ?>
            <div class="blogdiv">



                    <h3> <?php  echo $b['news_title'] ?></h3>

                <div class="date">Posted on <?php echo $b['news_date']  ?></div>
            <!--        <?php
/*
                    if(($b['user_image'])) {

                        */?>

                            <img alt="" src="<?php /*echo yii::app()->getBaseUrl(true)*/?>/uploads/proimage/thumb/<?php /*echo $b['user_image'] */?>"  style="float:left; margin:10px 20px 20px 0; ">

                    <?php /*}
                    else
                    {

                        */?>



                            <img alt="" src="<?php /*echo yii::app()->getBaseUrl(true)*/?>/uploads/default.jpg"  style="float:left; margin:10px 20px 20px 0; width:95px;">
                            --><?php /*} */?>

                <div class="text"> <?php echo  Common_helper::character_limiter(strip_tags($b['news_desc']),300); ?></div>
                <a href="<?php echo $b['news_link']?>" target="_blank">Read More</a>
                            <?php /*echo  Common_helper::character_limiter(strip_tags($b['news_desc']),200); */?><!--<br />
                    <a href="<?php /*echo  yii::app()->getBaseUrl(true)*/?>/news/default/details/id/<?php /*echo $b['id']*/?>">View More</a>-->

                <div class="social">


                    <span class='st_facebook_large' displayText='Facebook'></span>
                    <span class='st_twitter_large' displayText='Tweet'></span>
                    <span class='st_linkedin_large' displayText='LinkedIn'></span>
                    <span class='st_pinterest_large' displayText='Pinterest'></span>
                   </div>

                    </div>




        <?php } ?>

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

