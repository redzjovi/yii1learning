<?php

/**
 * This is the model class for table "items".
 *
 * The followings are the available columns in table 'items':
 * @property integer $item_id
 * @property string $item_name
 * @property string $cost
 * @property string $selling
 * @property string $created_date
 * @property integer $brands_brand_id
 *
 * The followings are the available model relations:
 * @property Brands $brandsBrand
 */
class Items extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_name, cost, selling, created_date, brands_brand_id', 'required'),
			array('brands_brand_id', 'numerical', 'integerOnly'=>true),
			array('item_name', 'length', 'max'=>50),
			array('cost, selling', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('item_id, item_name, cost, selling, created_date, brands_brand_id', 'safe', 'on'=>'search'),
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
			'brandsBrand' => array(self::BELONGS_TO, 'Brands', 'brands_brand_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'item_id' => 'Item',
			'item_name' => 'Item Name',
			'cost' => 'Cost',
			'selling' => 'Selling',
			'created_date' => 'Created Date',
			'brands_brand_id' => 'Brands Brand',
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

		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('item_name',$this->item_name,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('selling',$this->selling,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('brands_brand_id',$this->brands_brand_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Items the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
