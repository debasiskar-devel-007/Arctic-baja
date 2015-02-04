<?php

class DefaultController extends MyController
{
    public function init(){
        Yii::app()->theme = 'cow';
        $this->pageTitle = "Product";
        Yii::import('application.modules.user.models.UserManager');
        Yii::import('application.modules.gallery.models.Gallery');


    }

    public function actionIndex()
    {
        // Load js page from assets folder
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/gallery.js'), CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/jquery.elastislide.js'), CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/contentslider.js'), CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/marquee.js'), CClientScript::POS_HEAD);

        $this->pageTitle = "Home";  

        if(isset(Yii::app()->request->cookies['affliate_code'])){

            $this->set_cookie_perclick(Yii::app()->request->cookies['affliate_code'],1);
        }     

        $model= new Product(); 


        $this->render('index',array('model'=>$model));
    }


    public function actionlisting(){
        $model= new Product(); 

        $this->render('listing',array('model'=>$model));
    }
    
    public function actionwishlist(){
        $c_url = Yii::app()->request->hostInfo . Yii::app()->request->url;

        $sess = Yii::app()->session['sess_user'];


        if(empty($sess)){
            Yii::app()->session['login_redirect_url'] = $c_url;
            $this->redirect(Yii::app()->getBaseUrl(true).'/login');
        }

        $this->pageTitle = 'Wishlist';
        $model= new Product(); 

        $this->render('wishlist',array('model'=>$model));
    }

    public function actiondetails($id=0,$name="",$catagoryid=0){
       
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/custom.js'), CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/elastislide.js'), CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/imagezoom.js'), CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('product').'/assets/js/details.js'), CClientScript::POS_HEAD);

        $model= new Product();
        $result = $model->fetchSingle($id);
        $cat=new Category();
        $catname=$cat->fetchcatname($catagoryid);
        $catname=$catname[0]['categoryname'];
        $this->pageTitle = $result['productname']." || ".$catname." || products";       
        $result1 = $model->fetchallbycat($id,$catagoryid);
        $model1=new ProductStock();
        $res=$model1->fetchstock($id);
        //echo "<pre>";
        $st=$res[0]['avail_stock'];
      
      
        
        
/*       
        foreach($res as $s)
        {
          $stock[]=$s['stock'];  
            
        }
        
         echo  count($stock);
        exit;*/
       
        $this->render('details',array('result'=>$result,'result1'=>$result1,'st'=>$st));
    }
    
    
        public function actiondetailscat($id=0,$name=""){

      
        $model= new Product();
        //$result = $model->fetchSingle($id);
        $this->pageTitle = $name;       

        $this->render('listing1',array('model'=>$model,'id'=>$id));            
    }
    
    

    public function actionTerms()
    {

        $this->render('termscondition');

    }
    public function actionPolicy()
    {

        $this->render('pol');

    }

    public function actionAboutus()
    {
         $this->pageTitle = "About" ;
        $this->render('about');

    }


    public function actionContactus()
    {

        $this->render('contact');

    }

    public function actionGallery()
    {
        $this->pageTitle = "Gallery";
        $this->render('gal');

    }

    public function actionNews()
    {

        $this->render('news');

    }

    public function actionNews1()
    {

        $this->render('news1');

    }

    public function actionTestimonial()
    {

        $this->render('testimonial');

    }

    //Insert cookie id in Database in per click
    public function set_cookie_perclick($id=0,$page=1){
        $model = new AffiliatePerClick();
        
        $aff_id = (string)$id;
        
        $res = UserManager::model()->fetchdetail($aff_id);
        
        $cpc = $res['cpc'];
        
        
        
        $model->affiliate_code = $aff_id;
        $model->page_id = $page;
        $model->ip_address = Yii::app()->request->getUserHostAddress();
        $model->time = time();
        $model->cpc_rate = $cpc;

        $model->save();
    } 
    
    public function actiondownload_product($id=0){
          $res = DownloadableProduct::model()->findAll('id = '.$id);
          $pro_id = $res[0]['product_id'];
           $validtime = $res[0]['time']+(72*60*60);
           $curtime = time();
          if($validtime > $curtime){
          
          $pro_res = Product::model()->findAll('productid ='.$pro_id);
          $filename = $pro_res[0]['file_name'];
          $origname = $pro_res[0]['original_name'];
          
           $path = Yii::app()->request->hostInfo . Yii::app()->request->baseURL . '/uploads/files/' . $filename;
           return Yii::app()->getRequest()->sendFile($origname, @file_get_contents($path));

          }else{
              echo 1;
          }
    }

    public function actionaddnotify(){
        $model = new NotifyList();
        $res=$model->checknotify($_POST);
        if($res!=0)
        {
            $model->attributes=$_POST;
            $model->time = time();

            $model->save();
        }


    }
}