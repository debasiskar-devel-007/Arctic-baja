<?php

/**
 * This is the model class for table "news_img".
 *
 * The followings are the available columns in table 'news_img':
 * @property string $id
 * @property string $name
 * @property string $news_id
 */
class NewsImg extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news_img';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('news_id', 'length', 'max'=>255),
			array('name', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, news_id', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'news_id' => 'News',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('news_id',$this->news_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NewsImg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function savedata($r,$vid){

        //var_dump($vid);
        //exit;
        foreach($vid as $v){
            //echo $v;
            //exit;
            $this->id =null;
            $this->isNewRecord =true;
            $this->news_id=$r;
            $this->name=$v;
            $this->save();


        }


    }

    public function deletedata($id)
    {
        $conn = yii::app()->db;
        $sql='delete  from  news_img where news_id='.$id;
        $result=$conn->createCommand($sql);
        $result=$result->execute();

    }

    public function fecthImage($id=0){
        if($id > 0){
            $res = $this->findAll('news_id = '.$id);
        }else{
            $res = $this->findAll();
        }
        return $res;
    }


}
