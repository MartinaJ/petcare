<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "treatment".
 *
 * @property integer $id
 * @property string $date
 * @property string $name
 * @property string $description
 * @property integer $pet_id
 * @property integer $user_id
 *
 * @property User $user
 * @property Pet $pet
 */
class Treatment extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'treatment';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['date', 'name', 'description', 'pet_id', 'user_id'], 'required'],
			[['date'], 'safe'],
			[['pet_id', 'user_id'], 'integer'],
			[['pet_id'], 'exist', 'targetClass' => '\app\models\Pet', 'targetAttribute' => 'id'],
			[['user_id'], 'exist', 'targetClass' => '\app\models\User', 'targetAttribute' => 'id'],
			[['name', 'description'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'date' => 'Date',
			'name' => 'Name',
			'description' => 'Description',
			'pet_id' => 'Pet',
			'user_id' => 'User',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'user_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPet()
	{
		return $this->hasOne(Pet::className(), ['id' => 'pet_id']);
	}

	public function beforeValidate()
	{
		$this->user_id = Yii::$app->user->identity->id;
		//$this->date = date('Y-m-d H:i');
		return parent::beforeValidate();
	}
}
