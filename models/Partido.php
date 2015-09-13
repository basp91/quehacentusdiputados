<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partido".
 *
 * @property integer $id
 * @property string $siglas
 * @property string $nombre
 *
 * @property Diputado[] $diputados
 */
class Partido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['siglas', 'nombre'], 'required'],
            [['siglas'], 'string', 'max' => 10],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'siglas' => 'Siglas',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiputados()
    {
        return $this->hasMany(Diputado::className(), ['partido_id' => 'id']);
    }
}
