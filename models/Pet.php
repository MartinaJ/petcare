<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet".
 *
 * @property integer $id
 * @property string $name
 * @property string $species
 * @property string $chip
 * @property integer $owner_id
 *
 * @property Owner $owner
 * @property Treatment[] $treatments
 */
class Pet extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'pet';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name', 'species', 'chip', 'owner_id'], 'required'],
			[['owner_id'], 'integer'],
			[['owner_id'], 'exist', 'targetClass' => '\app\models\Owner', 'targetAttribute' => 'id'],
			[['name', 'species', 'chip'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'species' => 'Species',
			'chip' => 'Chip',
			'owner_id' => 'Owner',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOwner()
	{
		return $this->hasOne(Owner::className(), ['id' => 'owner_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTreatments()
	{
		return $this->hasMany(Treatment::className(), ['pet_id' => 'id']);
	}

	/**
	 * @param Pet[] $pets
	 * @return array
	 */
	public static function getPetsIdsWithDescription($pets)
	{
		$petsArray = [];

		foreach($pets as $pet) {
			$petsArray[$pet->id] = $pet->name . ' (' . $pet->owner->getName() . ')';
		}

		return $petsArray;
	}
}
