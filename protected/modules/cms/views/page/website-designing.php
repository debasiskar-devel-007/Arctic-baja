<?php $themeurl=yii::app()->theme->baseurl;
    $pro=InfluxiqProduct::model()->findAll('category_id=2 and i_active=1 ORDER BY `order`');

    $cart = Yii::app()->session['cart'];

    //print_r($cart);
?>

<script>
    $(function(){
        $('.plink').parent().removeClass('active');
        $('.plink').closest('li.dropdown').removeClass('active');
        $('.plink').each(function(){
            var pagename = $(this).attr('pagename');
            if($(this).closest('li.dropdown').length){


                if(pagename == '<?php echo $pagename;?>'){
                    $(this).closest('li.dropdown').addClass('active');
                    return false;
                }
            }else{

                if(pagename == '<?php echo $pagename;?>'){
                    $(this).parent().addClass('active');
                    return false;
                }
            }

        });
    });

</script>


<script>
    function showpopup(e)
    {
        var product_id= $(e).attr('product_id');
        var type = 2;
        var value ='NULL';

        jQuery.post('<?php echo Yii::app()->getBaseurl(true);?>/cms/page/addcontract',
        {'product_id':product_id,'value':value,'type':type},
        function(result)
        {
            jQuery.blockUI({ 
                message: $('#pop'), 
                css: {
                    border : 'none', 
                    top:  ($(window).height() - 335) /2 + 'px', 
                    left: ($(window).width() - 530) /2 + 'px', 
                    cursor: 'auto' 
                } 
            }); 
        }) ;     
    }


    function redir(e)
    {
        jQuery.unblockUI();
        redirVal = jQuery(e).closest('div').find('input.chkPage:checked').val();
        // alert(redirVal);

        if(redirVal)
        {
            window.location.href='<?php echo Yii::app()->getBaseurl(true);?>/'+redirVal;
        }


    }
    
         function showpopupdef(e){
         jQuery.blockUI({
             message: $('#pop_def'),
             css: {
                 border : 'none',
                 top:  ($(window).height() - 335) /2 + 'px',
                 left: ($(window).width() - 530) /2 + 'px',
                 cursor: 'auto'
             }
         });
     }
     
     function unsetCart(){
        jQuery.post('<?php echo Yii::app()->getBaseurl(true);?>/cms/page/delcontract',
        {},
        function(result)
        {
            window.location.reload();
        });
     }


</script>



<div class="container">






    <div class="hosting-div" style="margin-top:25px; border:solid 1px #ddd;">
        <img src="<?php  echo $themeurl?>/images/designbanner.png"  alt="#"/>

    </div>




    <?php

        foreach($pro as $p)
        {

        ?>
        <div class="product-box">

            <div class="row">
                <div class="col-md-4">
                    <img src="http://influxiq.com/uploads/product_image/image/<?php echo $p['image'] ?>"  alt="#" style="display:block; margin:0 auto;"/>

                    <div class="product-form">
                        <form  name="form1" class="new" method="post" id="formID" action="">
                            <h6>Have Questions about <span style="color:#21a2dc;">Business Standard</span>?</h6>
                            <input type="hidden" name="pack" id="pack1" value="InfluxIQ Business Standard" />
                            <input name="name" id="name1" type="text" class="loginbox" value="Name" onclick="ch1('1')"/>
                            <input name="email" id="email1" type="text" class="loginbox" value="Email" onclick="ch2('1')"/>                                       
                            <textarea type="textarea" name="comments" id="comments1" cols="" rows="" class="loginarea" onclick="ch3('1')">Questions - Comments</textarea>

                            <input name="" type="submit" value="Send" class="Send_btn2" onclick=""/>
                        </form>


                    </div>
                </div>
                <div class="col-md-8">


                    <h2><?php echo $p['name'] ?></h2>
                    <strong><?php echo  @$p['page_range'];?> pages- $<?php echo  @$p['price'];?> (Coding only $<?php echo  @$p['codeonly_price'];?>)</strong><br />


                    <?php echo $p['description']; ?> <br />
                    <br /><br />

                    <?php echo $p['feature']; ?>

                    <ul>
                        <?php

                            $list=InfluxiqProductFeature::model()->findAll('product_id='.$p['id']);

                            foreach($list as $l)
                            {

                            ?>



                            <li><?php echo $l['value'] ?></li>
                            <br>
                            <!--<li>Simple CRM Manager</li>
                            <br>
                            <li>Visitor Lead Capture System for Inbound Marketing</li>
                            <br>
                            <li>Multiple Image Gallery</li>
                            <br>
                            <li>Social Media Share tools for all the Major Social Networks</li>
                            <br>
                            <li>Facebook Fanpage Display</li>
                            <br>
                            <li>Multi-Video YouTube Agregator</li>
                            <br>
                            <li>Search Engine submission service, as well as our Premier SEO Package. This provides your web-presence with a kick start, propelling you beyond the competition.</li>
                            <br>
                            <li>Inbound Marketing System, allowing you to maximize opportunity in relationship to prospective leads who visit your website, thus enabling you to further attract their business.</li>
                            <br>
                            <li>Create content using your website's blog, sharing your posts through an RSS feed as well as a variety of social media sites including Facebook, Twitter, and Google+.</li>
                            <br>
                            <li>The ability to easily create or modify new and existing webpages, providing you control over additional content beyond that of the original design. This access is provided by a simple yet secure login, greatly enhancing your content via a user-friendly management portal.</li>
                            <br>
                            <li>Custom webpage editor, providing easy access to editable pages of one's website.</li>
                            <br>
                            <li>Complete project-consultation, beginning with a full creative-discovery interview conducted by our professional staff. Utilizing this highly collaborative methodology, we are able to determine the best possible build for each new website.</li>-->
                            <?php
                            }
                        ?>
                        <br>
                    </ul>
                    <a   href="javascript:void(0)" onclick="<?php if(!@array_key_exists(1, @$cart)) {?>showpopupdef(this) <?php }else{?> showpopup(this) <?php } ?>" product_id="<?php echo @$p['id'] ?>" cat_id="<?php echo @$p['category_id'] ?>" class="btn1">Add Contract</a>



                    <div class="clear"></div>
                    <a href="#top" style="text-align:right; display:inline-block; float:right; margin:25px 0;">Back to top</a>



                </div>



            </div>
        </div>

        <?php

        }
    ?>

    <div class="Botombg">
        <div id="downbutton">
            <a class="buttondown" target="_blank" href="http://influxiq.com/home/contact.html"></a>
        </div>
    </div>




</div>


<div style="display: none;" id="pop">
    <div class="popcontainer">
        <a href="javascript:void(0);" class="cross-contract" onclick="jQuery.unblockUI()"></a>
        <div class="popcontainer-black">Select Contract Option</div>
        <div class="popcontainer-white">
            <?php 
                if(!@array_key_exists(1, @$cart))
                {
                ?>
                <input type="radio" class="chkPage" name="chkPage" value="website-products">&nbsp;&nbsp;Platform<br><br />
                <?php 
                }
                if(!@array_key_exists(3, @$cart))
                {
                ?>
                <input type="radio" class="chkPage" name="chkPage" value="content-developement">&nbsp;&nbsp;Content<br><br />
                <?php 
                }
                if(!@array_key_exists(4, @$cart))
                {
                ?>
                <input type="radio" class="chkPage" name="chkPage" value="internet-marketing">&nbsp;&nbsp;Marketing<br><br />
                <?php 
                }
            ?>
            <input type="image" src="<?php echo $themeurl; ?>/images/contractgobtn.png" style="border:none; background:#ededed;" width="172" height="29" alt="go" value="ok" onclick="redir(this)" />
            <input type="image" src="<?php echo $themeurl; ?>/images/contractgobtn2.png" style="border:none; background:#ededed;" width="172" height="29" alt="view contract" value="ok" onclick="window.location.href='<?php echo Yii::app()->getBaseUrl(true)."/contract"; ?>'" /><br />
                    <input type="image" src="<?php echo $themeurl; ?>/images/contractgobtn3.png" style="border:none; background:#ededed;" width="172" height="29" alt="view contract" value="ok" onclick="unsetCart()" />
        </div>
    </div>
</div>

<div style="display: none;" id="pop_def">
    <?php //echo count($m_is_cart_insert); ?>
    <div class="popcontainer" style="height:400px;">
        <a href="javascript:void(0);" class="cross-contract" onclick="jQuery.unblockUI()"></a>
        <div class="popcontainer-black">Select Contract Option</div>
        <div style="font-size: 13px;"></div>
        <div class="popcontainer-white" style="padding-right: 17px;">
            <img src="<?php echo $themeurl; ?>/images/abc.jpg" style="max-width: 470px; width:100%" />
            <input type="image" src="<?php echo $themeurl; ?>/images/contractgobtn.png" style="border:none; background:#ededed;" width="172" height="29" alt="view contract" value="ok" onclick="window.location.href='<?php echo Yii::app()->getBaseurl(true)."/website-products"; ?>'" />
        </div>
    </div>
        </div>




 <div class="footer-block">
     <div class="container">






