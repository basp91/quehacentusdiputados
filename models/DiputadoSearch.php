<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diputado;

/**
 * DiputadoSearch represents the model behind the search form about `app\models\Diputado`.
 */
class DiputadoSearch extends Diputado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'partido_id', 'tipo_eleccion', 'periodo_inicio', 'periodo_fin', 'edad', 'distrito_id'], 'integer'],
            [['nombre', 'apellido', 'cunul', 'correo', 'sexo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Diputado::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'partido_id' => $this->partido_id,
            'tipo_eleccion' => $this->tipo_eleccion,
            'periodo_inicio' => $this->periodo_inicio,
            'periodo_fin' => $this->periodo_fin,
            'edad' => $this->edad,
            'distrito_id' => $this->distrito_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'cunul', $this->cunul])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'sexo', $this->sexo]);

        return $dataProvider;
    }
}
