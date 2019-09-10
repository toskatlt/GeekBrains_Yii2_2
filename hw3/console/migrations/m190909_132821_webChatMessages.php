<?php

use yii\db\Migration;

/**
 * Class m190909_132821_webChatMessages
 */
class m190909_132821_webChatMessages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'message' => $this->text(),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('messages');
    }
}
