<?php

class DefaultController extends Controller
{
    
    public function init()
    {
       yii::app()->theme ='cow';
        
    }
	public function actionIndex()
	{
        $model = new News();
        $this->pageTitle="News";
        yii::app()->params['pageactive']='news';
        //$res=$model->fetch();
        
		$this->render('index',array('model'=>$model));
	}
    
        public function actiondetails($id=0)
    {
        
        $id = $_GET['id'];
        
        $model = new News();
        yii::app()->params['pageactive']='news';
        
        //$res = $model->fetchdata($id);
        $this->pageTitle = "Newsdetails || ".Yii::app()->params['site_url'];
        $this->render('news',array('model'=>$model,'id'=>$id));
    }
}