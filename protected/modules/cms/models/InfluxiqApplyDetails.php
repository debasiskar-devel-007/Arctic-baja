<?php

/**
 * This is the model class for table "influxiq_apply_details".
 *
 * The followings are the available columns in table 'influxiq_apply_details':
 * @property integer $i_app_id
 * @property string $s_app_name
 * @property string $s_email
 * @property string $s_comment
 * @property string $s_aff_url
 * @property string $s_product_id
 * @property string $s_aff_type
 * @property string $t_add_time
 * @property integer $i_active
 */
class InfluxiqApplyDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'influxiq_apply_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('s_app_name, s_email, s_comment', 'required'),
			array('i_active', 'numerical', 'integerOnly'=>true),
			array('s_app_name, s_email, s_aff_url, s_product_id, s_aff_type', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('i_app_id, s_app_name, s_email, s_comment, s_aff_url, s_product_id, s_aff_type, t_add_time, i_active', 'safe', 'on'=>'search'),
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
			'i_app_id' => 'I App',
			's_app_name' => 'Name',
			's_email' => 'Email',
			's_comment' => 'Comment',
			's_aff_url' => 'S Aff Url',
			's_product_id' => 'S Product',
			's_aff_type' => 'S Aff Type',
			't_add_time' => 'T Add Time',
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

		$criteria->compare('i_app_id',$this->i_app_id);
		$criteria->compare('s_app_name',$this->s_app_name,true);
		$criteria->compare('s_email',$this->s_email,true);
		$criteria->compare('s_comment',$this->s_comment,true);
		$criteria->compare('s_aff_url',$this->s_aff_url,true);
		$criteria->compare('s_product_id',$this->s_product_id,true);
		$criteria->compare('s_aff_type',$this->s_aff_type,true);
		$criteria->compare('t_add_time',$this->t_add_time,true);
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
	 * @return InfluxiqApplyDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
