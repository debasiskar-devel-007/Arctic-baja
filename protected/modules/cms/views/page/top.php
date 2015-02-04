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


       $baseUrl=yii::app()->baseurl;
        $res=Addicontentinfo::model()->fetchupdatedetails(1);

        


    ?>
    
     <link rel="stylesheet" href="<?php echo $themeUrl;?>/css/bootstrap.min.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $themeUrl;?>/css/style.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $themeUrl;?>/css/media.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $themeUrl;?>/css/animate.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $themeUrl;?>/css/simply-scroll.css" type="text/css" />
     <link rel="stylesheet" href="<?php echo $themeUrl;?>/css/colpick.css" type="text/css" />
     
     <script type="text/javascript" src="<?php echo $themeUrl;?>/js/wow.js"></script>
     <script type="text/javascript" src="<?php echo $themeUrl;?>/js/simply-scroll.js"></script>
     <script type="text/javascript" src="<?php echo $themeUrl;?>/js/bootstrap.min.js"></script>
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

<body>


 <div class="nav-bg">

    <div class="container">
        <div class="row">
            <div class="col-md-4"><div class="logo"><a href="#" page_ink_id="1" pagename="home"> <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $res[0]['content_type']?>"></div></div>

            <div class="col-md-8">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#" page_ink_id="1" pagename="home">Home</a></li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Computer Repair  <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" page_ink_id="16" pagename="desktop">Desktop Computer Repair</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"  page_ink_id="17" pagename="homesupport">In-Home Support</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Business IT Services <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" page_ink_id="18" pagename="itsupport">On Site & Remote IT</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" page_ink_id="19" pagename="itconsulting"> IT Consulting Services</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" page_ink_id="20" pagename="emailservices"> Email & Communications</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Online Web Services</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Online Web Services</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Web Services <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo Yii::app()->getBaseUrl(true);?>/influxiq/home/products">Website Products</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo Yii::app()->getBaseUrl(true);?>/influxiq/home/design">Website Designing</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo Yii::app()->getBaseUrl(true);?>/influxiq/home/content">Content Developement</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo Yii::app()->getBaseUrl(true);?>/influxiq/home/marketing"> Internet Marketing</a></li>

                                    </ul>
                                </li>

                                <li ><a href="#">Portfolio</a></li>
                                <li class="divider"></li>
                                <li ><a href="#">Contact Us</a></li>

                            </ul>


                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>

            </div>


        </div>

    </div>

</div>