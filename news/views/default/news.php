<?php
$baseUrl =  Yii::app()->baseUrl;
$themeUrl = Yii::app()->theme->baseUrl;

$res=News::model()->findAll('id='.$id);
foreach($res as $b)
{
    ?>

<div class="container">
    <div class="blogdiv">

        <h3> <?php  echo $b['news_title'] ?></h3>
        <h3><?php echo $b['news_date']  ?> </h3> 
        
        <div class="date">Posted By  "<?php  echo $b['postby'] ?>" </div>
       
      <?php  $resimg=NewsImg::model()->findAll('news_id='.$id);
        $resvid=NewsVid::model()->findAll('news_id='.$id);?>
        <div class="post-media">

    <?php if(count($resimg)>0)
{
    foreach($resimg as $img)
    {

        ?>
        <img src="<?php echo yii::app()->getBaseUrl(true) ?>/uploads/news_image/thumb/438X265/<?php echo $img['name'] ?>">

      <?php } } ?>


        <?php if(count($resvid)>0)
        {
            foreach($resvid as $vid)
            {

                ?>

                    <iframe  src="//www.youtube.com/embed/<?php echo $vid['name'] ?>" frameborder="0" allowfullscreen></iframe>

            <?php
            }
        }
        ?>
        <div class="clear"></div>
        </div>
<div class="text"> <?php echo  $b['news_desc']; ?></div>


</div>

</div>
<?php } ?>

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

