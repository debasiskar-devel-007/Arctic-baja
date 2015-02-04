<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>azcowtown</title>
    </head>
    <body style="background:#ededed; margin:0; padding:0;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="background:#f2eded;">
            <tr>
                <td>
                    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style=" padding:0 10px 10px 10px; font-family:Arial, Helvetica, sans-serif;">

                        
                        <tr>
                            <td style=" padding:20px 0 0px 0;" colspan="2" valign="middle" align="center"><a href="javascript:void(0);"><img src="http://shop.azcowtown.com/themes/cow/images/logo.png" border="0"   alt="#" style=" margin:10px auto; display:block; width:90%;"/></a></td>
                        </tr>


                        <tr>
                            <td colspan="2" style="font-size:12px; color:#333; padding:10px 0;">

                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="background:#fd8c21; border:solid 2px #fff ; padding:10px; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#fff;">
                                            <span style=" float:left; display:block; width:280px;"><strong style="font-weight:normal; color:#000;">Dear:</strong> <?php echo ucfirst($order_ship_bill_details['billing_fname']).' '.ucfirst($order_ship_bill_details['billing_lname']);?>, <strong style="font-weight:normal; color:#000;">Your Order ID :</strong> #<?php echo str_pad($orderId, 6, "0", STR_PAD_LEFT);?></span>

                                            <span style="float:right; text-align:right; display:block; width:250px;"><strong style="font-weight:normal; color:#000;">Order Placed on :</strong> <?php echo date('Y-m-d h:i A',$order_ship_bill_details['order_time']);?></span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; line-height:22px; padding:10px 0;">You have done all the hard work!! Now sit back and relax. We will send you an Email and SMS the moment your order items are dispatched to your address.</td>
                                    </tr>
                                    <tr>
                                        <td style="background:#fd8c21; border:solid 2px #fff ; padding:10px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000;">
                                            Order Details :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="padding:10px; font-size:16px; color:#f38c02; border-bottom:solid 1px #f38c02;">S.no</td>
                                                    <td style="padding:10px; font-size:16px; color:#f38c02;  border-bottom:solid 1px #f38c02;">Item name</td>
                                                    <td style="padding:10px; font-size:16px; color:#f38c02;  border-bottom:solid 1px #f38c02;">Quantity</td>
                                                    <td style="padding:10px; font-size:16px; color:#f38c02;  border-bottom:solid 1px #f38c02;">Price</td>
                                                    <td style="padding:10px; font-size:16px; color:#f38c02;  border-bottom:solid 1px #f38c02;">#</td>
                                                </tr>
                                                <?php
                                                   $p=0;
                                                    foreach($order_product_details as $pro){
                                                        $p++;
                                                        ?>
                                                        <tr>
                                                        <td style="padding:10px; font-size:14px; color:#333333; border-bottom:solid 1px #fff;"><?php echo $p;?></td>
                                                        <td style="padding:10px; font-size:14px; color:#333333; border-bottom:solid 1px #fff;"><?php echo ucwords($pro['product_name']);?></td>
                                                        <td style="padding:10px; font-size:14px; color:#333333; border-bottom:solid 1px #fff;"><?php echo $pro['product_quantity'];?></td>
                                                        <td style="padding:10px; font-size:14px; color:#333333; border-bottom:solid 1px #fff;"><?php echo number_format($pro['product_quantity']*$pro['product_price'], 2, '.', '');?></td>
                                                        <td style="padding:10px; font-size:14px; color:#333333; border-bottom:solid 1px #fff;"><?php echo ($pro['product_type']==0)?"<a href=\"".Yii::app()->getBaseUrl(true)."/product/default/download-product/id/".$dproduct[$pro['product_id']]."\">Download</a>":"";?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                ?>
                                            </table>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background:#fd8c21; border:solid 2px #fff ; padding:5px 10px 20px 10px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:22px; color:#fff;"><!--
                                            <p><strong style="color:#6cc7f7; font-weight:normal;">*Note:</strong> All download file will valid for 72 hours. You can download each product for 
                                            maximam 5 time.</p>
                                            -->
                                            <span style=" float:left; display:block; width:280px; line-height:30px;">
                                                <strong style="color:#000; font-weight:normal;">Shipping Address :</strong><br />

                                                <?php echo ucfirst($order_ship_bill_details['shipping_fname']).' '.ucfirst($order_ship_bill_details['shipping_lname']).'<br />'.
                                                $order_ship_bill_details['shipping_add'].','.$order_ship_bill_details['shipping_city'].'-'.$order_ship_bill_details['shipping_zip'].','.$order_ship_bill_details['shipping_state_name'].','.$order_ship_bill_details['shipping_country_name'];?></span>

                                            <span style="float:right; text-align:right; display:block; width:250px; line-height:30px;">
                                                <strong style="color:#000; font-weight:normal;">Total Amount :</strong> $<?php echo $order_ship_bill_details['subtotal'];?><br />
                                                <strong style="color:#000; font-weight:normal;">Shipping Charges:</strong> $<?php echo $order_ship_bill_details['shiping_charge'];?><br />
                                                <strong style="color:#000; font-weight:normal;">Payable Amount :</strong> $<?php echo $order_ship_bill_details['total'];?>
                                            </span>


                                        </td>
                                    </tr>
                                </table>





                            </td>
                        </tr>

                        <tr>
                           
                        </tr>
                        <td width="255" colspan="2" style="font-size:11px; color:#fff;  text-align:right; padding:2px 10px 15px 20px; background:#fd8c21; text-align:center;">Copyright &copy; Allrights Reserved.</td>
                    </table>
                </td>
            </tr>
        </table>



    </body>
</html>
  