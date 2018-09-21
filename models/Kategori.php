<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_kategori".
 *
 * @property int $id_kategori
 * @property string $judul
 * @property string $ket
 *
 * @property Laporan[] $tbLaporans
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul', 'ket'], 'required'],
            [['ket'], 'string'],
            [['judul'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kategori' => 'Id Kategori',
            'judul' => 'Kategori',
            'ket' => 'Ket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbLaporans()
    {
        return $this->hasMany(Laporan::className(), ['id_kategori' => 'id_kategori']);
    }
}
