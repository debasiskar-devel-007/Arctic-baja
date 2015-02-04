<?php
    $baseUrl =  Yii::app()->BaseUrl;
    //$shiping_status_arr = array(1=>'Pending',2=>'Processing',3=>'Delivered',4=>'Cancelled');

    ?>
<div id="main">
    <div id="content">
        <h2  id="pageTitle">Order Listing</h2>


        <?php 
            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider'=>$model->orderlist(),
            'template' => "{summary}{items}{pager}",

            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            'filter'=>$model,
            'columns' => array(

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'fullname',
            'filter' => CHtml::activeTextField($model, 'fullname'),
            'value' => '$data->fullname',
            'id'=>'$data[id]',
            'sortable'=>true,
            'header'=>'Customer Name'

            ),


            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'transaction_id',
            'filter' => CHtml::activeTextField($model, 'transaction_id'),
            'value' => '$data->transaction_id',
            'id'=>'$data[id]',
            'sortable'=>true,

            ),


            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'transaction_status',
            'filter' => CHtml::activeTextField($model, 'transaction_status'),
            'value' => '$data->transaction_status',
            'id'=>'$data[id]',
            'sortable'=>true,



            ),


            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'total',
            'filter' => CHtml::activeTextField($model, 'total'),
            'value' => '$data->total',
            'id'=>'$data[id]',
            'sortable'=>true,

            ),

            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'discount_val',
            'header' => 'Discount Value',
            'filter' => CHtml::activeTextField($model, 'discount_val'),
            'value' => '$data->discount_val',
            'id'=>'$data[id]',
            'sortable'=>true,

            ),


            array(
            'class' => 'bootstrap.widgets.TbDataColumn',
            'name' => 'order_time',
            'filter' => CHtml::activeTextField($model, 'order_time'),
            'value' => 'date(\'m/d/Y h:i a\',$data->order_time)',
            'id'=>'$data[id]',
            'sortable'=>true,

            ),


                /*array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'shipping_status',
                    'filter' => CHtml::activeTextField($model, 'shipping_status'),
                    //'value' => '$data->shipping_status',
                    'value' => '$data->shipping_status_id',
                    'sortable'=>true,
                    //'type'=>'html'

                ),*/
                array(
                    'class' => 'bootstrap.widgets.TbEditableColumn',
                    'name' => 'shipping_status',
                    'filter' => CHtml::activeDropDownList($model, 'shipping_status',$shiping_status_arr),
                    'value' => '$data->shipping_status1',
                    'sortable'=>true,
                    'header'=>'Shipping Status',
                    'id'=>'$data[orderid]',
                    'editable' => array(
                        'url' => $this->createUrl('admin/order/EditableSaver'),
                        'emptytext'=>'FOR TESTING USE',
                        'source'    => Editable::source($shiping_status_arr),
                        'type' => 'select',
                        //'model' => $model->search(),
                        //'attribute' => 'parentcategoryid',
                        'placement' => 'left',
                        'inputclass' => 'span3',
                        'validate' => 'js: function(value){
                        if($.trim(value) == "") return "This field is required";
                        }'
                        ),
                    //'type'=>'html'

                ),

                /*array(
                    'class' => 'bootstrap.widgets.TbDataColumn',
                    'name' => 'totalOccurrences',
                    'filter' => false,
                    'value' => '($data->totalOccurrences)?"Total Occurrences : ".$data->totalOccurrences."<br/>Start Date : ".$data->start_date."<br/>Subscription Interval : ".$data->sub_interval." Months<br/>Status : ".(($data->status==1)?"Active":"Cancelled")."<br/>":"No Autoship"',
                    'id'=>'$data[id]',
                    'sortable'=>true,
                    'header'=>'Subscription Details',
                    'type'=>'html'

                ),*/


                array
            (
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{dialog}</br>{dialog1}</br>{dialog2}</br>{view_autoship}</br>{send_duplicate}</br>{invoice}</br>',
            'evaluateID'=>true, 
            'header'=>'',
            //'htmlOptions'=>array('id'=>'$data->id'),

            'buttons'=>array
            (    

            'dialog' => array
            (
            'label'=>'Billing Details',
            'options' => array('id'=>'$data->orderid'), 

            'click'=>'function(){
            var val = $(this).attr("id");
            //alert(val);

            $("#myModal").modal(\'show\');
            $("#myModal").find(".modal-header").hide();
            $("#myModal").find(".modal-footer").hide();
            $("#swdesc").html(\'<div style="text-align:center;"><img src="'.Yii::app()->request->baseUrl.'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>\');

            $.post(base_url+"/product/admin/order/showbill",{"id":val},function(res){

            //alert(res); 

            result = eval(\'(\'+res+\')\');
            html = \'\';

            html += \'Name : \'+result[\'billing_fname\'] + \' \'+result[\'billing_lname\']+\'<br />\';
            html += \'Address : \'+result[\'billing_add\']+\'<br />\';
            html += \'Phone No : \'+result[\'billing_phone\']+\'<br />\';
            html += \'Email : \'+result[\'billing_email\']+\'<br />\';
            html += \'Zip : \'+result[\'billing_zip\']+\'<br />\';
            html += \'City : \'+result[\'billing_city\']+\'<br />\';
            html += \'State : \'+result[\'billing_state\']+\'<br />\';
            html += \'Country : \'+result[\'billing_country\']+\'<br />\';


            $("#myModal").find(".modal-header").show();
            $("#myModal").find(".modal-footer").show();
            $("#myModal").modal(\'show\');
            $("#myModal").find(".modal-header h4").text("Billing Details");
            $("#swdesc").html(html); 

            })
            }',

            ),




            'dialog1' => array
            (
            'label'=>'Shipping Details',
           
            'options' => array('id'=>'$data->orderid'), 

            'click'=>'function(){
            var val = $(this).attr("id");
            //alert(val);

            $("#myModal").modal(\'show\');
            $("#myModal").find(".modal-header").hide();
            $("#myModal").find(".modal-footer").hide();
            $("#swdesc").html(\'<div style="text-align:center;"><img src="'.Yii::app()->request->baseUrl.'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>\');

            $.post(base_url+"/product/admin/order/showship",{"id":val},function(res){

            //alert(res); 

            result = eval(\'(\'+res+\')\');
            html = \'\';

            html += \'Name : \'+result[\'shipping_fname\'] + \' \'+result[\'shipping_lname\']+\'<br />\';
            html += \'Address : \'+result[\'shipping_add\']+\'<br />\';
            html += \'Phone No : \'+result[\'shipping_phone\']+\'<br />\';
            html += \'Zip : \'+result[\'shipping_zip\']+\'<br />\';
            html += \'City : \'+result[\'shipping_city\']+\'<br />\';
            html += \'State : \'+result[\'shipping_state\']+\'<br />\';
            html += \'Country : \'+result[\'shipping_country\']+\'<br />\';


            $("#myModal").find(".modal-header").show();
            $("#myModal").find(".modal-footer").show();
            $("#myModal").modal(\'show\');
            $("#myModal").find(".modal-header h4").text("Shipping Details");
            $("#swdesc").html(html); 

            })
            }',

            ),



            'dialog2' => array
            (
            'label'=>'Product Details',
            
            'options' => array('id'=>'$data->orderid'), 

            'click'=>'function(){
            var val = $(this).attr("id");
            //alert(val);

            $("#myModal").modal(\'show\');
            $("#myModal").find(".modal-header").hide();
            $("#myModal").find(".modal-footer").hide();
            $("#swdesc").html(\'<div style="text-align:center;"><img src="'.Yii::app()->request->baseUrl.'/images/lightbox-ico-loading.gif" alt="Loading..." /></div>\');

            $.post(base_url+"/product/admin/order/showPro",{"id":val},function(res){

            //alert(res); 

            $("#myModal").find(".modal-header").show();
            $("#myModal").find(".modal-footer").show();
            $("#myModal").modal(\'show\');
            $("#swdesc").html(res); 

            })
            }',

            ),

                'view_autoship'=>array(
                    'label'=>'View Autoship',
                    'options' => array('id'=>'$data->transaction_id','onclick'=>'view_subscription(this)'),
                    'visible'=>'$data->is_autoship > 0',

                ),

                'send_duplicate'=>array(
                    'label'=>'Send Duplicate',
                    'options' => array('id'=>'$data->orderid','onclick'=>'send_duplicate(this)'),
                    'visible'=>'$data->is_autoship > 0',

                ),

                'invoice'=>array(
                    'label'=>'Print Invoice',
                    'options' => array('id'=>'$data->orderid','onclick'=>'print_invoice(this)'),
                    'visible'=>'$data->is_autoship > 0',

                ),


            ),
            ),






            )
            ));
        ?>                      

    </div>
     </div>
     
     
     
     

<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal')
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4></h4>
</div>

<div class="modal-body" id="swdesc">

</div>

<div class="modal-footer">

    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
        'label' => 'Close',
        'url' => 'javascript:void(0)',
        'htmlOptions' => array('data-dismiss' => 'modal','class'=>'modal-btn'),
        )
        ); ?>
    </div>
     
    <?php $this->endWidget(); ?>
 

     

<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'autoshipModal')
    ); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>&nbsp;</h4>
</div>

<div class="modal-body">

</div>

     
    <?php $this->endWidget(); ?>
 
