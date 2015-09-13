<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diputado".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property integer $partido_id
 * @property integer $tipo_eleccion
 * @property string $cunul
 * @property string $correo
 * @property integer $periodo_inicio
 * @property integer $periodo_fin
 * @property string $sexo
 * @property integer $edad
 * @property integer $distrito_id
 *
 * @property Distrito $distrito
 * @property Partido $partido
 */
class Diputado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diputado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'partido_id', 'tipo_eleccion', 'periodo_inicio', 'periodo_fin'], 'required'],
            [['partido_id', 'tipo_eleccion', 'periodo_inicio', 'periodo_fin', 'edad', 'distrito_id'], 'integer'],
            [['nombre', 'apellido', 'cunul', 'correo'], 'string', 'max' => 45],
            [['sexo'], 'string', 'max' => 1]
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
            'apellido' => 'Apellido',
            'partido_id' => 'Partido ID',
            'tipo_eleccion' => 'Tipo Eleccion',
            'cunul' => 'Cunul',
            'correo' => 'Correo',
            'periodo_inicio' => 'Periodo Inicio',
            'periodo_fin' => 'Periodo Fin',
            'sexo' => 'Sexo',
            'edad' => 'Edad',
            'distrito_id' => 'Distrito ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrito()
    {
        return $this->hasOne(Distrito::className(), ['id' => 'distrito_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartido()
    {
        return $this->hasOne(Partido::className(), ['id' => 'partido_id']);
    }
}
