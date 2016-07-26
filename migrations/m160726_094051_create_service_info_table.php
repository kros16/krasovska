<?php

use yii\db\Migration;

/**
 * Handles the creation for table `service_info`.
 */
class m160726_094051_create_service_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('service_info', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'text' => $this->text(),
            'position' => 'tinyint(3) UNSIGNED NOT NULL DEFAULT 0',
            'visible' => "enum('0','1') NOT NULL DEFAULT '1'",
        ], 'ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('service_info');
    }
}
