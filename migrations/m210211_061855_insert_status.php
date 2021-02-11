<?php

use yii\db\Migration;

/**
 * Class m210211_061855_insert_status
 */
class m210211_061855_insert_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('status', ['name', 'color'], [
            ['новая', 'new'],
            ['в работе', 'in_work'],
            ['выполнена', 'completed'],
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210211_061855_insert_status cannot be reverted.\n";

        return false;
    }

}
