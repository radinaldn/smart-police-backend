<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_user".
 *
 * @property int $id_user
 * @property string $password
 * @property string $nama
 * @property string $created_at
 * @property string $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'password', 'nama'], 'required'],
            [['id_user'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['password'], 'string', 'max' => 255],
            [['nama'], 'string', 'max' => 150],
            [['id_user'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'password' => 'Password',
            'nama' => 'Nama',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
