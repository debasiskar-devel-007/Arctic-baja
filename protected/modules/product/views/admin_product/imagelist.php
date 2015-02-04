<?php
    $baseUrl =  Yii::app()->BaseUrl;

?>
<div id="main">
    <div id="content">
        <h2  id="pageTitle"><?php echo $name;?></h2>


        
        <!--  <div class="redtext">You have 10 New User to Approve</div>  -->
        <?php
            $this->widget('bootstrap.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider'=>ProductImage::model()->getImage($id),
           // 'template' => "{summary}{items}{pager}",
           
            'enablePagination' => true,
            'summaryText'=>'Displaying {start}-{end} of {count} results.',
            //'filter'=>UserRoleRelation::model(),
            'columns' => array(

           
            /*array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'image_name',
            'filter' => false,
            'value' => '$data->image_name',
            'id'=>'$data[id]',
            'sortable'=>false
            ),*/
            
            array( 
    'class'=>'bootstrap.widgets.TbImageColumn',
    'header' => 'Product Image',
    'imagePathExpression'=>'Yii::app()->request->baseUrl.\'/uploads/product_image/thumb/\'.$data->image_name',
    'usePlaceKitten'=>FALSE,
    'htmlOptions'=>array('style'=>'max-height:100px;max-width:100px;')
    
    ),


            )
            ));
        ?>                      

    </div>
     </div>