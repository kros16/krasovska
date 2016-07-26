<?php

use yii\db\Migration;

/**
 * Handles the creation for table `service`.
 */
class m160726_080948_create_service_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('service', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull(),
            'price' => $this->float()->notNull(),
            'description' => $this->text()->notNull(),
            'type' => "enum('0','1') NOT NULL DEFAULT '0'",
            'position' => 'tinyint(3) UNSIGNED NOT NULL DEFAULT 0',
            'visible' => "enum('0','1') NOT NULL DEFAULT '1'",
        ], 'ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('service');
    }
}
