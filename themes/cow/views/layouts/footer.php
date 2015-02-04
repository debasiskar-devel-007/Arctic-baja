<?php
$themeUrl=yii::app()->theme->baseurl;
$baseUrl=yii::app()->baseurl;
$res=Addicontentinfo::model()->fetchupdatedetails(3);
$res1=Addicontentinfo::model()->fetchupdatedetails(4);

$page = Page::model()->findAll('id=39');

?>

<a href="#" page_ink_id="1" pagename="home">Home</a> |  <a href="#" page_ink_id="16" pagename="desktop">Computer Repair</a>  | <a href="#" page_ink_id="18" pagename="itsupport">Business IT Services</a> | <a href="#" page_ink_id="23" pagename="website-products">Web Services</a> | <a href="http://toponlinedesigns.com/" target="_blank">Portfolio</a> | <a href="#" page_ink_id="22" pagename="contact">Contact Us</a><?php if(@$page[0]['page_status']){ ?> | <a href="#" page_ink_id="39" pagename="contact">Custom Service</a><?php } ?>


</div>
</div>




<div class="footer-main">
    <div class="container">

        <div class="row">
            <div class="col-md-6"><?php echo $res1[0]['content_type'] ?></div>

            <div class="col-md-6"><div class="footer-logo"><a href="#" page_ink_id="1" pagename="home" ><img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $res[0]['content_type']?>"></a></div>

            </div>




        </div>

    </div></div>


</body>
</html>
