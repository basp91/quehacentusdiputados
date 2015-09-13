<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $access_token
 * @property integer $distrito_id
 * @property integer $ife
 *
 * @property VotacionCiudadana[] $votacionCiudadanas
 * @property VotacionDiputado[] $votacionDiputados
 */
class User extends \yii\db\ActiveRecord
{

    public $password;

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
            [['username', 'password','password_hash', 'auth_key', 'access_token', 'distrito_id', 'ife'], 'required'],
            [['distrito_id', 'ife'], 'integer'],
            [['username'], 'string', 'max' => 45],
            [['password_hash', 'auth_key', 'access_token'], 'string', 'max' => 128]
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuario',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'distrito_id' => 'Distrito ID',
            'ife' => 'INE',
            'password' => 'Contraseña'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVotacionCiudadanas()
    {
        return $this->hasMany(VotacionCiudadana::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVotacionDiputados()
    {
        return $this->hasMany(VotacionDiputado::className(), ['user_id' => 'id']);
    }

    //////

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($this->isNewRecord)
            {
                $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
                $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
                $this->access_token = Yii::$app->getSecurity()->generateRandomString();

            } else {
                if (!empty($this->password)){
                    $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
                }
            }
            return true;
        }
        else false;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['access_token'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
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
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password,$this->password_hash);
    }
}
