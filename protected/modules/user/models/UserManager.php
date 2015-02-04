<?php

/**
* This is the model class for table "user_manager".
*
* The followings are the available columns in table 'user_manager':
* @property integer $id
* @property string $fname
* @property string $lname
* @property integer $gender
* @property string $email
* @property string $dob
* @property string $phone
* @property string $password
* @property integer $role
* @property integer $is_active
*/
class UserManager extends CActiveRecord
{
    
    
    /**
    * @return string the associated database table name
    */
    public $countryid;
    public $stateid;
    public $checkbox;
    public $is_email_active;
    public $fulladdress;
   public function tableName()
    {
        return 'user_manager';
    }

    public function beforeSave()
    {
        if(!empty($this->password))
        {
            $this->password=md5($this->password);
            $this->password2="";
        }
        $this->role = 0;
        return parent::beforeSave();
    }

    /**
    * @return array validation rules for model attributes.
    */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('fname,lname,gender,email,dob,phone,city,state,country', 'required','on'=>'add'),
        array('fname,lname,gender,email,dob,phone,city,state,country', 'required','on'=>'add1'),
        array('password,role', 'required','on'=>'add'),
        array('password,password2', 'required','on'=>'add1'),
        array('password,password2', 'required','on'=>'cngpass'),
        array('gender, is_active', 'numerical', 'integerOnly'=>true),
        //array('checkbox', 'required', 'requiredValue' => 1, 'message' => 'You should accept term to use our service','on'=>'add1'),
        array('cpa,cpl,cpc', 'numerical'),
        array('fname, lname, email, dob, phone, password', 'length', 'max'=>255),
        array('password', 'length', 'min'=>6,'on'=>'add'),
        array('password', 'length', 'min'=>6,'on'=>'add1'),
        array('password', 'length', 'min'=>6,'on'=>'cngpass'),
        array('email', 'email','message'=>"The email is not valid"),
        array('email', 'unique','message'=>"This email already exist",'on'=>'add'),
        array('email', 'unique','message'=>"This email already exist",'on'=>'add1'),
        array('password2', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match",'on'=>'add'),
        array('password2', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match",'on'=>'add1'),
        array('password2', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match",'on'=>'cngpass'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('fname, lname, email, address, state,country', 'safe', 'on'=>'search'),
        );
    }

    /**
    * @return array relational rules.
    */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
    * @return array customized attribute labels (name=>label)
    */
    public function attributeLabels()
    {
        return array(
        'id' => 'ID',
        'fname' => 'First Name',
        'lname' => 'Last Name',
        'gender' => 'Gender',
        'email' => 'Email',
        'dob' => 'Date Of Birth',
        'phone' => 'Phone No',
        'password' => 'Password',
        'password2' => 'Confirm Password',
        'role' => 'Role',
        'address' => 'Address',
        'city' => 'City',
        'state' => 'State',
        'country' => 'Country',
        'is_active' => 'Is Active',
        'is_email_active' => 'Email Status',
        'cpa' => 'CPA',
        'cpl' => 'CPL',
        'cpc' => 'CPC',
       'checkbox'=>"<span id='terms-cond'>I agree to the <a id='terms' href ='#'>  terms & conditions </a> </span>",
        );
    }

    /**
    * Retrieves a list of models based on the current search/filter conditions.
    *
    * Typical usecase:
    * - Initialize the model fields with values from filter form.
    * - Execute this method to get CActiveDataProvider instance which will filter
    * models according to data in model fields.
    * - Pass data provider to CGridView, CListView or any similar widget.
    *
    * @return CActiveDataProvider the data provider that can return the models
    * based on the search/filter conditions.
    */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.
        //echo @$_GET['UserManager']['role'];
        //var_dump($_GET);
        //exit;
        $criteria=new CDbCriteria;
        $criteria->distinct = true;
        //$criteria->join = 'LEFT JOIN country  ON country.id = t.country LEFT JOIN state  ON state.id = t.state';
        if(isset($_GET['UserManager']['role']) && !empty($_GET['UserManager']['role'])){
            $criteria->join = 'LEFT JOIN country  ON country.id = t.country LEFT JOIN state  ON state.id = t.state LEFT JOIN user_role_relation ON user_role_relation.user_id = t.id';
        }else{
            $criteria->join = 'LEFT JOIN country  ON country.id = t.country LEFT JOIN state  ON state.id = t.state'; 
        }

        if(isset($_GET['UserManager']['role']) && !empty($_GET['UserManager']['role'])){
            $criteria->select = 't.id,t.fname,t.lname,t.gender,t.email,t.dob,t.phone,t.address,t.city,state.s_st_name as state,country.s_name as country,t.is_active,t.cpa,t.cpl,t.cpc,t.state as stateid,t.country as countryid,user_role_relation.role_id as role,t.is_email_active,CONCAT(t.address,", ",t.city,", ",state.s_st_name,", ",country.s_name) AS fulladdress';
            /*$criteria->params = array (
            ':user_role_relation.role_id' => $_GET['UserManager']['role'],

            );*/
            $criteria->addCondition(
            "(user_role_relation.role_id= " . @$_GET['UserManager']['role'] .
            ")");

        }else{
            $criteria->select = 't.id,t.fname,t.lname,t.gender,t.email,t.dob,t.phone,t.address,t.city,state.s_st_name as state,country.s_name as country,t.is_active,t.cpa,t.cpl,t.cpc,t.state as stateid,t.country as countryid,is_email_active,CONCAT(t.address,", ",t.city,", ",state.s_st_name,", ",country.s_name) AS fulladdress';
        }
        //$criteria->addCondition('is_email_active =2');
        $criteria->together = true; 


        $criteria->compare('id',$this->id);
        $criteria->compare('fname',$this->fname,true);
        $criteria->compare('lname',$this->lname,true);
        //$criteria->compare('gender',$this->gender);
        $criteria->compare('email',$this->email,true);
        //$criteria->compare('dob',$this->dob,true);
        //$criteria->compare('phone',$this->phone,true);
        //$criteria->compare('password',$this->password,true);
        //$criteria->compare('role',$this->role);
        $criteria->compare('address',$this->fulladdress,true,'OR');
        $criteria->compare('city',$this->fulladdress,true,'OR');
        $criteria->compare('state.s_st_name',$this->fulladdress,true,'OR');
        $criteria->compare('country.s_name',$this->fulladdress,true,'OR');
        //$criteria->compare('is_active',$this->is_active,true);
        //$criteria->compare('is_email_active',$this->is_email_active);


        return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
        ));
    }

    /**
    * Returns the static model of the specified AR class.
    * Please note that you should have this exact method in all your CActiveRecord descendants!
    * @param string $className active record class name.
    * @return Usermanager the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    //This is for insert in table.
    public function saveproduct($is_email = 2)
    {
        $this->address = $_POST['UserManager']['address'];
        $this->is_active = 1;
        
        $this->is_email_active = $is_email;

        $this->save();
        $insertid = $this->id;
        return $insertid;
    }

    //This is for toggle action
    public function updatestatus($id)
    {
       $i=$id;
        $tablename=$this->tableName();
        $pk='id';
        $attribute='is_active';
        $command=  yii::app()->db->createCommand('call common2("'.$tablename.'","'.$attribute.'","'.$pk.'",'.$id.')');
        $command->execute();
    }

    //This is for gender toggle action
    public function updategender($id)
    {
        $command = Yii::app()->db->createCommand('call cng_user_gender('.$id.')');
        $command->execute();        
    }

    //This is for update database table in inline 
    public function updatetable($post)
    {
        $this->updateByPk($post['pk'],array($post['name']=>$post['value']));
    }

    //This is for get value by ID
    public function fetchdetail($id)
    {
        $res=$this->findByPk($id);
        return $res;

    }

    //This is update user
    public function updatedetails($id)
    {
        $fname = $_POST['UserManager']['fname'];
        $lname = $_POST['UserManager']['lname'];
        $gender = $_POST['UserManager']['gender'];
        $email = $_POST['UserManager']['email'];
        $dob = $_POST['UserManager']['dob'];
        $phone = $_POST['UserManager']['phone'];
        $address = $_POST['UserManager']['address'];
        $city = $_POST['UserManager']['city'];
        $state = $_POST['UserManager']['state'];
        $country = $_POST['UserManager']['country'];
        $is_active = $_POST['UserManager']['is_active'];
       // $is_active = $_POST['UserManager']['role']);

/*        if(in_array(9,$_POST['UserManager']['role'])){
            $cpa = $_POST['UserManager']['cpa'];
            $cpc = $_POST['UserManager']['cpl'];
            $cpl = $_POST['UserManager']['cpc'];
        }else{
            $cpa = 0;
            $cpc = 0;
            $cpl = 0;
        }
           */

        $this->updateByPk($id,array('fname'=>$fname,'lname'=>$lname,'gender'=>$gender,'email'=>$email,'dob'=>$dob,'phone'=>$phone,'address'=>$address,'city'=>$city,'state'=>$state,'country'=>$country,'is_active'=>$is_active));
    }
    
    function changepass($id,$data){
        $pass = $data['password'];
        
        $this->updateByPk($id,array('password'=>md5($pass)));
    }


}
