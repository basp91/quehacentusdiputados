<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "iniciativa".
 *
 * @property integer $id
 * @property string $asunto
 * @property string $fecha
 * @property string $descripcion
 *
 * @property VotacionCiudadana[] $votacionCiudadanas
 * @property VotacionDiputado[] $votacionDiputados
 */
class Iniciativa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'iniciativa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asunto', 'descripcion'], 'required'],
            [['fecha'], 'safe'],
            [['descripcion'], 'string', 'max' => 1000],
            [['asunto'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'asunto' => 'Asunto',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVotacionCiudadanas()
    {
        return $this->hasMany(VotacionCiudadana::className(), ['iniciativa_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVotacionDiputados()
    {
        return $this->hasMany(VotacionDiputado::className(), ['iniciativa_id' => 'id']);
    }
}
