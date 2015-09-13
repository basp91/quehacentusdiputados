<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "distrito".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $municipio_id
 *
 * @property Diputado[] $diputados
 * @property Municipio $municipio
 */
class Distrito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distrito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'municipio_id'], 'required'],
            [['municipio_id'], 'integer'],
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
            'nombre' => 'Nombre',
            'municipio_id' => 'Municipio ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiputados()
    {
        return $this->hasMany(Diputado::className(), ['distrito_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['id' => 'municipio_id']);
    }
}
