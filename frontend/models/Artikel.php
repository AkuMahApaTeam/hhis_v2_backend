<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artikel".
 *
 * @property integer $id_artikel
 * @property string $judul
 * @property string $deskripsi
 * @property string $image
 *
 * @property ArtikelDokter[] $artikelDokters
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artikel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'deskripsi'], 'string'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_artikel' => 'Id Artikel',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtikelDokters()
    {
        return $this->hasMany(ArtikelDokter::className(), ['id_artikel' => 'id_artikel']);
    }
}
