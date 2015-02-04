   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?php echo   $this->pageTitle. ' | '.Yii::app()->params['site_url'];  ?></title>
 

    <?php

        $themeUrl = Yii::app()->theme->baseUrl;

        $cs = Yii::app()->getClientScript();

        $cs->registerCSSFile($themeUrl.'/css/bootstrap.min.css');
        $cs->registerCSSFile($themeUrl.'/css/style.css');
        $cs->registerCSSFile($themeUrl.'/css/media.css');
        $cs->registerCSSFile($themeUrl.'/css/animate.css');
        $cs->registerCSSFile($themeUrl.'/css/simply-scroll.css');
        $cs->registerCSSFile($themeUrl.'/css/colpick.css');






        


        $cs->registerScriptFile($themeUrl.'/js/wow.js',CClientScript::POS_HEAD);
        $cs->registerScriptFile($themeUrl.'/js/simply-scroll.js',CClientScript::POS_HEAD);
        
        $assetUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap.assets'));
        $cs->registerScriptFile($assetUrl.'/js/bootstrap.min.js'); 


      


    ?>
    
     <link rel="stylesheet" href="<?php echo $assetUrl;?>/css/bootstrap.min.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $assetUrl;?>/css/style.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $assetUrl;?>/css/media.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $assetUrl;?>/css/animate.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $assetUrl;?>/css/simply-scroll.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $assetUrl;?>/css/colpick.css" type="text/css" />
     
     <script type="text/javascript" src="<?php echo $assetUrl;?>/js/wow.js"></script>
     <script type="text/javascript" src="<?php echo $assetUrl;?>/js/simply-scroll.js"></script>
     <script type="text/javascript" src="<?php echo $assetUrl;?>/js/bootstrap.min.js"></script>
    
      <script type="text/javascript">


          var count = 0;
          var totalcount = 0;
          (function($) {
              $(function() {

                  var windowwidth = $(window).width();
                  //alert(windowwidth);

                  $("#scroller2").simplyScroll({frameRate:50});




              });



          })(jQuery);


          theme_url = "<?php echo $themeUrl;?>";
        base_url = "<?php echo Yii::app()->getBaseUrl(true);?>";
        asset_url = "<?php echo $this->module->getAssetsUrl();?>";
        var actionid = '<?php echo Yii::app()->controller->action->id; ?>';
        var controllerid = '<?php echo Yii::app()->controller->id; ?>';



    </script>
      <script type="text/javascript">
        $(function()
        {

            new WOW().init();
            $("#banner1").responsiveSlides({

                speed: 800,
                auto: true,
                pause: true,
                pauseControls: true
            });


        });
        
        
        $(document).ready(function () {
    loc = $(location).attr('href');
    var n = loc.split("/");
    
    var n1 = loc.split("/").length;
    var on_page = n[n1 - 1];
    if(on_page=='range')
    {
        //alert(1);    
        $('.footer-icon li:first-child a:first-child').attr('href','https://www.facebook.com/CowtownRange');
        
    }
    else
    {
       $('.footer-icon li:first-child a:first-child').attr('href','https://www.facebook.com/cowtownstudiosaz');    
        
    }
    //alert(on_page);
    var new_page = on_page.split("?");
     //alert(new_page[0]);      
    $('ul.clearfix a').each(function () {
        
        //alert($(this).text());
        if ($(this).attr('pagename') == new_page[0]) { 
            $(this).closest('li').addClass('active'); 
        }
    });
    
    
        $(".footer-menu").find('a').each(function () {
        
        //alert(1);
        if ($(this).attr('pagename') == new_page[0]) { 
            $(this).closest('a').addClass('active'); 
        }
    });
    
    
    
    
});


    </script>
</head>
<?php
$themeurl=yii::app()->theme->baseurl;
$baseUrl=yii::app()->baseurl;
$res2=Addicontentinfo::model()->fetchupdatedetails(3);
$res1=Addicontentinfo::model()->fetchupdatedetails(4);

?>


<div class="footer-block">
    <div class="container">
        <h4><?php echo $this->GetcontentByid(21,$res)?></h4>
        <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
        <span>Desktop Computer repair</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
        <span>In-Home Support</span>

        <img src="<?php echo $themeurl ?>/images/footer-devider.png" alt="#"  style="width:100%; display:block; margin:30px auto;"/>
        <h4><?php echo $this->GetcontentByid(22,$res)?></h4>
        <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
        <span>Onsite & Remote IT</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
        <span>IT Consulting</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
        <span>Email & Communications</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
        <span>Online Services</span>
        <img src="<?php echo $themeurl ?>/images/footer-devider.png" alt="#"  style="width:100%; display:block; margin:30px auto;"/>

        <h4><?php echo $this->GetcontentByid(23,$res)?></h4>
        <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
        <span>InfluxIQ Dev Drp</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
        <span>SpectrumIQ Finders</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="<?php echo $themeurl ?>/images/b.png"  alt="#"/>
        <span>Tito's TV</span>
        <img src="<?php echo $themeurl ?>/images/footer-devider.png" alt="#"  style="width:100%; display:block; margin:30px auto;"/>
        <?php echo $this->GetcontentByid(24,$res)?>

   
<a href="#" page_ink_id="1" pagename="home">Home</a> |  <a href="#" page_ink_id="16" pagename="desktop">Computer Repair</a>  | <a href="#" page_ink_id="18" pagename="itsupport">Business IT Services</a> | <a href="#">Web Services</a> | <a href="#">Portfolio</a> | <a href="#">Contact Us</a>


</div>
</div>




<div class="footer-main">
    <div class="container">

        <div class="row">
            <div class="col-md-6"><?php echo $res1[0]['content_type'] ?></div>

            <div class="col-md-6"><div class="footer-logo"><a href="#" page_ink_id="1" pagename="home" ><img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $res2[0]['content_type']?>"></a></div>

            </div>




        </div>

    </div></div> 


</body>
</html>
