<?php

use yii\db\Migration;

/**
 * Handles the creation for table `category`.
 */
class m160721_231611_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0),
            'alias' => $this->string(128)->notNull()->unique(),
            'title' => $this->string(128)->notNull(),
            'type' => "enum('0','1') NOT NULL DEFAULT '0'",
            'position' => 'tinyint(3) UNSIGNED NOT NULL DEFAULT 0',
            'visible' => "enum('0','1') NOT NULL DEFAULT '1'",
            'keywords' => $this->string(),
            'description' => $this->string(),
        ], 'ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
