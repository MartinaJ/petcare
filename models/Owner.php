<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "owner".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $address
 * @property string $phone
 * @property string $email
 *
 * @property Pet[] $pets
 */
class Owner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'owner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'address', 'phone', 'email'], 'required'],
            [['name', 'surname', 'address', 'phone', 'email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['email'], 'unique'],
			[['fullName'], 'safe'],
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
            'surname' => 'Surname',
			'fullName' => 'Full name',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPets()
    {
        return $this->hasMany(Pet::className(), ['owner_id' => 'id']);
    }

    public function getName()
    {
        return $this->name . ' ' . $this->surname;
    }

	/**
	 * @param Owner[] $owners
	 * @return array
	 */
	public static function getOwnerIdsWithDescription($owners)
	{
		$petsArray = [];

		foreach($owners as $owner) {
			$petsArray[$owner->id] = $owner->getName();
		}

		return $petsArray;
	}

	/* Getter for person full name */
	public function getFullName() {
		return $this->name . ' ' . $this->surname;
	}
}
