<?php
    $themeUrl=yii::app()->theme->baseurl;
    $baseUrl=yii::app()->baseurl;
$res=Addicontentinfo::model()->fetchupdatedetails(1);

$page = Page::model()->findAll('id=39');


?>

<div class="nav-bg">

    <div class="container">
        <div class="row">
            <div class="col-md-2"><div class="logo"><a href="#" page_ink_id="1" pagename="home">  <img src="<?php echo yii::app()->getBaseUrl(true); ?>/uploads/content_image/thumb/<?php echo $res[0]['content_type']?>"> </a></div></div>

            <div class="col-md-10">
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
                                <li class="active"><a class="plink" href="#" page_ink_id="1" pagename="home">Home</a></li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Computer Repair  <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="plink" href="#" page_ink_id="16" pagename="computer-repair">Desktop Computer Repair</a></li>
                                        <li class="divider"></li>
                                        <li><a class="plink" href="#"  page_ink_id="17" pagename="home-support">In-Home Support</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Business IT Services <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="plink" href="#" page_ink_id="18" pagename="onSite-remoteIT">On Site & Remote IT</a></li>
                                        <li class="divider"></li>
                                        <li><a class="plink" href="#" page_ink_id="19" pagename="ITConsulting-services"> IT Consulting Services</a></li>
                                        <li class="divider"></li>
                                        <li><a class="plink" href="#" page_ink_id="20" pagename="email-communications"> Email & Communications</a></li>
                                        <li class="divider"></li>
                                        <li><a class="plink" href="#" page_ink_id="21" pagename="online-webServices">Online Web Services</a></li>


                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Web Services <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="plink" href="#" page_ink_id="23" pagename="website-products">Website Products</a></li>
                                        <li class="divider"></li>
                                        <li><a class="plink" href="#" page_ink_id="28" pagename="website-designing">Website Designing</a></li>
                                        <li class="divider"></li>
                                        <li><a class="plink" href="#" page_ink_id="35" pagename="content-developement">Content Developement</a></li>
                                        <li class="divider"></li>
                                        <li><a class="plink" href="#" page_ink_id="36" pagename="internet-marketing"> Internet Marketing</a></li>
                                        <li class="divider"></li>
                                        <li><a class="plink" href="#" page_ink_id="38" pagename="custom-serveices"> Custom Serveices</a></li>

                                    </ul>
                                </li>

                                <li ><a href="http://toponlinedesigns.com/" target="_blank">Portfolio</a></li>
                                <li class="divider"></li>
                                <li ><a class="plink" href="#" page_ink_id="22" pagename="contact">Contact Us</a></li>
                                <?php if(@$page[0]['page_status']){ ?>
                                <li class="divider"></li>
                                <li ><a class="plink" href="#" page_ink_id="39" pagename="custom-service">Custom Service</a></li>
                                <?php } ?>

                            </ul>


                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>

            </div>


        </div>

    </div>

</div>

