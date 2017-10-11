<?php
namespace frontend\models;

<<<<<<< HEAD
use frontend\components\NodeLogger;
use frontend\models\Dokter;
use frontend\models\IzinDokter;
use common\models\User;
=======
>>>>>>> api
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
<<<<<<< HEAD
    public $id_no_izin;
    public $email;
    public $alamat_rumah;
    public $alamat_praktik;
    public $nama_dokter;
    public $no_telp;
    public $password;
    public $id_kota;
    public $id_provinsi;
    public $id_user;
=======
    public   $id_dokter;
    public $username;
    public $password;

>>>>>>> api

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            ['id_no_izin', 'trim'],
            ['id_no_izin', 'required'],
            [['id_no_izin'], 'exist', 'skipOnError' => true, 'targetClass' => IzinDokter::className(), 'targetAttribute' => ['id_no_izin' => 'no_izin']],
            [['id_no_izin'], 'unique', 'skipOnError' => true, 'targetClass' => Dokter::className(), 'targetAttribute' => ['id_no_izin' => 'id_no_izin']],
         
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'frontend\models\Dokter', 'message' => 'This email address has already been taken.'],

            ['alamat_rumah', 'required'],
            ['alamat_rumah','string'],

            ['alamat_praktik', 'required'],
            ['alamat_praktik','string'],

            ['nama_dokter', 'required'],
            ['nama_dokter','string'],

            ['no_telp', 'required'],
            ['no_telp','string'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['id_kota', 'required'],
            ['id_provinsi', 'required'],

        

            
=======
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
>>>>>>> api
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($id_dokter, $nama_dokter, $password)
    {
        if (!$this->validate()) {
            return null;
        }
<<<<<<< HEAD
        
         $user = new User();
         $user->username = $this->email;
         $user->setPassword($this->password);
         $user->generateAuthKey();
         $user->email = $this->email;
         $user->role = 8;
        if ($user->save()) {
             $query = new \yii\db\Query();
                    $showId = $query->select(['id'])
                        ->from('user')
                        ->orderBy(['id' => SORT_DESC])
                        ->limit(1)
                        ->all();
            foreach ($showId as $key => $value) {
                        $this->id_user = $value['id'];
                    }

            $dokter = new Dokter();

            $modelnya =IzinDokter::find()->where(['no_izin' => $this->id_no_izin])->One();
            $dokter->id_no_izin = $modelnya->id_no_izin;
            $dokter->email = $this->email;
            $dokter->alamat_rumah = $this->alamat_rumah;
            $dokter->alamat_praktik = $this->alamat_praktik;
            $dokter->nama_dokter = $this->nama_dokter;
            $dokter->no_telp = $this->no_telp;
            $dokter->password = $this->password;
            $dokter->id_kota = $this->id_kota;
            $dokter->id_provinsi = $this->id_provinsi;
            $dokter->id_user = $this->id_user;

             return $dokter->save() ? $dokter : null;

        }        
       
=======

        $user = new User();
        $user->id_dokter = $id_dokter;
        $user->username = $nama_dokter;
        $user->setPassword($password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
>>>>>>> api
    }
}
