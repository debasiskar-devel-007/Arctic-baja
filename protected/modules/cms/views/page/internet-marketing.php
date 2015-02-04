 <?php $themeurl=yii::app()->theme->baseurl;
$pro=InfluxiqProduct::model()->findAll('category_id=4 and i_active=1 ORDER BY `order`');
 $cart = Yii::app()->session['cart'];


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
      var type = 4;
      var value = $('#pacoff'+product_id).find('option:selected').attr('selId');

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


 function change_price(e)
    {
        text = $(e).find('option:selected').text();
        value = $(e).val();
        $(e).closest('tr').next('tr').html('<td style="text-align:center" height="35">'+text+'</td>');
        $(e).closest('tr').next('tr').next('tr').html('<td style="text-align:center" class="bluetextbold" height="35">$'+value+'</td>');
    }
 </script>
 
 <?php
    $i=0;
    foreach($pro as $row)
    {
        $i++;
        $product[$i]['id'] = $row['id'];                                                                                                                                                                                                                                                                                                                                                                                           
        $product[$i]['name'] = $row['name'];                                                                                                                                                                                                                                                                                                                                                                                           
        $product[$i]['description'] = $row['description'];  
        
        $package = InfluxiqProductPackages::model()->findAll('product_id='.$row['id']);
        $package1 = array();
        
        foreach($package as $mRow)
        {
            if($mRow['duration'] == 'Monthly' && $mRow['status'] == 1)
            {
                $product[$i]['mOffPrice'] = $mRow['price']; 
                $product[$i]['mOffid'] = $mRow['id']; 
            }
            if($mRow['duration'] == 'Monthly' && $mRow['status'] == 2)
            {
               $product[$i]['mOnPrice'] = $mRow['price']; 
               $product[$i]['mOnid'] = $mRow['id']; 
            }
            
            if($mRow['status'] == 1)
            {
                $product[$i]['offPackages'][count(@$product[$i]['offPackages'])] = $mRow;                                                                                                                                                                                                                                                                                                                                                                                           
            }
            if($mRow['status'] == 2)
            {
               $product[$i]['onPackages'][count(@$product[$i]['onPackages'])] = $mRow;                                                                                                                                                                                                                                                                                                                                                                                           
            }
        }                                                                                                                                                                                                                                                                                                                                                                                          
    }
?>





     <div class="container">
     
     <div class="seo-banner1" style="margin-top:25px; border:solid 1px #ddd;">
        <div id="slideshow1" class="pics">
            <a href="#"><img src="<?php echo $themeurl; ?>/images/seo-banner1.jpg" width="100%" height="338" /></a>
            <!--<a href="#"><img src="<?php echo $themeurl; ?>/images/seo-banner2.jpg" width="960px" height="338" /></a>
            <a href="#"><img src="<?php echo $themeurl; ?>/images/seo-banner3.jpg" width="960px" height="338" /></a>
            <a href="#"><img src="<?php echo $themeurl; ?>/images/seo-banner4.jpg" width="960px" height="338" /></a>    -->    
        </div>
        <div class="clr"></div>
    </div>
    
    
       <div class="about1">
        <p>Internet Marketing is one of the most interesting lines of work</strong>. It requires a very agaile and creative mind to be able to balance between the logic of the search engines and the conversion of the prospect.<br />
<br />

        We have been working with marketing directives for a large number of years and have masterd the art of inbound marketing. We would love the chance to give your company the insight and success it deservies through a strong internet marketing campain.</p>
    </div>
    <!--................................. START GET STARTED AREA ............................................................-->
    <div class="aboutbox">
        <div class="aboutbox_left" style="padding:25px 0;">
           Contact a representative today and learn more about how the Influx IQ Development Group can enhance your business</div>
        <div class="aboutbox_right"><div id="downbutton"><a href="<?php //echo base_url() ?>home/contact.html" class="buttondown"></a></div></div>
            <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!--................................. END GET STARTED AREA ............................................................-->
    <div class="search_marketing_package" style="width:100%;">
        <div style="width:100%; float:left; margin:0 0;"><table width="100%" cellspacing="0" cellpadding="0" align="center" >

                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" align="center">

                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0" align="center">

                                        <tr>
                                            <td width="40%" height="35">&nbsp;</td>
                                            <td width="15%" class="searchpackagemenutab" ><?php echo ucwords(@$product[1]['name']) ?></td>
                                           
                                            <td width="15%" class="searchpackagemenutab2"><?php echo ucwords(@$product[2]['name']) ?></td>
                                           
                                            <td width="15%" class="searchpackagemenutab3"><?php echo ucwords(@$product[3]['name']) ?></td>
                                            
                                            <td width="15%" class="searchpackagemenutab4" ><?php echo ucwords(@$product[4]['name']) ?></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" class="wos">
                                                <?php if(@$form_name==1){echo show_msg();} ?>
                                                <form id="from1" name="from1" action="" method="post">
                                                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="margin-left:2px;">
                                                        <tr>
                                                            <td align="left" valign="top" style="padding:0 0 10px 0; font-size:16px;">Get a hold of us</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <input type="hidden" name="pack" id="pack1" value="SEO" />
                                                                <input type="hidden" name="formid" id="formid1" value="1" />
                                                                <input name="name" id="name1" type="text" class="loginbox" value="Name" onclick="ch1('1')"/><div <?php echo (@$form_name!=1)?"style='display:none';":""; ?>><?php //echo form_error('name'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"><input name="email" id="email1" type="text" class="loginbox" value="Email" onclick="ch2('1')"/><div <?php echo (@$form_name!=1)?"style='display:none';":""; ?>><?php //echo form_error('email'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"><textarea name="comments" id="comments1" cols="" rows="" class="loginarea" onclick="ch3('1')">Questions - Comments</textarea><div <?php echo (@$form_name!=1)?"style='display:none';":""; ?>><?php //echo form_error('comments'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2"/></td>
                                                        </tr>
                                                    </table>
                                                </form>

                                            </td>
                                            <td width="60%" valign="top">
                                                <table width="100%" cellspacing="0" cellpadding="0">

                                                    <tr>
                                                        <td>
                                                            <table width="100%" cellspacing="0" cellpadding="0">

                                                                <tr>
                                                                    <td width="25%" valign="top" height="240" bgcolor="#caeaff" style="border-right:solid 1px #fff; ">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mOffPrice']; ?>"><img width="99" height="28" src="<?php //echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                                               
                                                                                 <div style="width:100%; height:50px;"></div>
                                                <?php
                                                  if(count($product[1]['offPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacoff<?php echo @$product[1]['id']; ?>" style="margin:0px auto; width:80%; display:block;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[1]['offPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
                                              </td>
                                                                            </tr>
                                              <tr>
                                                                                <td height="35" style="text-align:center">One Time</td>
                                                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="<?php if(!@array_key_exists(1, @$cart)) {?>showpopupdef(this) <?php }else{?> showpopup(this) <?php } ?>" product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mOffid']; ?>"><img width="99" height="28" src="<?php echo $themeurl; ?>/images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>                                                                    </td>
                                                                   
                                                                    <td width="25%" valign="top" height="110" bgcolor="#caeaff" style="border-right:solid 1px #fff; ">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this,'off')" product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mOffPrice']; ?>"><img width="99" height="28" src="<?php //echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center" >

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                                               
                                                                                <div style="width:100%; height:50px;"></div>
                                                <?php
                                                  if(count($product[2]['offPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacoff<?php echo @$product[2]['id']; ?>" style="margin:0px auto; width:80%; display:block;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[2]['offPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
                                              </td>
                                                                            </tr>
                                              <tr>
                                                                                <td height="35" style="text-align:center">One Time</td>
                                                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="<?php if(!@array_key_exists(1, @$cart)) {?>showpopupdef(this) <?php }else{?> showpopup(this) <?php } ?>" product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mOffid']; ?>"><img width="99" height="28" src="<?php echo $themeurl; ?>/images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                   
                                                                    <td width="25%" valign="top" height="110" bgcolor="#caeaff" style="border-right:solid 1px #fff; ">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mOffPrice']; ?>"><img width="99" height="28" src="<?php //echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center" >

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                                                <div style="width:100%; height:50px;"></div>
                                                <?php
                                                  if(count($product[3]['offPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacoff<?php echo @$product[3]['id']; ?>" style="margin:0px auto; width:80%; display:block;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[3]['offPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
                                              </td>
                                                                            </tr>
                                              <tr>
                                                                                <td height="35" style="text-align:center">One Time</td>
                                                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="<?php if(!@array_key_exists(1, @$cart)) {?>showpopupdef(this) <?php }else{?> showpopup(this) <?php } ?>" product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mOffid']; ?>"><img width="99" height="28" src="<?php echo $themeurl; ?>/images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                   
                                                                    <td width="25%" valign="top" height="110" bgcolor="#caeaff" style="border-right:solid 1px #fff; ">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mOffPrice']; ?>"><img width="99" height="28" src="<?php //echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center" >

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                                                 <div style="width:100%; height:50px;"></div>
                                                <?php
                                                  if(count($product[4]['offPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacoff<?php echo @$product[4]['id']; ?>" style="margin:0px auto; width:80%; display:block;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[4]['offPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
                                              </td>
                                                                            </tr>
                                              <tr>
                                                                                <td height="35" style="text-align:center">One Time</td>
                                                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="<?php if(!@array_key_exists(1, @$cart)) {?>showpopupdef(this) <?php }else{?> showpopup(this) <?php } ?>" product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mOffid']; ?>"><img width="99" height="28" src="<?php echo $themeurl; ?>/images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table width="100%" cellspacing="0" cellpadding="0">

                                                                <tr>
                                                                    <td width="25%" valign="top" class="wosconts1"><?php echo @$product[1]['description']; ?></td>
                                                                 
                                                                    <td width="25%" valign="top" class="wosconts2"><?php echo @$product[2]['description']; ?></td>
                                                                 
                                                                    <td width="25%" valign="top" class="wosconts3"><?php echo @$product[3]['description']; ?></td>
                                                                
                                                                    <td width="25%" valign="top" class="wosconts4"><?php echo @$product[4]['description']; ?></td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
                
                
                
                
                <tr>
                    <td height="40">
                        <table width="100%" cellspacing="0" cellpadding="0" class="searchpackagetittlebg">

                            <tr>
                                <td width="100%" height="35" style="padding-left:14px;">&nbsp;Off  page Optimization</td>
                               
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="border:#ccc 1px solid;">
                        <table width="100%" cellspacing="0" cellpadding="0">                            
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" bgcolor="#0783d2" style="padding-left:14px; color:#fff;">&nbsp;Keywords Optimized</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">2</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">3</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">5</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">10</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" style="padding-left:14px;">&nbsp;Competition Research</td>
                                           
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" bgcolor="#0783d2" style="padding-left:14px; color:#fff;">&nbsp;Reporting Generated Monthly</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" style="padding-left:14px;">&nbsp;Search Engine Submissions</td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table cellspacing="0" cellpadding="0" width="100%">

                                        <tr>
                                            <td width="40%" height="35" bgcolor="#0783d2" style="padding-left:14px; color:#fff;">&nbsp;Directory Submission</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">3 Posts</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">5 Posts</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">7 Posts</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">15 Posts</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" style="padding-left:14px;">&nbsp;Article Submission [Unique content]</td>
                                            <td width="15%" style="text-align:center">5 Custom</td>
                                            <td width="15%" style="text-align:center">10 Custom</td>
                                            <td width="15%" style="text-align:center">15 Custom</td>
                                            <td width="15%" style="text-align:center">25 Custom</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" bgcolor="#0783d2" style="padding-left:14px; color:#fff;">&nbsp;Blog Posting</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">1 Posts</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">2 Posts</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">4 Posts</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">10 Posts</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" style="padding-left:14px;">&nbsp;Press Release Submission [Unique content]</td>
                                            <td width="15%" style="text-align:center">1 Custom</td>
                                            <td width="15%" style="text-align:center">3 Custom</td>
                                            <td width="15%" style="text-align:center">7 Custom</td>
                                            <td width="15%" style="text-align:center">14 Custom</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
               <?php /* <tr><td colspan="5" height="20"></td></tr>
                <tr>
                    <td>
                        <table width="785" cellspacing="0" cellpadding="0">

                            <tr>
                                <td>
                                    <table width="785" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="319" height="35">&nbsp;</td>
                                            <td width="118" class="searchpackagemenutab" style="vertical-align: top;"><?php echo ucwords(@$product[1]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="120" class="searchpackagemenutab2"><?php echo ucwords(@$product[2]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="119" class="searchpackagemenutab3"><?php echo ucwords(@$product[3]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="118" class="searchpackagemenutab4"><?php echo ucwords(@$product[4]['name']) ?></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" class="wos">
                                                <?php if(@$form_name==2){echo show_msg();} ?>
                                                <form id="from2" name="from2" action="" method="post">

                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-left:2px;">
                                                        <tr>
                                                            <td align="left" valign="top" style="padding-left:10px;">Get a hold of us</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <input type="hidden" name="pack" id="pack2" value="SEO" /> 
                                                                <input type="hidden" name="formid" id="formid2" value="2" />
                                                                <input name="name" id="name2" type="text" class="loginbox" value="Name" onclick="ch1('2')"/>
                                                                <div <?php echo (@$form_name!=2)?"style='display:none';":""; ?>><?php echo form_error('name'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"><input name="email" id="email2" type="text" class="loginbox" value="Email" onclick="ch2('2')"/>
                                                                <div <?php echo (@$form_name!=2)?"style='display:none';":""; ?>><?php echo form_error('email'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"><textarea name="comments" id="comments2" cols="" rows="" class="loginarea" onclick="ch3('2')">Questions - Comments</textarea>
                                                                <div <?php echo (@$form_name!=2)?"style='display:none';":""; ?>><?php echo form_error('comments'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2"/></td>
                                                        </tr>
                                                    </table>
                                                </form>


                                            </td>
                                            <td width="475" valign="top">
                                                <table width="475" cellspacing="0" cellpadding="0">

                                                    <tr>
                                                        <td>
                                                            <table width="475" cellspacing="0" cellpadding="0">

                                                                <tr>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mOnPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[1]['onPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacon<?php echo @$product[1]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[1]['onPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
                                              </td>
                                                                            </tr>
                                              <tr>
                                                                                <td height="35" style="text-align:center">One Time</td>
                                                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[1]['onPackages']) > 1) { ?> onclick="showpopup1(this,'on')" <?php }else {?> onclick="showpopup(this)" <?php } ?> product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mOnid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mOnPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[2]['onPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacon<?php echo @$product[2]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[2]['onPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
                                              </td>
                                                                            </tr>
                                              <tr>
                                                                                <td height="35" style="text-align:center">One Time</td>
                                                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[2]['onPackages']) > 1) { ?> onclick="showpopup1(this,'on')" <?php }else {?> onclick="showpopup(this)" <?php } ?> product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mOnid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mOnPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[3]['onPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacon<?php echo @$product[3]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[3]['onPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
                                              </td>
                                                                            </tr>
                                              <tr>
                                                                                <td height="35" style="text-align:center">One Time</td>
                                                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[3]['onPackages']) > 1) { ?> onclick="showpopup1(this,'on')" <?php }else {?> onclick="showpopup(this)" <?php } ?> product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mOnid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>                                                                    </td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mOnPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[4]['onPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacon<?php echo @$product[4]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[4]['onPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
                                              </td>
                                                                            </tr>
                                              <tr>
                                                                                <td height="35" style="text-align:center">One Time</td>
                                                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[4]['onPackages']) > 1) { ?> onclick="showpopup1(this,'on')" <?php }else {?> onclick="showpopup(this)" <?php } ?> product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mOnid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table width="475" cellspacing="0" cellpadding="0">

                                                                <tr>
                                                                    <td width="118" valign="top" class="wosconts1"><?php echo character_limiter(@$product[1]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts2"><?php echo character_limiter(@$product[2]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts3"><?php echo character_limiter(@$product[3]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts4"><?php echo character_limiter(@$product[4]['description'],130); ?></td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>      */ ?>
                <tr>
                    <td height="40" class="searchpackagetittlebg">&nbsp;On Page Optimization</td>
                </tr>
                <tr>
                    <td style="border:solid 1px #CCCCCC;">
                        <table width="100%" cellspacing="0" cellpadding="0">


                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">                                        
                                        <tr>
                                            <td width="40%" height="35" style="padding-left:14px; background:#0783d2; color:#fff;">&nbsp;Website Analysis</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>                                        
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" style="padding-left:14px;">&nbsp;Competitor Site Analysis</td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" bgcolor="#0783d2" style="padding-left:14px; color:#fff;">&nbsp;keywords  Research &amp; Optimization</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" style="padding-left:14px;">&nbsp;Title Tag Optimization</td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" bgcolor="#0783d2" style="padding-left:14px; color:#fff;">&nbsp;Meta Description Optimization</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" style="padding-left:14px;">&nbsp;Images Optimization</td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" bgcolor="#0783d2" style="padding-left:14px; color:#fff;">&nbsp;URL Rewriting (On Systems that allows this)</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" style="padding-left:14px;">&nbsp;Checking site for W3C compliance</td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" bgcolor="#0783d2" style="padding-left:14px; color:#fff;">&nbsp;Broken links check</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" style="padding-left:14px;">&nbsp;HTML error check</td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="40%" height="35" bgcolor="#0783d2" style="padding-left:14px; color:#fff;">&nbsp;Content Fixing Suggestions</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>



            </table></div>
    </div>
   <div class="clear"></div>
    <!--................................. START GET STARTED AREA ............................................................-->
    <div class="aboutbox" style="margin-top:30px;">
       <div class="aboutbox_left" style="padding:25px 0; ">
           Contact a representative today and learn more about how the Influx IQ Development Group can enhance your business</div>
        <div class="aboutbox_right"><div id="downbutton"><a href="http://influxiq.com/home/contact.html" target="_blank" class="buttondown"></a></div></div>
         <div class="clear"></div>
    </div>
   <div class="clear"></div>


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
                if(!@array_key_exists(2, @$cart))
                {
                ?>
                <input type="radio" class="chkPage" name="chkPage" value="website-designing">&nbsp;&nbsp;Design<br><br />
                <?php 
                }
                if(!@array_key_exists(3, @$cart))
                {
                ?>
                <input type="radio" class="chkPage" name="chkPage" value="content-developement">&nbsp;&nbsp;Content<br><br />
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






