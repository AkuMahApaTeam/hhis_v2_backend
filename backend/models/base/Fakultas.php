<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "fakultas".
 *
 * @property integer $id
 * @property string $nama_fakultas
 *
 * @property \app\models\Jurusan[] $jurusans
 * @property \app\models\Mahasiswa[] $mahasiswas
 * @property string $aliasModel
 */
abstract class Fakultas extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fakultas';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_fakultas'], 'required'],
            [['nama_fakultas'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_fakultas' => 'Nama Fakultas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurusans()
    {
        return $this->hasMany(\app\models\Jurusan::className(), ['fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMahasiswas()
    {
        return $this->hasMany(\app\models\Mahasiswa::className(), ['fakultas' => 'id']);
    }




}
