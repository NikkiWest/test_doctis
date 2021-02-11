<?php

use yii\db\Migration;

/**
 * Class m210211_042241_add_table_task
 */
class m210211_042241_add_table_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'color' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('status');
    }

}
