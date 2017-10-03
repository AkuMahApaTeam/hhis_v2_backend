<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "komentar_forum".
 *
 * @property integer $id
 * @property integer $id_forum
 * @property string $isi_komentar
 * @property integer $id_mahasiswa
 *
 * @property \backend\models\Forum $idForum
 * @property \backend\models\Mahasiswa $idMahasiswa
 * @property string $aliasModel
 */
abstract class KomentarForum extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komentar_forum';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_forum', 'isi_komentar', 'id_mahasiswa'], 'required'],
            [['id_forum', 'id_mahasiswa'], 'integer'],
            [['isi_komentar'], 'string'],
            [['id_forum'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\Forum::className(), 'targetAttribute' => ['id_forum' => 'id']],
            [['id_mahasiswa'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Mahasiswa::className(), 'targetAttribute' => ['id_mahasiswa' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_forum' => 'Id Forum',
            'isi_komentar' => 'Isi Komentar',
            'id_mahasiswa' => 'Id Mahasiswa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdForum()
    {
        return $this->hasOne(\backend\models\Forum::className(), ['id' => 'id_forum']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMahasiswa()
    {
        return $this->hasOne(\app\models\Mahasiswa::className(), ['id' => 'id_mahasiswa']);
    }




}
