<?php
    $baseUrl =  Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;
?>

<script>
    $(document).ready(function(){
        alert(1);
         var windowWidth = $(window).width();
        if(windowWidth <1024){
            var a= parseInt($("#main-text").height());
            $("#about-wrapper").css("margin-top", (parseInt(a)+20)+"px");
        }

    });
</script>


