<?php
    $themeUrl=yii::app()->theme->baseurl;
    $baseUrl=yii::app()->baseurl;
$res=Addicontentinfo::model()->fetchupdatedetails(1);

$page = Page::model()->findAll('id=39');


?>

<div class="nav-bg">

    <div class="container">
        <div class="row">
            <div class="col-md-3"><div class="logo"><a href="#" page_ink_id="1" pagename="home">  <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $res[0]['content_type']?>"> </a></div></div>

            <div class="col-md-9">
       
          <nav id="nav" role="navigation">
    
    
<a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
<ul class="clearfix">
                          
                                <li class="active"><a class="plink" href="#" page_ink_id="1" pagename="home">Home</a></li>

                                <li>
                                    <a href="#">Computer Repair &nbsp;&#9660;</a>
                                    <ul>
                                        <li><a class="plink" href="#" page_ink_id="16" pagename="computer-repair">Desktop Computer Repair</a></li>
                                        
                                        <li><a class="plink" href="#"  page_ink_id="17" pagename="home-support">In-Home Support</a></li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Business IT Services &nbsp;&#9660; </a>
                                    <ul>
                                        <li><a class="plink" href="#" page_ink_id="18" pagename="onSite-remoteIT">On Site & Remote IT</a></li>
                                       
                                        <li><a class="plink" href="#" page_ink_id="19" pagename="ITConsulting-services"> IT Consulting Services</a></li>
                                       
                                       <!-- <li><a class="plink" href="#" page_ink_id="20" pagename="email-communications"> Email & Communications</a></li>-->
                                       
                                        <li><a class="plink" href="#" page_ink_id="21" pagename="online-webServices">Online Web Services</a></li>


                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Web Services &nbsp;&#9660; </a>
                                    <ul>
                                        <li><a class="plink" href="#" page_ink_id="23" pagename="website-products">Website Products</a></li>
                                      
                                        <li><a class="plink" href="#" page_ink_id="28" pagename="website-designing">Website Designing</a></li>
                                        
                                        <li><a class="plink" href="#" page_ink_id="35" pagename="content-developement">Content Developement</a></li>
                                        
                                        <li><a class="plink" href="#" page_ink_id="36" pagename="internet-marketing"> Internet Marketing</a></li>
                                        
                                        <li><a class="plink" href="#" page_ink_id="38" pagename="custom-serveices"> Custom Serveices</a></li>

                                    </ul>
                                </li>

                                <li ><a href="http://toponlinedesigns.com/" target="_blank">Portfolio</a></li>
                              
                                <li ><a class="plink" href="#" page_ink_id="22" pagename="contact">Contact Us</a></li>
                                <?php if(@$page[0]['page_status']){ ?>
                               
                                <li ><a class="plink" href="#" page_ink_id="39" pagename="custom-service">Custom Service</a></li>
                                <?php } ?>

                            </ul>

</nav>

            </div>


        </div>

    </div>

</div>

