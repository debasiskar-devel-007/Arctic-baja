<?php

class DefaultController extends Controller
{

    public function init(){
        yii::app()->theme='cow';
        return true;
    }
        public function actionIndex()
    {
		
	/*$res =$_SERVER['HTTP_REFERER'];
	$r=explode("/",$res);*/
	
	
	
		
        $this->pageTitle = "Contactus || " .Yii::app()->params['site_url'];
        $model= new Contact('search');
        $res1 = 0;
        if(count($_POST)>0)
        {

            $model->attributes=$_POST['Contact'];

            if($model->validate())
            {

                $res1 = 1;
                $res="";
                $res=$model->insertdata();

                $arr['name']= $_POST['Contact']['name'];
                $arr['email']=   $_POST['Contact']['email'];
                //$arr['subject']=   $_POST['Contact']['subject'];
                $arr['message']=   $_POST['Contact']['message'];
                $arr['phone']=   $_POST['Contact']['phone'];
              
                $this->actionSendMail($arr);      
                Yii::app()->session['contactsubmitvar'] = $res1;
                Yii::app()->session['arr'] = $arr;


            }
           /* $model1= new Page();
            $res=$model1->fetchcontent('contact');
            $this->renderPartial('cms.views.page.contact',array('res'=>$res));
            exit;*/

        /*  else
          {

              echo CActiveForm::validate($model);
              Yii::app()->end();

             //var_dump($model->getErrors());
              //exit;

          }*/

        }



       $this->redirect(Yii::app()->request->baseUrl.'/contact');
        
         

    }

    public function actionSendMail($studModel1)
    {


        set_time_limit(0);
        $message=new YiiMailMessage;
        $model=new Mails();
        $ad_mail=$model->fetchmail();


        //this points to the file test.php inside the view path

        $message->view = "newslettercon";



        $params   = array('myMail'=>$studModel1);


        $message->subject    = 'New Lead';
        $message->setBody($params, 'text/html');
        foreach($ad_mail as $r) {
            $message->addTo($r['email']);


        }
        $message->from = 'support@computeriq.com';
        Yii::app()->mail->send($message);
    }
    public function actionResetsession()
    {

        unset(Yii::app()->session['contactsubmitvar']);

    }
    


}