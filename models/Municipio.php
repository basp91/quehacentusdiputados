<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $entidad_id
 *
 * @property Distrito[] $distritos
 * @property Entidad $entidad
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'entidad_id'], 'required'],
            [['entidad_id'], 'integer'],
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
            'entidad_id' => 'Entidad ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistritos()
    {
        return $this->hasMany(Distrito::className(), ['municipio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntidad()
    {
        return $this->hasOne(Entidad::className(), ['id' => 'entidad_id']);
    }
}
