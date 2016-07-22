<?php

use yii\db\Migration;

/**
 * Handles the creation for table `album`.
 */
class m160722_124353_create_album_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('album', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'alias' => $this->string(128)->notNull()->unique(),
            'title' => $this->string(128)->notNull(),
            'img' => $this->string()->notNull()->defaultValue('no-image.jpg'),
            'shooting_date' => $this->date(),
            'type' => "enum('0','1') NOT NULL DEFAULT '0'",
            'position' => 'tinyint(3) UNSIGNED NOT NULL DEFAULT 0',
            'visible' => "enum('0','1') NOT NULL DEFAULT '1'",
            'keywords' => $this->string(),
            'description' => $this->string(),
        ], 'ENGINE=InnoDB');

        // creates index for column `category_id`
        $this->createIndex(
            'idx-album-category_id',
            'album',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-album-category_id',
            'album',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-album-category_id',
            'album'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-album-category_id',
            'album'
        );

        $this->dropTable('album');
    }
}
