<?php

use yii\db\Migration;

/**
 * Handles the creation for table `response`.
 */
class m160726_110409_create_response_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('response', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'email' => $this->string(128),
            'text' => $this->text()->notNull(),
            'answer' => $this->text(),
            'time' => $this->integer()->defaultValue(0),
            'ip' => $this->string(16)->notNull(),
            'new' => "enum('0','1') NOT NULL DEFAULT '1'",
            'visible' => "enum('0','1') NOT NULL DEFAULT '1'",
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('response');
    }
}
