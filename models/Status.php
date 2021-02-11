<?php

namespace app\models;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $name
 * @property string $color
 *
 * @property Task[] $tasks
 */
class Status extends ActiveRecord
{

    public static function tableName()
    {
        return 'status';
    }

    /**
     * @return array|array[]
     */
    public function rules()
    {
        return [
            [['name', 'color'], 'required'],
            [['name', 'color'], 'string', 'max' => 100],
        ];
    }

    /**
     * @return array|string[]
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'color' => 'Цвет',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::class, ['status_id' => 'id']);
    }
}
