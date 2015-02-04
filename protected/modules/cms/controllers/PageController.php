<?php

class PageController extends MyController
{
    private $_assetsUrl;


    public function init()
    {
       yii::app()->theme='cow';

        $js_arr = array('common.js','frontend.js','jquery.fancybox.js','flowplayer-3.js','marquee.js','facebox.js'); //put what js file name that you need to import from admin assets folder
        Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets'), false, -1, YII_DEBUG);
        foreach($js_arr as $filename){
            Yii::app()->getClientScript()->registerScriptFile($this->getAssetsUrl().'/js/'.$filename, CClientScript::POS_END);
        }

    }

	public function actionIndex($id1='home')
	{





         $model= new Page();
         
        
        $id=@$_GET['pagename'];
        if(empty($id))
        $id=$id1;
        $this->pageTitle=ucfirst($id);

        //$r=Yii::app()->request->getUrl();
        //$r1=Yii::app()->request->getParams('pagename');
        //echo $id;
         $res=$model->fetchcontent(str_replace("-"," ",$id));
         //var_dump($res);
         //exit;
 
         
        //echo $r;
        //echo $r1;

		$this->render($id,array('res'=>$res,'pagename'=>$id));


}


public function getAssetsUrl()
{
    if ($this->_assetsUrl === null)
        $this->_assetsUrl = Yii::app()->getAssetManager()->publish(
            Yii::getPathOfAlias('cms.assets') );
    return $this->_assetsUrl;
}

public function actionPagelink()
{
    $model=new Page();
    $data=$_POST['data'];
    $res=$model->findpage($data);
   echo json_encode($res);
    
    
}

public function GetcontentByid($id,$res)
{
    
    
  foreach($res as $r=>$val)
  {
      
      
    //var_dump($r);
    // echo "</br>";
     //var_dump($val); 
     foreach($val as $v=>$v1)
     {
     //var_dump($v1['content_id']);
     /*echo "v1==".$v1;
     echo "<br>";
     echo "v==".$v;
     echo "<br />";  */
     
     //var_dump($v1);
     if($v1==$id)
     {
     
         return $oldcontent;
         
     }
     $oldcontent=$v1; 
     }
      
  }


    
    
}
//function for range page image gallery
    public function getmultipleFaceboxContent($id,$res,$htmlcontent)
    {

        //var_dump($htmlcontent);
        //exit;
        $html='';
        foreach($res as $r=>$val)
        {


            //var_dump($r);
            // echo "</br>";
            //var_dump($val);
            foreach($val as $v=>$v1)
            {
                //var_dump($v1['content_id']);
                /*echo "v1==".$v1;
                echo "<br>";
                echo "v==".$v;
                echo "<br />";  */

                //var_dump($v1);
                if($v1==$id)
                {

                    //return $oldcontent;
                    $htmlcontent1= yii::app()->getBaseUrl(true).'/uploads/content_image/thumb/'.$oldcontent;
                    $htmlcontent2= yii::app()->getBaseUrl(true).'/uploads/content_image/original/'.$oldcontent;
                    $searchstring= array('htmlcontent1','htmlcontent2');
                    $replacestring= array($htmlcontent1,$htmlcontent2);
                    $html.=str_replace($searchstring,$replacestring,$htmlcontent);
                    //echo $html;


                }

                $oldcontent=$v1;
            }



        }

        return $html;


    }
    
    //for advertising page
    public function getmultipleContent($id,$res,$htmlcontent)
    {

        //var_dump($htmlcontent);
        //exit;
        $html='';
        foreach($res as $r=>$val)
        {


            //var_dump($r);
            // echo "</br>";
            //var_dump($val);
            foreach($val as $v=>$v1)
            {
                //var_dump($v1['content_id']);
                /*echo "v1==".$v1;
                echo "<br>";
                echo "v==".$v;
                echo "<br />";  */

                //var_dump($v1);
                if($v1==$id)
                {

                    //return $oldcontent;
                    $htmlcontent1= yii::app()->getBaseUrl(true).'/uploads/content_image/thumb/'.$oldcontent;
                    //$htmlcontent2= yii::app()->getBaseUrl(true).'/uploads/content_image/original/'.$oldcontent;
                    $searchstring= array('htmlcontent1');
                    $replacestring= array($htmlcontent1);
                    $html.=str_replace($searchstring,$replacestring,$htmlcontent);
                    //echo $html;


                }

                $oldcontent=$v1;
            }



        }

        return $html;


    }
    
    public function actiongettop(){
        $this->renderpartial('top');
    }
    
    public function actiongetfooter(){
        
         $model= new Page();     
         

        $res=$model->fetchcontent(str_replace("-"," ",'home'));
        $this->renderpartial('footer',array('res'=>$res));
    }
    
    public function actionaddcontract(){
        $prod_type=$_POST['type'];
        $prod_id=$_POST['product_id'];
        $package_id=$_POST['value'];
        
        
        
        if($prod_type == 1)
            unset(Yii::app()->session['cart']);
            
        $cart = Yii::app()->session['cart'];
        
        $cart[$prod_type]['id'] = $prod_id;
        $cart[$prod_type]['pacid'] = $package_id;
        
        Yii::app()->session['cart'] = $cart;
        
    }
    
    public function actiondelcontract(){
            unset(Yii::app()->session['cart']);
        
        
    }
    
    public function actiondeleteCart(){
        
        $cat_id=$_POST['cat_id']; 
        
            $cart = Yii::app()->session['cart'];
            
            unset($cart[$cat_id]);
            
             Yii::app()->session['cart'] = $cart;
             
             if($cat_id == 1)
                unset(Yii::app()->session['cart']);
        
        
    }

    public function actionaddapply(){


        $ret = array();
        $model = new InfluxiqApplyDetails();
        //$this->performAjaxValidation($model,'email-form');
        $model->attributes=$_POST['InfluxiqApplyDetails'];
        if($model->validate()){

            $model->t_add_time = date("Y-m-d H:i:s");
            $model->i_active = 1;

            $model->save();

            $ret['msg']="success";
            $ret['val'] = 1;
        }else{
            $ret['msg']="error";
            $ret['val'] = CActiveForm::validate($model);
        }
        echo json_encode($ret);

    }
    public function actionsigncontract(){


        $ret = array();
        $model = new InfluxiqOrderDetails('sss');
        //$this->performAjaxValidation($model,'email-form');
        $model->attributes=$_POST['InfluxiqOrderDetails'];
        if($model->validate()){

            $email = $_POST['InfluxiqOrderDetails']['email'];

            $cart = Yii::app()->session['cart'];

            $prod=array();
            $i=0;
            foreach($cart as $row){
                $prod[$i]['prod_id'] = $row['id'];
                $i++;
            }

            $model->product = serialize($prod);

            $model->save();

            $mail = new YiiMailMessage();

            $content= 'This is verification message';

            $mail->addTo(@$email);
            $mail->from = ('info@influxiq.com');
            $mail->setSubject('Contract Email Verifacation');
            $mail->setBody($content, 'text/html');

            Yii::app()->mail->send($mail);

            unset(Yii::app()->session['cart']);

            $ret['msg']="success";
            $ret['val'] = 1;
        }else{
            $ret['msg']="error";
            $ret['val'] = CActiveForm::validate($model);
        }
        echo json_encode($ret);

    }

    public function actionemailcontract(){
        $cart = Yii::app()->session['cart'];

        $model1 = new CartContent();

        $model = new InfluxiqOrderDetails('sss');
        //$this->performAjaxValidation($model,'email-form');
        $model->attributes=$_POST['InfluxiqOrderDetails'];
        if($model->validate()){

            $email = $_POST['InfluxiqOrderDetails']['email'];

            $cart = Yii::app()->session['cart'];

            $model1->content = serialize($cart);

            $model1->save();

            $_ins_id = $model1->id;

            $mail = new YiiMailMessage();

            $content= 'You have a contract for products and services with InfluxIQ awaiting your signature! Please <a href="'.Yii::app()->getBaseurl(true).'/cms/page/emailcontract1/id/'.$_ins_id.'">click here</a> to view and sign your contract.<br /><br />Thank you!<br /><br />The InfluxIQ Development Group team';

            $mail->addTo(@$email);
            $mail->from = ('info@influxiq.com');
            $mail->setSubject('Contract notification from InfluxIQ');
            $mail->setBody($content, 'text/html');

            Yii::app()->mail->send($mail);

            unset(Yii::app()->session['cart']);

            $ret['msg']="success";
            $ret['val'] = 1;
        }else{
            $ret['msg']="error";
            $ret['val'] = CActiveForm::validate($model);
        }
        echo json_encode($ret);

    }

    public function actionemailcontract1($id=0){
        $model1 = new CartContent();

        $res = $model1->findAll('id='.$id);

        if($res[0]['is_active'] == 1){
            $this->redirect(Yii::app()->getBaseurl(true));
        }else{
            $cart = $res[0]['content'];

            Yii::app()->session['cart'] = unserialize($cart);
            $this->redirect(Yii::app()->getBaseurl(true).'/contract');
        }
    }




}
