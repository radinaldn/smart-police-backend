<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pelapor".
 *
 * @property int $id_pelapor
 * @property string $password
 * @property string $nama
 * @property string $jk
 * @property string $alamat
 * @property string $foto
 * @property string $hp
 *
 * @property Laporan[] $tbLaporans
 */
class Pelapor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pelapor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pelapor', 'password', 'nama', 'jk', 'alamat', 'foto', 'hp'], 'required'],
            [['id_pelapor'], 'integer'],
            [['jk', 'alamat'], 'string'],
            [['password'], 'string', 'max' => 255],
            [['nama', 'foto'], 'string', 'max' => 150],
            [['hp'], 'string', 'max' => 12],
            [['id_pelapor'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pelapor' => 'Id Pelapor',
            'password' => 'Password',
            'nama' => 'Nama Pelapor',
            'jk' => 'Jk',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
            'hp' => 'Hp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbLaporans()
    {
        return $this->hasMany(Laporan::className(), ['id_pelapor' => 'id_pelapor']);
    }
}
