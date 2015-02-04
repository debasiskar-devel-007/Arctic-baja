<?php
    $baseUrl =  Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;

$res=News::model()->findAll('id='.$id);
    foreach($res as $b)
    {
?>

<script>
    $(document).ready(function(){
        var windowWidth = $(window).width();
        if(windowWidth <1024){
            var a= parseInt($("#main-text").height());
            $("#about-wrapper").css("margin-top", (parseInt(a)+20)+"px");
        }

    });
</script>
        <style type="text/css">
            .testimonials-row{ border-bottom:solid 1px #ddd; margin:0; padding:0; padding-bottom:25px; margin-bottom:35px; font-size:12px; line-height:24px;}
            .testimonials-row:last-child {
                border-bottom: medium none;
            }
        </style>

        <div class="productdetails">
            <div class="testimonials-body" style="border:none;">

                <div class="testimonials-row">


                    <div class="text-div" style="float:none; margin:0 auto; width:100%; ">
                        <h5><?php echo $b['news_date']  ?> | Posted By  "<?php  echo $b['postby'] ?>" </h5>
                        <?php

                        if(($b['user_image'])) {

                            ?>

                            <img alt="" src="<?php echo yii::app()->getBaseUrl(true)?>/uploads/proimage/thumb/<?php echo $b['user_image'] ?>"  style="float:left; margin:10px 20px 20px 0; ">

                        <?php }
                        else
                        {

                            ?>



                            <img alt="" src="<?php echo yii::app()->getBaseUrl(true)?>/uploads/default.jpg"  style="float:left; margin:10px 20px 20px 0; width:95px;">
                        <?php } ?>
                        <?php echo  $b['news_desc']; ?>
                        <div class="clear"></div>
                        <?php
                        $resimg=NewsImg::model()->findAll('news_id='.$id);
                        $resvid=NewsVid::model()->findAll('news_id='.$id);

                        if(count($resimg)>0 || count($resvid)>0)
                        {
                        ?>




                        <div class="pro-img-div">
                        <?php if(count($resimg)>0)
                            {
                            foreach($resimg as $img)
                                {

                            ?>
                        <div class="blog-div">
                         <img src="<?php echo yii::app()->getBaseUrl(true) ?>/uploads/news_image/thumb/438X265/<?php echo $img['name'] ?>">
                         </div>
                            <?php
                                }
                            }
                            ?>
                            <?php if(count($resimg)>0)
                            {
                            foreach($resvid as $vid)
                            {

                            ?>
                                <div class="blog-div1">
                            <iframe  src="//www.youtube.com/embed/<?php echo $vid['name'] ?>" frameborder="0" allowfullscreen></iframe>
                           </div>
                            <?php
                            }
                            }
                            ?>
                           </div>

                        <?php
                        }

                        ?>
                        
     <div class="clear"></div><br /><br />
                        <div style="float:right">

                            <span class='st_facebook_large'></span>
                            <span class='st_twitter_large'></span>
                            <span class='st_linkedin_large'></span>
                            <span class='st_pinterest_large'></span>

                        </div>


                    </div>

                    <div class="clear"></div>




<?php
    }
?>
                    <div class="logo" style="margin:0 auto; margin-top:40px;">
                        <img alt="logo" src="<?php echo $themeUrl ?>/images/logo.png">

                    </div>
                    </div>


                </div>



            </div>