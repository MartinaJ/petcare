<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 * @property string $specialization
 * @property integer $role
 *
 * @property Treatment[] $treatments
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;
    public $accessToken;

    const ROLE_STANDARD = 1;
    const ROLE_ADMIN = 2;

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $user = User::findOne($id);

        return !empty($user) ? $user : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \Exception('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param  string $email
     * @return static|null
     */
    public static function findByUsername($email)
    {
        $user = User::findOne(['email' => $email]);

        return !empty($user) ? $user : null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email', 'password', 'specialization'], 'required'],
            [['role', 'id'], 'integer'],
            [['email'], 'email'],
            [['email'], 'unique'],
            [['name', 'surname', 'email', 'password', 'specialization'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'password' => 'Password',
            'specialization' => 'Specialization',
            'role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTreatments()
    {
        return $this->hasMany(Treatment::className(), ['user_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if ($insert && $this->isNewRecord) {
            $this->role = self::ROLE_STANDARD;
            $this->password = sha1($this->password);
        }

        return parent::beforeSave($insert);
    }

    public function isAdmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }
}
