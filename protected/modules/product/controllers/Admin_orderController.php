<?php

class Admin_orderController extends MyController
{


    public function init()
    {
        yii::app()->theme="admin";//assign theme to this controller



    }

    public function actionIndex()
    {
        $model = new TransactionOrderDetails(); 
        
         if(isset($_GET['TransactionOrderDetails']))
        {
            $model->total=$_GET['TransactionOrderDetails']['total'];
            $model->order_time=$_GET['TransactionOrderDetails']['order_time'];
            $model->shipping_status=$_GET['TransactionOrderDetails']['shipping_status'];
            $model->transaction_id=$_GET['TransactionOrderDetails']['transaction_id'];
            $model->transaction_status=$_GET['TransactionOrderDetails']['transaction_status'];
            $model->discount_val=$_GET['TransactionOrderDetails']['discount_val'];
            

        } 
        
        $ship_status = ShippingStatus::model()->findAll();
        $shiping_status_arr = array();
        foreach($ship_status as $row){
            $shiping_status_arr[$row['shipping_status_id']] = $row['shipping_status_val'];
        }
        
        $this->render('index',array('model'=>$model,'shiping_status_arr'=>$shiping_status_arr));
    }

    public function actionShowbill(){
        $id = $_POST['id']; 
        $model = new TransactionOrderDetails(); 
        $res = $model->fetchbyorder($id);
        $arr = array();
        foreach($res as $row){
            $arr['orderid'] = $row['orderid'];
            $arr['billing_fname'] = $row['billing_fname'];
            $arr['billing_lname'] = $row['billing_lname'];
            $arr['billing_add'] = $row['billing_add'];
            $arr['billing_phone'] = $row['billing_phone'];
            $arr['billing_country'] = "United State";
            $arr['billing_email'] = $row['billing_email'];
            $arr['billing_state'] = $row['billing_state'];
            $arr['billing_zip'] = $row['billing_zip'];
            $arr['billing_city'] = $row['billing_city'];
        }
        echo json_encode($arr);  
    }

    public function actionShowship(){
        $id = $_POST['id']; 
        $model = new TransactionOrderDetails(); 
        $res = $model->fetchbyorder($id);
        $arr = array();
        foreach($res as $row){
            $arr['orderid'] = $row['orderid'];
            $arr['shipping_fname'] = $row['shipping_fname'];
            $arr['shipping_lname'] = $row['shipping_lname'];
            $arr['shipping_add'] = $row['shipping_add'];
            $arr['shipping_phone'] = $row['shipping_phone'];
            $arr['shipping_country'] = "United State";
            $arr['shipping_state'] = $row['shipping_state'];
            $arr['shipping_city'] = $row['shipping_city'];
        }
        echo json_encode($arr);  
    }

    public function actionShowPro(){
        $id = $_POST['id']; 

        Yii::app()->theme="blank";  
        


        $model = new TransactionOrderDetails();
        $data['model']=$model->fetchprobyorder($id);;
        $this->render("prolist",$data);

    }
    
    public function actionviewautoshipdet(){
            $id = $_POST['transcation_id']; 

        Yii::app()->theme="blank";  
        


        $data['model']=AutoshipManage::model()->findAll('transaction_id ='.$id);
        $this->render("autoshiplist",$data);

    }

    public function actionEditableSaver(){
        if($_POST['name'] == 'shipping_status'){
            $order_id = $_POST['pk'];
            $res = TransactionOrderDetails::model()->findAll('orderid = '.$order_id);
            $emailid = $res[0]['billing_email'];
            $res1 = ShippingStatus::model()->findAll('shipping_status_id = '.$_POST['value']);
            $shipping_status_val = $res1[0]['shipping_status_val'];

            $mail = new YiiMailMessage();

            $content= "Your order #".str_pad($order_id, 6, "0", STR_PAD_LEFT)." number status has been updated to ".$shipping_status_val." , please <a href=\"".Yii::app()->getBaseUrl(true)."/user/admin/account/order\">click here</a> to review you order status";

            $mail->addTo($emailid);

            $mail->from = ('info@azcowtown.com');
            $mail->setSubject("Notification for Order : #".str_pad($order_id, 6, "0", STR_PAD_LEFT));
            $mail->setBody($content, 'text/html');

            Yii::app()->mail->send($mail);
        }
        TransactionOrderDetails::model()->updateByPk($_POST['pk'],array($_POST['name']=>$_POST['value']));

    }
    
    public function actionduplicatesend(){
        $orderid = $_POST['orderid'];
        $order_ship_bill_details = array();
        $order_product_details = array();
        $autoship = array();
        
        $order_ship_bill = TransactionOrderDetails::model()->findAll('orderid ='.$orderid);
        
        foreach($order_ship_bill as $row){
            $order_ship_bill_details['billing_fname'] = $row['billing_fname'];
            $order_ship_bill_details['billing_lname'] = $row['billing_lname'];
            $order_ship_bill_details['billing_add'] = $row['billing_add'];
            $order_ship_bill_details['billing_phone'] = $row['billing_phone'];
            $order_ship_bill_details['billing_country'] = $row['billing_country'];
            $order_ship_bill_details['billing_email'] = $row['billing_email'];
            $order_ship_bill_details['billing_state'] = $row['billing_state'];
            $order_ship_bill_details['billing_city'] = $row['billing_city'];
            $order_ship_bill_details['billing_zip'] = $row['billing_zip'];
            $order_ship_bill_details['shipping_fname'] = $row['shipping_fname'];
            $order_ship_bill_details['shipping_lname'] = $row['shipping_lname'];
            $order_ship_bill_details['shipping_phone'] = $row['shipping_phone'];
            $order_ship_bill_details['shipping_add'] = $row['shipping_add'];
            $order_ship_bill_details['shipping_country'] = $row['shipping_country'];
            $order_ship_bill_details['shipping_state'] = $row['shipping_state'];
            $order_ship_bill_details['shipping_city'] = $row['shipping_city'];
            $order_ship_bill_details['shipping_zip'] = $row['shipping_zip'];
            $order_ship_bill_details['subtotal'] = $row['subtotal'];
            $order_ship_bill_details['shiping_charge'] = $row['shiping_charge'];
            $order_ship_bill_details['total'] = $row['total'];
            $order_ship_bill_details['order_time'] = $row['order_time'];
            $order_ship_bill_details['transaction_id'] = $row['transaction_id'];
            $order_ship_bill_details['discount_val'] = $row['discount_val'];
        }

        $order_product = TransactionProductDetails::model()->findAll('order_id ='.$orderid);
        $i=0;
        foreach($order_product as $row){
            $order_product_details[$i]['product_name'] = $row['product_name'];
            $order_product_details[$i]['product_quantity'] = $row['product_quantity'];
            $order_product_details[$i]['product_id'] = $row['product_id'];
            $order_product_details[$i]['product_price'] = $row['product_price'];
            $i++;
        }
        
        $autoship_arr = AutoshipManage::model()->findAll('transaction_id = '.$order_ship_bill_details['transaction_id']);
        
        foreach($autoship_arr as $row){
            $autoship[$row['product_id']] = 1;
        }
        
        
        
        
        
        $mail = new YiiMailMessage();

                    $params              = array('orderId'=>$orderid,'order_ship_bill_details'=>$order_ship_bill_details,'order_product_details'=>$order_product_details,'autoship'=>$autoship);

                    $mail->view = "d_orderlist";

                    if($order_ship_bill_details['billing_email']!='')$mail->addTo($order_ship_bill_details['billing_email']);
                    $mail->from = ('orders@valescere.com');
                    $mail->setSubject('Duplicate Bill');
                    $mail->setBody($params, 'text/html');

            Yii::app()->mail->send($mail);
    }
    
    public function actionprintinvoice(){
        $orderid = $_POST['orderid'];
        $order_ship_bill_details = array();
        $order_product_details = array();
        $autoship = array();
        
        $order_ship_bill = TransactionOrderDetails::model()->findAll('orderid ='.$orderid);
        
        foreach($order_ship_bill as $row){
            $order_ship_bill_details['billing_fname'] = $row['billing_fname'];
            $order_ship_bill_details['billing_lname'] = $row['billing_lname'];
            $order_ship_bill_details['billing_add'] = $row['billing_add'];
            $order_ship_bill_details['billing_phone'] = $row['billing_phone'];
            $order_ship_bill_details['billing_country'] = $row['billing_country'];
            $order_ship_bill_details['billing_email'] = $row['billing_email'];
            $order_ship_bill_details['billing_state'] = $row['billing_state'];
            $order_ship_bill_details['billing_city'] = $row['billing_city'];
            $order_ship_bill_details['billing_zip'] = $row['billing_zip'];
            $order_ship_bill_details['shipping_fname'] = $row['shipping_fname'];
            $order_ship_bill_details['shipping_lname'] = $row['shipping_lname'];
            $order_ship_bill_details['shipping_phone'] = $row['shipping_phone'];
            $order_ship_bill_details['shipping_add'] = $row['shipping_add'];
            $order_ship_bill_details['shipping_country'] = $row['shipping_country'];
            $order_ship_bill_details['shipping_state'] = $row['shipping_state'];
            $order_ship_bill_details['shipping_city'] = $row['shipping_city'];
            $order_ship_bill_details['shipping_zip'] = $row['shipping_zip'];
            $order_ship_bill_details['subtotal'] = $row['subtotal'];
            $order_ship_bill_details['shiping_charge'] = $row['shiping_charge'];
            $order_ship_bill_details['total'] = $row['total'];
            $order_ship_bill_details['order_time'] = $row['order_time'];
            $order_ship_bill_details['transaction_id'] = $row['transaction_id'];
            $order_ship_bill_details['discount_val'] = $row['discount_val'];
        }

        $order_product = TransactionProductDetails::model()->findAll('order_id ='.$orderid);
        $i=0;
        foreach($order_product as $row){
            $order_product_details[$i]['product_name'] = $row['product_name'];
            $order_product_details[$i]['product_quantity'] = $row['product_quantity'];
            $order_product_details[$i]['product_id'] = $row['product_id'];
            $order_product_details[$i]['product_price'] = $row['product_price'];
            $i++;
        }
        
        $autoship_arr = AutoshipManage::model()->findAll('transaction_id = '.$order_ship_bill_details['transaction_id']);
        
        foreach($autoship_arr as $row){
            $autoship[$row['product_id']] = 1;
        }
        
        
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
        $file_name ='invoice-'.$randomString.".pdf";

                    /* This is for creating pdf from a html  */
                    # HTML2PDF has very similar syntax
                    $html2pdf = Yii::app()->ePdf->HTML2PDF();
                    $html2pdf->WriteHTML($this->renderPartial('invoice', array('orderId'=>$orderid,'order_ship_bill_details'=>$order_ship_bill_details,'order_product_details'=>$order_product_details,'autoship'=>$autoship), true)); 
                    //$html2pdf->Output('', EYiiPdf::OUTPUT_TO_STRING);
                    $content_PDF = $html2pdf->Output('./images/pdf/'.$file_name, EYiiPdf::OUTPUT_TO_FILE);
                    echo $file_name;
    }

public function actionautoshipdetupform(){
    $model = new TransactionOrderDetails('payment');
    $this->renderPartial('autoshiplistupdate', array('model'=>$model));
}

public function actionautoshipupdate(){
    
}




    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
    // return the filter configuration for this controller, e.g.:
    return array(
    'inlineFilterName',
    array(
    'class'=>'path.to.FilterClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }

    public function actions()
    {
    // return external action classes, e.g.:
    return array(
    'action1'=>'path.to.ActionClass',
    'action2'=>array(
    'class'=>'path.to.AnotherActionClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }
    */
}