<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name
 * @property string|null $desc
 * @property int|null $status_id
 * @property int $dt_create
 *
 * @property Status $status
 */
class Task extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'dt_create',
                ],
                'value' => strtotime("now"),
            ]
        ];
    }


    public function rules()
    {
        return [
            [['name', 'status_id'], 'required'],
            [['desc'], 'string'],
            [['status_id', 'dt_create'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['status_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'desc' => 'Описание',
            'status_id' => 'Статус ID',
            'dt_create' => 'Дата создания',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }
}
