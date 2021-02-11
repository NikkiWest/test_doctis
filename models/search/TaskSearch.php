<?php


namespace app\models\search;


use app\models\Task;
use yii\data\ActiveDataProvider;

class TaskSearch extends Task
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
        ];
    }

    public function search($params)
    {
        $query = Task::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20
            ]
        ]);


        $this->setAttributes($params);

        if (!$this->validate()) {
            return $dataProvider;
        }


        $query->andFilterWhere([
            'id' => $this->id
        ]);

        return $dataProvider;
    }
}