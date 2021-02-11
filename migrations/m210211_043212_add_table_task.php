<?php

use yii\db\Migration;

/**
 * Class m210211_043212_add_table_task
 */
class m210211_043212_add_table_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'desc' => $this->text(),
            'status_id' => $this->integer(),
            'dt_create' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-status-status_id',
            'task',
            'status_id',
            'status',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
        $this->dropForeignKey(
            'fk-status-status_id',
            'task'
        );
    }
}
