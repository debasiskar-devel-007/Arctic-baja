<?php

/**
 * This is the model class for table "influxiq_order_details".
 *
 * The followings are the available columns in table 'influxiq_order_details':
 * @property integer $id
 * @property string $fname
 * @property string $lname
 * @property string $phone
 * @property string $email
 * @property string $signature
 * @property string $product
 * @property double $price
 * @property string $aff_code
 * @property string $aff_type
 * @property string $aff_name
 * @property string $order_date
 */
class InfluxiqOrderDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'influxiq_order_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fname, lname, phone, email', 'required'),
			array('signature', 'required', 'on'=>'sss'),
			array('price', 'numerical'),
			array('fname, lname, email', 'length', 'max'=>200),
			array('phone', 'length', 'max'=>100),
			array('signature', 'length', 'max'=>250),
			array('aff_code, aff_type, aff_name', 'length', 'max'=>255),
			array('fname,lname,phone,email,signature,product,price,aff_code,aff_type,aff_name,order_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fname, lname, phone, email, signature, product, price, aff_code, aff_type, aff_name, order_date', 'safe', 'on'=>'search'),
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
			'phone' => 'Telephone',
			'email' => 'Email',
			'signature' => 'Digital Signature',
			'product' => 'Product',
			'price' => 'Price',
			'aff_code' => 'Aff Code',
			'aff_type' => 'Aff Type',
			'aff_name' => 'Aff Name',
			'order_date' => 'Order Date',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('signature',$this->signature,true);
		$criteria->compare('product',$this->product,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('aff_code',$this->aff_code,true);
		$criteria->compare('aff_type',$this->aff_type,true);
		$criteria->compare('aff_name',$this->aff_name,true);
		$criteria->compare('order_date',$this->order_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->db1;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InfluxiqOrderDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
