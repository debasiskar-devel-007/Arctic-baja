<?php

class Admin_NewsController extends MyController
{

    
    
    public function init()
    {
        yii::import('product.controllers.Admin_productController');
        $this->pageTitle="News Manager";
        yii::app()->theme='admin';
        return true;
    }

    public function actionAdd()
    {

        $model= new News();
        $mod= new NewsVid();
        $mod1= new NewsImg();
        if(count($_POST))
        {


            $model->attributes=$_POST['News'];
                                
            if($model->validate())
            {

                $model->user_image= @$_POST['News']['user_image'];
                  //exit;
                              
                $r=$model->insertdata();
                if(is_array(@$_POST['Newsvid']['name']))
                $mod->savedata($r,$_POST['Newsvid']['name']);
                if(is_array(@$_POST['NewsImg']['image']))
                $mod1->savedata($r,$_POST['NewsImg']['image']);
                //echo $r;
                if($r>0)
                {
                    $this->redirect(yii::app()->baseurl."/news/admin/news/listing");
                } 

            } 
           

        }

        $this->render('add',array('model'=>$model,'mod'=>$mod,'mod1'=>$mod1));

    }
    
    public function actionIndex()
    {
        
       $this->redirect(Yii::app()->request->baseUrl."/news/admin/news/listing");
        
    }

    public function actionListing()
    {
        $model= new News('search');

        if(isset($_GET['News']))//this is use for searching in the listing page 
        {
            $model->news_title=$_GET['News']['news_title'];
            $model->news_date=$_GET['News']['news_date'];
            $model->postby=$_GET['News']['postby'];
            //$model->pr_status=$_GET['News']['priority'];
            //$model->isactive=$_GET['Product']['isactive'];

        }

        $arr = $model->fetchdate();
        //$res_l=NewsComment::model()->findAllByAttributes(array('i_active'=>0));

        //$cnt=count($res_l);
        if($arr!=NULL)
        {
            foreach($arr as $key=>$val)
            {
                $arr1[""]= "Select Date";
                $arr1[$val['news_date']]= $val['news_date'];
            }
        }
        else
        {
            $arr1['00-00-0000'] = "00-00-0000";
        }

        $this->render('index',array('model'=>$model,'res'=>$arr1));


    }

    public function actionShowcontent()
    {

        $id = $_POST['id'];
        $model = new News();
        $res = $model->fetchcontent($id);
        echo $res[0]['news_desc'];
    }

    //for bulk action
    public function actionBulkupdate(){
        $val = $_POST['values'];
        $data['name'] = $_POST['attr'];
        $data['value'] = $_POST['status'];

        $model = new News();

        foreach($val as $row){
            $data['pk'] = $row;

            $model->updatedata($data);
        }

        echo 1;
    }

    public function actionToggle($id)
    {
        $model= new News();
        $model->updatestatus($id);
        echo $id;
    }

    public function actionToggle1($id)
    {
        $model= new News();
        $model->updatestatus1($id);
        echo $id;
    }

    public function actionDelete()
    {
        $id = $_REQUEST['id'];
        $model = new News();

        $res = News::model()->deleteByPk($id);
        $this->redirect(Yii::app()->request->baseUrl."/news/admin/news/listing");

    }
        public function actionDeleteall()
    {
        $model = new News();
        $x=explode(",",$_POST['ids']);
        foreach($x as $val)
        {
            $model->deletefun($val);
           
 
        }
        Yii::app()->user->setFlash('success', 'Your Data Is Deleted Successfully:');
    }
        public function actionUpdatedata($id)
    {

        $model = new News();
        $mod= new NewsImg();
        $mod1= new NewsVid();


        $res =$model->fetchupdatedetails($id);
        $arr=$mod->findAll('news_id='.$id);
        $arr1=$mod1->findAll('news_id='.$id);

        $prev_image1 = $mod->fecthImage($id);
        $prev_image = array();
        foreach($prev_image1 as $row){
            $prev_image[] = $row['name'];
        }
        //var_dump($prev_image);
        //exit;


        if(count($_POST)>0)
        {

             //var_dump($_POST);

            //exit;
           $mod->deletedata($id);
           $mod1->deletedata($id);
           $model->user_image= @$_POST['News']['user_image'];

            $arr['news_title']= $_POST['News']['news_title'];
            $arr['news_desc'] = $_POST['News']['news_desc'];
            $arr['postby'] = $_POST['News']['postby'];
            $arr['user_image'] = @$_POST['News']['user_image'];

            $model->updatedetails($id,$arr);
            if(is_array(@$_POST['Newsvid']['name']))
                $mod1->savedata($id,$_POST['Newsvid']['name']);
            if(is_array(@$_POST['NewsImg']['image']))
                $mod->savedata($id,$_POST['NewsImg']['image']);
           
           

            $this->redirect(Yii::app()->request->baseUrl."/news/admin/news/listing");

        }
        $this->render('edit',array('model'=>$res,'mod'=>$arr,'mod1'=>$arr1,'previmage'=>$prev_image));
    } 
    
        public function actionEditableSaver()
    {
        $model = new News();
        $model->updatedata($_POST);
    } 
    
    public function actionTest()
    {
       $res=Admin_productController::rest1();
       echo $res; 
        
    }
    
            public function actionUploadify_process()
    {

        // Define a destination
        $targetFolder = '/uploads/proimage/'; // Relative to the root
        ini_set('post_max_size', '640M'); 
        ini_set('upload_max_filesize', '640M');
        ini_set('memeory_limit', '5000M');

        if (!empty($_FILES)){

            $tempFile = $_FILES['Filedata']['tmp_name']; 

            $targetPath =   Yii::getPathOfAlias('webroot').$targetFolder;     
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            $file_name=time().'.'.$fileParts['extension'];

            $targetFile = rtrim($targetPath,'/') . '/' . $file_name;

            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions

            if (in_array($fileParts['extension'],$fileTypes)) {

                move_uploaded_file($tempFile,$targetFile);
                echo  $file_name;
            }
            else{
                echo '123';    
            }


        }
    }
    
    public function actionResizeimage(){

        $file_name=$_POST['filename'];
        $eheight=$_POST['height'];
        $ewidth=$_POST['width'];
        $foldername = $_POST['foldername'];

        $handle = new upload(Yii::getPathOfAlias('webroot')."/uploads/proimage/".$file_name);

        $handle->image_resize = true;
        $handle->image_ratio_x =true;
        $handle->image_ratio_y =true;  

        $handle->jpeg_quality = 100;

        $width=$handle->image_src_x;
        $height=$handle->image_src_y;

        $orig_asc=$width/$height;

        if($width>800){
            $w=800;
            $h=800*(1/$orig_asc);
            $handle->image_x = $w;
            $handle->image_y = $h;

            $handle->file_overwrite=true;
            $handle->process(Yii::getPathOfAlias('webroot')."/uploads/proimage/");       

            if($handle->processed){
                echo 'image resized';
            }
            else{
                echo 'error : ' . $handle->error;

            }

        }
        if($width>$ewidth || $height>$eheight)
        {
            $left=intval(($width-$ewidth)/2);
            $top=intval(($height-$eheight)/2);
        }
        else

        {
            $left=0;
            $top=0;
            $eheight=$height;
            $ewidth=$width;
        }
        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/proimage/".$file_name);
        $thumb->crop($left,$top,$ewidth,$eheight);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/proimage/".$foldername."/".$file_name);
    }
    
        function actionDelimage(){

        $image = $_POST['image'];

        if(!isset($_POST['path'])){
            @unlink('./uploads/proimage/'.$image);
            @unlink('./uploads/proimage/zoom/'.$image);
            @unlink('./uploads/proimage/thumb/'.$image);
        }else{
            
            $path = $_POST['path'];
            echo $path.$image;
            @unlink($_POST['path'].$image);
        }
    }
    
        public function actionResize_cropImage()
    {
        $image=$_POST['image'];
        $x2=$_POST{'x2'};
        $y2=$_POST['y2'];
        $x1=$_POST['x1'];
        $y1=$_POST['y1'];
        $w=$_POST['w'];
        $h=$_POST['h'];

        $height = $_POST['height'];
        $width =  $_POST['width'];    
        $foldername = $_POST['foldername'];


        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/proimage/".$image);
        $thumb->crop($x1,$y1,$w,$h);
        if($h > $height)
            $thumb->resize($width,$height);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/proimage/".$foldername."/".$image);

        $imgarr = pathinfo($image);
        $ext = $imgarr['extension'];
        $temp_image = time().".".$ext;
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/proimage/temp/".$temp_image);

        echo $temp_image;



    }

    public function actionUploadify_process1()
    {

        // Define a destination
        $targetFolder = '/uploads/news_image/'; // Relative to the root
        ini_set('post_max_size', '640M');
        ini_set('upload_max_filesize', '640M');
        ini_set('memeory_limit', '5000M');

        if (!empty($_FILES)){

            $tempFile = $_FILES['Filedata']['tmp_name'];

            $targetPath =   Yii::getPathOfAlias('webroot').$targetFolder;
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            $file_name=time().'.'.$fileParts['extension'];

            $targetFile = rtrim($targetPath,'/') . '/' . $file_name;

            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions

            if (in_array($fileParts['extension'],$fileTypes)) {

                move_uploaded_file($tempFile,$targetFile);
                echo  $file_name;
            }
            else{
                echo '123';
            }


        }
    }

    public function actionResizeimage1(){

        $file_name=$_POST['filename'];

        $handle = new upload(Yii::getPathOfAlias('webroot')."/uploads/news_image/".$file_name);

        $handle->image_resize = true;
        $handle->image_ratio_x =true;
        $handle->image_ratio_y =true;

        $handle->jpeg_quality = 100;

        $width=$handle->image_src_x;
        $height=$handle->image_src_y;

        $orig_asc=$width/$height;

        if($width>800){
            $w=800;
            $h=800*(1/$orig_asc);
            $handle->image_x = $w;
            $handle->image_y = $h;

            $handle->file_overwrite=true;
            $handle->process(Yii::getPathOfAlias('webroot')."/uploads/news_image/");

            if($handle->processed){
                echo 'image resized';
            }
            else{
                echo 'error : ' . $handle->error;

            }

        }

        //for thumbail image
        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/news_image/".$file_name);
        $thumb->resize(300,300);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/news_image/thumb/".$file_name);

        $dataarr=$_POST['imgarr'];
        foreach($dataarr as $r){
            $w1=$r[0];
            $h1=$r[1];
            $req_ratio = $w1/$h1;
            $filenamearr = Yii::getPathOfAlias('webroot')."/uploads/news_image/thumb/" . $w1 . "X".$h1."/";

            if (!file_exists($filenamearr)) {

                mkdir($filenamearr,0777);
            }

            $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/news_image/".$file_name);
            //$thumb->crop(0,0,$w1,$h1);
            if($w1 == $h1){
                if($orig_asc > 1){
                    $thumb->resize(($h1*$orig_asc)+1,$h1);
                }
                else{
                    $thumb->resize($w1,($w1/$orig_asc)+1);
                }
            }else{
                if($w1 < $h1)
                    $thumb->resize($h1*$orig_asc,$h1);
                else
                    $thumb->resize($w1,$w1*$orig_asc);

            }

            $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/news_image/thumb/".$w1."X".$h1."/".$file_name);

            $handle1 = new upload(Yii::getPathOfAlias('webroot')."/uploads/news_image/thumb/".$w1."X".$h1."/".$file_name);

            $left =0;
            $width1=$handle1->image_src_x;

            if($width1 > $w1)
                $left = ($width1-$w1)/2;

            $thumb->crop($left,0,$w1,$h1);

            $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/news_image/thumb/".$w1."X".$h1."/".$file_name);









        }
    }

    public function actionResize_cropImage1()
    {
        $image=$_POST['image'];
        $x2=$_POST{'x2'};
        $y2=$_POST['y2'];
        $x1=$_POST['x1'];
        $y1=$_POST['y1'];
        $w=$_POST['w'];
        $h=$_POST['h'];

        $height = $_POST['height'];
        $width = $_POST['width'];
        $foldername = "thumb/".$width."X".$height;


        $thumb = Yii::app()->phpThumb->create(Yii::getPathOfAlias('webroot')."/uploads/news_image/".$image);
        $thumb->crop($x1,$y1,$w,$h);
        $thumb->save(Yii::getPathOfAlias('webroot')."/uploads/news_image/".$foldername."/".$image);


        echo $image;



    }


}