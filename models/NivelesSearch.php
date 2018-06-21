<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Niveles;

/**
 * NivelesSearch represents the model behind the search form of `app\models\Niveles`.
 */
class NivelesSearch extends Niveles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'curso_id'], 'integer'],
            [['nombre'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Niveles::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'curso_id' => $this->curso_id,
        ]);

        $query->andFilterWhere(['ilike', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
