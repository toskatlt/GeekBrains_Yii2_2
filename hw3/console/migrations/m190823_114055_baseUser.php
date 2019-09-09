<?php

use yii\db\Migration;

/**
 * Class m190823_114055_baseUser
 */
class m190823_114055_baseUser extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new \common\models\User();
        $user->username='admin';
        $user->password_hash=Yii::$app->security->generatePasswordHash('123456');
        $user->auth_key='sdd';
        $user->email='admin@test.ru';

        if(!$user->save()) {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190823_114055_baseUser cannot be reverted.\n";

        return false;
    }
    */
}
