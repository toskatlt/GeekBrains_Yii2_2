<?php

namespace backend\models;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $id_user
 * @property string $message
 * @property int $created_at
 */
class Messages extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'created_at'], 'required'],
            [['id_user','created_at'], 'integer'],
            [['message'], 'text'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'message' => 'Message',
            'created_at' => 'Created At',
        ];
    }
}
