<?php
    $baseUrl = Yii::app()->theme->baseUrl;
    $base=yii::app()->baseurl;

    $cs = Yii::app()->getClientScript();

    
    $cs->registerCSSFile($baseUrl.'/css/style.css');
    $cs->registerCSSFile($baseUrl.'/css/media.css');
   

?>


    <?php echo $content; ?>
   
