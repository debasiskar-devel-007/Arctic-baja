<?php 
$base=yii::app()->request->baseurl;
?>
<!DOCTYPE html>
<html>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="border:solid 1px #ddd; background:#fefcfc; padding:10px; font-family:Arial, Helvetica, sans-serif;">
        <tr>
          <td colspan="2" style="font-size:12px; color:#333; "><table width="auto" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="11" style="background:#0879D1; width:600px; height:20px; padding:5px 10px; font-size:14px; color:#fff">Autoship Details :</td>
              </tr>
              <tr>
                <td width="41" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>S.no</strong></td>
                <td width="41" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Autoship Response Code</strong></td>
                <td width="163" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Item name</strong></td>
                <td width="57" style="padding:5px ; border-bottom:solid 1px #ccc;"><strong>Quantity</strong></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Amount</strong></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Autoship Response Text</strong></td>
                <td width="20" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Total Occurrences</strong></td>
                <td width="20" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Start Date</strong></td>
                <td width="20" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Sub Interval</strong></td>
                <td width="20" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Cancel Date</strong></td>
                <td width="20" style="padding:5px; border-bottom:solid 1px #ccc;"><strong>Action</strong></td>
              </tr>
              
              <?php
    if(count($model) > 0){
        $i=0;
        foreach($model as $row){
?>
              
              <tr>
                <td width="41" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo ++$i;?></td>
                
                <td width="163" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['autoship_response_code'];?></td>
                <td width="163" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['product_name'];?></td>
                <td width="57" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['quantity'];?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['amount'];?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo ($row['status'] == 2)?'Cancelled':$row['autoship_response_text'];?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['totalOccurrences'];?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['start_date'];?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['sub_interval'].' month';?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php echo $row['cancel_date'];?></td>
                <td width="50" style="padding:5px; border-bottom:solid 1px #ccc;"><?php if($row['status'] == 1){?><a id="<?php echo $row['id'];?>" href="javascript:void(0);" rel="tooltip" onclick="cancel_subscription(this)" data-original-title="Cancel Autoship">Cancel Autoship</a><!--<br /><a id="<?php //echo $row['id'];?>" href="javascript:void(0);" rel="tooltip" onclick="update_subscription_form(this)" data-original-title="Update Autoship">Update Autoship</a>--><?php } ?></td>
              </tr>
              <?php
        }}
?>
              
            
        </tr>
        
              </table></td>
  </tr>
</table>

</body>
</html>
