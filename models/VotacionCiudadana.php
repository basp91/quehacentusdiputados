<?php

namespace app\models;

use app\models\User;
use Yii;
use yii\db\Query;


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

    public function usuarioVoto($id, $iniciativa)
    {
        return $this->find()->where(['user_id' => $id, 'iniciativa_id' => $iniciativa])->exists();
    }

    public function usuarioComento($id, $iniciativa)
    {
        return $this->find()->where(['user_id' => $id, 'iniciativa_id' => $iniciativa])
            ->andWhere(['<>','comentario', 'NULL'])->exists();
    }

    public function votacion($iniciativa, $user)
    {
        //$favor = $this->find()->where(['voto' => 0, 'iniciativa_id' => $iniciativa])->count('voto');
        //$contra = $this->find()->where(['voto' => 1, 'iniciativa_id' => $iniciativa])->count('voto');

        $favor = $this->voteQuery(0, $iniciativa,$user);
        $contra = $this->voteQuery(1, $iniciativa,$user);

        return [
            'favor' => $favor/($favor+$contra),
            'contra' => $contra/($favor+$contra),
            'total' => $favor+$contra,
        ];

    }

    private function voteQuery($vote_val, $iniciativa, $user){
        $model_user = User::find()->where(['id'=> $user])->one();
        $query = new Query();
        return $query->select('votacion_ciudadana.id')->from('votacion_ciudadana')
            ->rightJoin('user','user.id = votacion_ciudadana.user_id')
            ->where(['votacion_ciudadana.voto' => $vote_val, 'votacion_ciudadana.iniciativa_id' => $iniciativa, 'user.distrito_id' => $model_user->distrito_id])->count();

    }

    public function votacionPorDistrito($iniciativa, $distrito)
    {
        $favor = $this->voteQueryDistrito(0, $iniciativa, $distrito);
        $contra = $this->voteQueryDistrito(1, $iniciativa, $distrito);

        if($favor+$contra>0){
            return [
                'favor' => $favor/($favor+$contra),
                'contra' => $contra/($favor+$contra),
                'total' => $favor+$contra,
            ];
        }else{
            return [
                'favor' => "",
                'contra' => "",
                'total' => "",
            ];
        }

    }

    private function voteQueryDistrito($vote_val, $iniciativa, $distrito){
        $query = new Query();
        return $query->select('votacion_ciudadana.id')->from('votacion_ciudadana')
            ->rightJoin('user','user.id = votacion_ciudadana.user_id')
            ->where(['votacion_ciudadana.voto' => $vote_val, 'votacion_ciudadana.iniciativa_id' => $iniciativa, 'user.distrito_id' => $distrito])->count();
    }
}
