<?php

use yii\db\Migration;

/**
 * Handles the creation for table `feedback`.
 */
class m160723_213801_create_feedback_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'email' => $this->string(128)->notNull(),
            'phone' => $this->string(64),
            'text' => $this->text()->notNull(),
            'answer_subject' => $this->string(128),
            'answer_text' => $this->text(),
            'time' => $this->integer()->defaultValue(0),
            'ip' => $this->string(16)->notNull(),
            'status' => "enum('0','1','2') NOT NULL DEFAULT '0'",
        ], 'ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('feedback');
    }
}
