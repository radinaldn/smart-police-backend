<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_laporan".
 *
 * @property int $id_laporan
 * @property int $id_pelapor
 * @property string $judul
 * @property double $lat
 * @property double $lng
 * @property string $ket
 * @property string $foto
 * @property int $id_kategori
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Kategori $kategori
 * @property Pelapor $pelapor
 */
class Laporan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_laporan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pelapor', 'judul', 'lat', 'lng', 'ket', 'foto', 'id_kategori'], 'required'],
            [['id_pelapor', 'id_kategori'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['ket'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['judul'], 'string', 'max' => 150],
            [['foto'], 'string', 'max' => 255],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['id_kategori' => 'id_kategori']],
            [['id_pelapor'], 'exist', 'skipOnError' => true, 'targetClass' => Pelapor::className(), 'targetAttribute' => ['id_pelapor' => 'id_pelapor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_laporan' => 'Id Laporan',
            'id_pelapor' => 'Id Pelapor',
            'judul' => 'Judul',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'ket' => 'Ket',
            'foto' => 'Foto',
            'id_kategori' => 'Id Kategori',
            'created_at' => 'Dikirim Pada',
            'updated_at' => 'Dirubah Pada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id_kategori' => 'id_kategori']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelapor()
    {
        return $this->hasOne(Pelapor::className(), ['id_pelapor' => 'id_pelapor']);
    }
}
