<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "votacion_ciudadana".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $iniciativa_id
 * @property integer $voto
 * @property string $comentario
 *
 * @property Iniciativa $iniciativa
 * @property User $user
 */
class VotacionCiudadana extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'votacion_ciudadana';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'iniciativa_id', 'voto'], 'required'],
            [['user_id', 'iniciativa_id', 'voto'], 'integer'],
            [['comentario'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'iniciativa_id' => 'Iniciativa ID',
            'voto' => 'Voto',
            'comentario' => 'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIniciativa()
    {
        return $this->hasOne(Iniciativa::className(), ['id' => 'iniciativa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
