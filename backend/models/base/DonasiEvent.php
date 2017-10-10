<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "donasi_event".
 *
 * @property integer $id
 * @property integer $event
 * @property integer $donatur
 * @property integer $jumlah
 * @property string $tanggal
 * @property string $fakultas
 * @property string $jurusan
 * @property string $aliasModel
 */
abstract class DonasiEvent extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donasi_event';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event', 'donatur', 'jumlah', 'tanggal'], 'required'],
            [['event', 'donatur', 'jumlah','valid','fakultas','jurusan'], 'integer'],
            [['tanggal','tgl_valid'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event' => 'Event',
            'donatur' => 'Donatur',
            'jumlah' => 'Jumlah',
            'tanggal' => 'Tanggal',
        ];
    }




}
