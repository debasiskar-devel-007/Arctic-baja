 <?php $themeurl=yii::app()->theme->baseurl;
 
 $content1 = InfluxiqContract::model()->findAll('id=1');
 
 foreach($content1 as $row){
     $header = $row['header'];
     $terms_conditions = $row['terms_conditions'];
     $footer = $row['footer'];
 }


 
$cart = Yii::app()->session['cart'];



$price = 0;
    $marketPack = '';
    $pcost="";
    $have_duration=0;

 ?>
 
 <script>
 $(function(){
    $(".removeBut").click(function(){
       var cat_id=jQuery(this).attr('cat_id');
       jQuery.post('<?php echo Yii::app()->getBaseurl(true);?>/cms/page/deleteCart',{'cat_id':cat_id},function(res){
           
               alert('This Product removed from cart');
               window.location.reload(true);
            
           });
      // alert(prod_id);
      }); 
 });

 function unsetCart(){
     jQuery.post('<?php echo Yii::app()->getBaseurl(true);?>/cms/page/delcontract',
         {},
         function(result)
         {
             window.location.href='<?php echo Yii::app()->getbaseurl(true);?>';
         });
 }

 </script>
 
 <div style="width:960px; margin:0 auto;">

  <div style="width:926px; background:#c9c9c9; border:#b6b6b6 solid 1px; padding:0 15px 0 18px;">
       <div style="width:905px; margin:20px auto; background:#eeeeee; padding:10px;">
  <?php echo html_entity_decode($header, ENT_QUOTES, 'utf-8');?>      

       </div>
     </div>
     
     
     
<?php

if(count($cart)){
    foreach($cart as $key=>$val){
        
    $cat=InfluxiqCategory::model()->findAll('id='.$key);
    $pro=InfluxiqProduct::model()->findAll('id='.$val['id']);
    $package = InfluxiqProductPackages::model()->findAll('id='.$val['pacid']);
?>

<div style="width:960px; margin:20px 0 30px 0;">
     <div style="width:960px; background:#1c1c1c; margin:0 0 10px 0;">
        <p style="font-family:Arial, Helvetica, sans-serif; color:#ffffff; font-size:24px; padding:10px 0 0 10px; margin:0;"><?php echo @$cat[0]['cat_name'];?></p>
      <p style="font-family:Arial, Helvetica, sans-serif; color:#f67c00; font-size:18px; padding:10px 0 10px 10px; margin:0;"><?php echo @$pro[0]['name'];?></p>
     
     </div>
  
  </div>
  
  
   <div style="width:960px; margin:0 0 10px 0;">
   
    <div style="width:309px; float:left; border:#b6b6b6 solid 1px; background:#efeeee; padding:40px 20px 40px 20px; text-align:center;">
 
     <?php if(!empty($pro[0]['image'])){ ?>    
      <img src="http://influxiq.com/uploads/product_image/image/<?php echo @$pro[0]['image'];?>" /> 
      <?php }else{
        if(@$pro[0]['category_id'] == 3) {
            ?>
            <img src="http://influxiq.com/images_product/content.jpg" />
        <?php
        }
        elseif(@$pro[0]['category_id'] == 4) {
            ?>
            <img src="http://influxiq.com/images_product/marketing.jpg" />
        <?php
        }
        else {
            ?>
            <img src="http://influxiq.com/uploads/product_image/default/defaultimage.jpg" />
        <?php
        } } ?>
   
    
    <img src="<?php echo $themeurl;?>/images/partitionc.jpg" />
    <span style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#004a6f; text-align:center;">
       <?php 
        if( @$pro[0]['category_id'] == 1)
        {
            $mh = @$pro[0]['platform_cost'];
            $pt = @$pro[0]['insall_charge'];

            $price += @$pro[0]['price'];
            //$price += @$row[0]['platform_cost'];
            //$price += @$row[0]['insall_charge'];
            //$price += @$row[0]['transaction_charge'];
       ?>
           <?php
              if(@$pro[0]['price'] > 0)
              {
           ?>
          Platform Cost : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo $pro[0]['price'];?></strong> <br>

           <?php
              }
            ?>
       
           <?php
              if(@$pro[0]['platform_cost'] > 0)
              {
                  
           ?>
           Monthly Hosting : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php
           $pcost=0;
           $cost="";
           //echo "--------".$have_duration;
              if($have_duration==1){
                  echo  '<strike>'.$pcost=@$pro[0]['platform_cost'].'</strike>';
              }
              else{
                  echo $pcost=@$pro[0]['platform_cost'];
              }
          /*    if($marketPack == '12MONTHS' || $marketPack == '12MONTH'){
                echo  '<strike>'.$pcost=@$row[0]['platform_cost'].'</strike>';
              } 
              else{
                echo $pcost=@$row[0]['platform_cost'];
              } */
            ?></strong> <br>
           <?php
              }
            ?>
       
           <?php
              if(@$pro[0]['insall_charge'] > 0)
              {
           ?>
           Per Transaction : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo @$pro[0]['insall_charge'];?></strong><br>
           <?php
              }
            ?>
       
           <?php
              if(@$pro[0]['transaction_charge'] > 0)
              {
           ?>
           Transaction Charge : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo @$pro[0]['transaction_charge'];?></strong> 
           <?php
              }
            ?>
       
       <?php
        } 
        if( @$pro[0]['category_id'] == 2)
        {
            $price += @($pro[0]['price']);
       ?>
           
         Price : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo @($pro[0]['price']);?></strong>
       
       <?php
        } 
        if(@$pro[0]['category_id'] == 3 || @$pro[0]['category_id'] == 4)
        {
            $price += @$package[0]['price']; 
       ?>
       
         Price : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo @$package[0]['price'];?></strong> 
       
       <?php 
        }
       ?>
       </span>
    
     <br /><br/><input type="button" style="background:url(http://influxiq.com/images/remove.jpg) no-repeat; width:138px; height:41px; cursor:pointer; border:none; margin:10px 0;" value="" class="removeBut" cat_id="<?php echo $key; ?>">
    </div>
   
   
     <div style="width:559px; float:right; border:#b6b6b6 solid 1px; background:#efeeee; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#1c1c1c; line-height:24px; text-align:left; margin:0 0 20px 0;">
               <?php echo html_entity_decode(@$pro[0]['contract'], ENT_QUOTES, 'utf-8');?>
     </div>
  
  
  <div style="clear:both;"></div>
  
  </div>


<?php
    }}
?>
     
     
     <div style="width:960px; height:90px; display:table-cell; vertical-align:middle;">
    <h2 style=" font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#f67c01;">Terms & Conditions:</h2>
        </div> 
   
   <div style="width:926px; background:#c9c9c9; border:#b6b6b6 solid 1px; padding:0 15px 0 18px;">
       <div style="width:905px; margin:20px auto; background:#eeeeee; padding:10px;">
       
        <?php echo html_entity_decode($terms_conditions, ENT_QUOTES, 'utf-8');?>   
        
        

          <?php //if($marketPack == '12MONTHS' || $marketPack == '12MONTH')
          if(@$have_duration==1)
          {
             // $newPrice =  $price - @$details[1][0]['price'];
              if(!empty($pcost)){
                  $price =  @$price - @$pcost;
             }
             else{
                $newPrice =  @$price;   
             } 
             
          //   $newPrice =  $price - $pcost; 
           ?>

          <?php
          }
           ?>

           <?php

           $model = new InfluxiqOrderDetails();

           $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',array(
               'id'=>'contract',
               'enableAjaxValidation'=>true,
               'clientOptions'=>array(
                   'validateOnSubmit'=>true,
               )
           )); ?>

           <?php echo $form->hiddenField(
               $model,
               'price',array('value'=>$price)
           ); ?>

           <?php echo $form->textFieldRow(
               $model,
               'fname'
           ); ?>
            <div class="clear"></div>
           <?php echo $form->textFieldRow(
               $model,
               'lname'
           ); ?>
           <div class="clear"></div>
           <?php echo $form->textFieldRow(
               $model,
               'phone'
           ); ?>
           <div class="clear"></div>
           <?php echo $form->textFieldRow(
               $model,
               'email'
           ); ?>
           <div class="clear"></div>

           <div id="signdiv" style="display: none;">

           <p>Please type your First and Last Name.By this digital signature you agree to pay the above price for the contract products and services listed.</p>

           <?php echo $form->textFieldRow(
               $model,
               'signature'
           ); ?>

           </div>
           <div class="clear"></div>

           <?php  echo CHtml::ajaxSubmitButton(
               'Sign Contract',
               Yii::app()->createUrl('cms/page/signcontract'),
               array(
                   'dataType'=>'json',
                   'type' => 'POST',
                   'data' => "js:$('#contract').serialize()",
                   'success'=>'function(data){
                    if(data["msg"]=="success"){
                         window.location.href="'.Yii::app()->getBaseurl(true).'";



                    }else{
                        $("#signdiv").show();
                        formerrorshow($("#contract"),data["val"]);
                    }
                    }',

                   // 'beforeSend'=>'before',
               ),
               array(
                   'class'=>'newSend_btn1'
               )
           );
           ?>

           <?php  echo CHtml::ajaxSubmitButton(
               'eMail Contract',
               Yii::app()->createUrl('cms/page/emailcontract'),
               array(
                   'dataType'=>'json',
                   'type' => 'POST',
                   'data' => "js:$('#contract').serialize()",
                   'success'=>'function(data){
                    if(data["msg"]=="success"){


                    }else{
                        formerrorshow($("#contract"),data["val"]);
                    }
                    }',

                   // 'beforeSend'=>'before',
               ),
               array(
                   'class'=>'newSend_btn2'
               )
           );
           ?>


           <?php $this->endWidget() ?>
          
          
          <div style=" width:322px; float:right; margin:10px 80px 0 0; text-align:center;">
           <div><img src="http://influxiq.com/images/logo.jpg"  alt="" style="margin:10px 0;"/></div>
          
           <span style="font-family:Arial, Helvetica, sans-serif; font-size:30px; color:#004a6f; text-align:center;"> Total Price<br />
          <?php
          //     echo   $marketPack; exit;
          
           //if($marketPack == '12MONTHS' || $marketPack == '12MONTH')
           if(@$have_duration==1)
          {
           //  echo "tttttt".$pcost;
             if(!empty($pcost)){
              $newPrice =  @$price - @$pcost;
             }
             else{
                $newPrice =  @$price;   
             }
           ?>
         
          <?php if(!empty($pcost)){ ?>
           <strong style="font-weight:normal; color:#e07300; margin-top:10px;"><strike>$<?php echo $price;?></strike></strong> <br />
          <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo $price."-$".$pcost."= $".$newPrice;?></strong>
          <?php }else{ ?>
          <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo $newPrice;?></strong>
          <?php } ?>
          <?php
          }
          else
          {
           ?>
          <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo @$price;?></strong> <br />
          <?php
          }
           ?>
               <br/>
               <span style="font-size: 14px; display: block; font-weight: bold; color: #126FD7;">Monthly Hosting : $<?php echo @$mh;?></span>
               <span  style="font-size: 14px; display: block; font-weight: bold; color: #126FD7;"> Per Transaction : $<?php echo @$pt;?></span>
               <span  style="font-size: 14px; display: block; color: #F87F0C;"> (Not To be Paid Right Now)</span>


          <br/><input type="button" id="button2"  value="Start Over" onclick="unsetCart()">

          </span> </div> 
       
          
          <div style="clear:both;"></div>
          
     </div>
       
       


</div>
     
     
     <?php echo html_entity_decode($footer, ENT_QUOTES, 'utf-8');?>      
     
     
 </div>
 
 
 




 <div class="footer-block">
     <div class="container">






