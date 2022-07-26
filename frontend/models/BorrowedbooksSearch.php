<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Borrowedbooks;

/**
 * BorrowedbooksSearch represents the model behind the search form of `frontend\models\Borrowedbooks`.
 */
class BorrowedbooksSearch extends Borrowedbooks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idbook', 'iduser'], 'integer'],
            [['fromdate', 'untildate'], 'safe'],
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
        $query = Borrowedbooks::find();

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
            'idbook' => $this->idbook,
            'iduser' => $this->iduser,
            'fromdate' => $this->fromdate,
            'untildate' => $this->untildate,
        ]);

        return $dataProvider;
    }
}
