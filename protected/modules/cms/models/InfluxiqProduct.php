<?php

/**
 * This is the model class for table "influxiq_product".
 *
 * The followings are the available columns in table 'influxiq_product':
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property double $price
 * @property string $feature
 * @property double $transaction_charge
 * @property double $insall_charge
 * @property double $platform_cost
 * @property double $codeonly_price
 * @property string $page_range
 * @property string $image
 * @property string $contract
 * @property integer $order
 * @property integer $prodnum
 * @property integer $i_active
 */
class InfluxiqProduct extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'influxiq_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, name, description, price, feature, transaction_charge, insall_charge, platform_cost, codeonly_price, page_range, image, contract, order', 'required'),
			array('category_id, order, prodnum, i_active', 'numerical', 'integerOnly'=>true),
			array('price, transaction_charge, insall_charge, platform_cost, codeonly_price', 'numerical'),
			array('name, image', 'length', 'max'=>100),
			array('feature, page_range', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, name, description, price, feature, transaction_charge, insall_charge, platform_cost, codeonly_price, page_range, image, contract, order, prodnum, i_active', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category',
			'name' => 'Name',
			'description' => 'Description',
			'price' => 'For Platform , Design',
			'feature' => 'Only For Platform',
			'transaction_charge' => 'Only For Platform',
			'insall_charge' => 'Only For Platform',
			'platform_cost' => 'Only For Platform',
			'codeonly_price' => 'Only For Design',
			'page_range' => 'Only For Design',
			'image' => 'For Platform , Design',
			'contract' => 'Contract',
			'order' => 'Order',
			'prodnum' => 'Prodnum',
			'i_active' => 'I Active',
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('feature',$this->feature,true);
		$criteria->compare('transaction_charge',$this->transaction_charge);
		$criteria->compare('insall_charge',$this->insall_charge);
		$criteria->compare('platform_cost',$this->platform_cost);
		$criteria->compare('codeonly_price',$this->codeonly_price);
		$criteria->compare('page_range',$this->page_range,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('contract',$this->contract,true);
		$criteria->compare('order',$this->order);
		$criteria->compare('prodnum',$this->prodnum);
		$criteria->compare('i_active',$this->i_active);

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
	 * @return InfluxiqProduct the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
   
}
