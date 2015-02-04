 <?php $themeurl=yii::app()->theme->baseurl;
$pro=InfluxiqProduct::model()->findAll('category_id=3 and i_active=1 ORDER BY `order`');

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


 <script type="text/javascript">

    function showpopup(e)
    {
      var product_id= $(e).attr('product_id');
      var type = 3;
      var value = $(e).attr('pac');

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
        
        foreach($package as $key=>$mRow)
        {
            if($mRow['duration'] == 'Monthly')
            {
               $product[$i]['mPrice'] = $mRow['price']; 
               $product[$i]['mId'] = $mRow['id']; 
            }
            
            $package1[$key] = $mRow;
            
        }
        
        $product[$i]['packages'] = $package1;                                                                                                                                                                                                                                                                                                                                                                                          
        
       
        
    }
    
    
?>


     <div class="container">
     
      <div class="hosting-div" style="margin:25px 0 0 0; border:solid 1px #ddd;">
      <img src="<?php  echo $themeurl?>/images/contentbanner.jpg"  alt="#"/>
      
      </div>
      
    
         <div class="about1">
        <p>Getting content developed for your new website is extremely important.  You can do this yourself, hire a PR company or you are welcome to use us.  Our content writers are seasoned and know how to research for the right keywords.  We will analyze your competition, figure out your local markets and work with your current content.<br />
<br />

 If you are buying a technology package from us I would highly suggest getting a content package to go with your new platform!</p>
    </div>

    <div class="clear"></div>

    <div class="aboutbox">
        <div class="aboutbox_left" style="padding:">
            Contact a representative today and learn more about how the Influx IQ Development Group can enhance your business</div>
        <div class="aboutbox_right"><div id="downbutton"><a href="<?php echo $themeurl; ?>/home/contact.html" class="buttondown"></a></div></div>
           <div class="clear"></div>
    </div>

    <div class="clear"></div>

      
          <div class="search_marketing_package">
        <div style="width:100%;  margin:0 0 25px 0;"><table width="100%" cellspacing="0" cellpadding="0" align="center" >

                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" align="center">

                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0" align="center">

                                        <tr>
                                            <td width="40%" height="35">&nbsp;</td>
                                            <td width="15%" class="searchpackagemenutab"><?php echo ucwords(@$product[1]['name']) ?></td>
                                           
                                            <td width="15%" class="searchpackagemenutab2"><?php echo ucwords(@$product[2]['name']) ?></td>
                                          
                                            <td width="15%" class="searchpackagemenutab3"><?php echo ucwords(@$product[3]['name']) ?></td>
                                          
                                            <td width="15%" class="searchpackagemenutab4"><?php echo ucwords(@$product[4]['name']) ?></td>
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
                                                            <td align="left" valign="top"  width="100%" style="padding:0 0 10px 0; font-size:16px;">Get a hold of us</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"  width="100%">
                                                                <input type="hidden" name="pack" id="pack1" value="SEO" />
                                                                <input type="hidden" name="formid" id="formid1" value="1" />
                                                                <input name="name" id="name1" type="text" class="loginbox" value="Name" onclick="ch1('1')"/><div <?php echo (@$form_name!=1)?"style='display:none';":""; ?>><?php //echo form_error('name'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"  width="100%"><input name="email" id="email1" type="text" class="loginbox" value="Email" onclick="ch2('1')"/><div <?php echo (@$form_name!=1)?"style='display:none';":""; ?>><?php //echo form_error('email'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"  width="100%"><textarea name="comments" id="comments1" cols="" rows="" class="loginarea" onclick="ch3('1')">Questions - Comments</textarea><div <?php echo (@$form_name!=1)?"style='display:none';":""; ?>><?php //echo form_error('comments'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" valign="top"  width="100%"><input name="" type="submit" value="Send" class="Send_btn2"/></td>
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
                                                                    <td width="25%" valign="top" height="240"  bgcolor="#caeaff" style="border-right:solid 1px #fff;">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">

                                                                           <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mPrice']; ?>"><img width="99" height="28" src="<?php //echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->

                                           <table width="98%" cellspacing="0" cellpadding="0" align="center">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                                               
                                                                               <div style="width:100%; height:50px;"></div>
                                                <?php
                                                  if(count($product[1]['packages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pac<?php echo @$product[1]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[1]['packages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo "One Time";//@$row['duration'];?></option>
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
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="<?php if(!@array_key_exists(1, @$cart)) {?>showpopupdef(this) <?php }else{?> showpopup(this) <?php } ?>" product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mId']; ?>"><img width="99" height="28" src="<?php echo $themeurl; ?>/images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>


                                                                    </td>
                                                                    
                                                                    <td style="padding:0 0 0 4px;" width="25%" valign="top" height="240" bgcolor="#caeaff" >
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mPrice']; ?>"><img width="99" height="28" src="<?php //echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                                               
                                                                                <div style="width:100%; height:50px;"></div>
                                                <?php
                                                  if(count($product[2]['packages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pac<?php echo @$product[2]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[2]['packages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo "One Time";//@$row['duration'];?></option>
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
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="<?php if(!@array_key_exists(1, @$cart)) {?>showpopupdef(this) <?php }else{?> showpopup(this) <?php } ?>"   product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mId']; ?>"><img width="99" height="28" src="<?php echo $themeurl; ?>/images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                   
                                                                    <td width="25%" valign="top" height="240" bgcolor="#caeaff" style="border-right:solid 1px #fff;  border-left:solid 1px #fff;">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mPrice']; ?>"><img width="99" height="28" src="<?php //echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                                                <div style="width:100%; height:50px;"></div>
                                                <?php
                                                  if(count($product[3]['packages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pac<?php echo @$product[3]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[3]['packages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo "One Time";//@$row['duration'];?></option>
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
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="<?php if(!@array_key_exists(1, @$cart)) {?>showpopupdef(this) <?php }else{?> showpopup(this) <?php } ?>"  product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mId']; ?>"><img width="99" height="28" src="<?php echo $themeurl; ?>/images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                  
                                                                    <td width="25%" valign="top" height="240" bgcolor="#caeaff" style="border-right:solid 1px #fff;">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
                                        
                                                                            <tr>
                                                                                <td height="35" style="text-align:center">Monthly</td>
                                                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mPrice']; ?>"><img width="99" height="28" src="<?php //echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
                                                 
                                                <table width="98%" cellspacing="0" cellpadding="0" align="center">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                                               
                                                                                <div style="width:100%; height:50px;"></div>
                                                <?php
                                                  if(count($product[4]['packages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pac<?php echo @$product[4]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[4]['packages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo "One Time";//@$row['duration'];?></option>
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
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="<?php if(!@array_key_exists(1, @$cart)) {?>showpopupdef(this) <?php }else{?> showpopup(this) <?php } ?>" product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mId']; ?>"><img width="99" height="28" src="<?php echo $themeurl; ?>/images/getstarted.jpg" alt="" /></a></td>
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
                                                                    <td width="25%" valign="top" class="wosconts1" style="vertical-align: text-top"><?php echo @$product[1]['description']; ?></td>
                                                                   
                                                                    <td width="25%" valign="top" class="wosconts2" style="vertical-align: text-top"><?php echo @$product[2]['description']; ?></td>
                                                                   
                                                                    <td width="25%" valign="top" class="wosconts3" style="vertical-align: text-top"><?php echo @$product[3]['description']; ?></td>
                                                                 
                                                                    <td width="25%" valign="top" class="wosconts4" style="vertical-align: text-top"><?php echo @$product[4]['description']; ?></td>
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
                                <td width="100%" height="35" style="padding-left:14px;">&nbsp;Content Development Services</td>
                                
                              
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
                                            <td width="40%" height="35" bgcolor="#0783d2" style="padding-left:14px; color:#fff;">&nbsp;Number Of Content Pages Made</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">5 To 7 Pages</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><?php /*1 To 2 */ ?>7 To 15 Pages</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center"><?php /*7 To 10*/ ?>15 To 20 Pages</td>
                                            <td width="15%" bgcolor="#e0e0e0" style="text-align:center">Additional Pages</td>
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
                                            <td width="307" height="35" style="padding-left:14px;">&nbsp;Company Interview &amp; Content Analysis</td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="15%" style="text-align:center"><img width="17" height="17" src="<?php echo $themeurl; ?>/images/searchmarketing_wright.png" alt="" /></td>
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
                if(!@array_key_exists(2, @$cart))
                {
                ?>
                <input type="radio" class="chkPage" name="chkPage" value="website-designing">&nbsp;&nbsp;Design<br><br />
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
             <input type="image" src="<?php echo $themeurl; ?>/images/contractgobtn2.png" style="border:none; background:#ededed;" width="172" height="29" alt="view contract" value="ok" onclick="window.location.href='<?php echo Yii::app()->getBaseUrl(true)."/contract"; ?>'" /><br /><br />
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






