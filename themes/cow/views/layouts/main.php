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
		$cs->registerCSSFile($themeUrl.'/css/menu.css');
        $cs->registerCSSFile($themeUrl.'/css/simply-scroll.css');
        $cs->registerCSSFile($themeUrl.'/css/colpick.css');






        


        $cs->registerScriptFile($themeUrl.'/js/wow.js',CClientScript::POS_HEAD);
        $cs->registerScriptFile($themeUrl.'/js/simply-scroll.js',CClientScript::POS_HEAD);
		
		$assetUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootstrap.assets'));
		//$cs->registerScriptFile($assetUrl.'/js/bootstrap.min.js'); 


      


    ?>
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


 

 <?php require_once('top.tpl.php'); ?> 
  <?php $arr= Yii::app()->session['sess_user'];

    if(count(@$arr['role']))

    {

        foreach($arr['role'] as $res)

        {

            if($res==1) 

            {   



            ?>





            <div class="admin-link-main"><div class="admin-link"><a href="<?php echo yii::app()->getBaseUrl(true) ?>/user/admin/dashboard">ADMIN</a></div>



            <div class="clear"></div>

            </div>

            <?php } } }?>

  
 <?php echo $content; ?>
 <?php //require_once('footer.tpl.php'); ?>


 <!-- Modal For notify email[start] -->
 <?php $this->beginWidget(
     'bootstrap.widgets.TbModal',
     array('id' => 'notifyemailModal')
 ); ?>

 <div class="modal-header">
     <a class="close" data-dismiss="modal">&times;</a>
     <h4>Enter Your Mail : </h4>
 </div>

 <div class="modal-body">
     <form method="post" action="#" id="notyfyform" class="form-vertical">
        <input type="hidden" id="proid_text" />
         <label class="required" for="UserManager_password2">Confirm Password <span class="required">*</span></label><input type="text" id="notifyemail" name="notifyemail"><span style="display: none" id="notifyemail_em_" class="help-block error"></span>

         <input type="button" id="submitbtn" value="Submit" name="yt3" class="button">

     </form>
 </div>



 <?php $this->endWidget(); ?>
 <!-- Modal For notify email[end] -->



 <?php require_once('footer.php'); ?>  









