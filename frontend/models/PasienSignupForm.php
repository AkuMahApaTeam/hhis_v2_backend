<?php
namespace frontend\models;

use frontend\components\NodeLogger;
use frontend\models\Pasien;
use common\models\User;
use yii\base\Model;

/**
 * Signup form
 */
class PasienSignupForm extends Model
{
    public $nama_pasien;
    public $alamat;
    public $no_telp_pasien;
    public $gol_darah;
    public $jenis_kelamin;
    public $nik;
    public $id_kota;
    public $id_provinsi;
    public $id_user;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['nama_pasien', 'required'],
            ['nama_pasien','string'],

            ['alamat', 'required'],
            ['alamat','string'],

            ['no_telp_pasien', 'required'],
            ['no_telp_pasien','string'],

            ['gol_darah', 'required'],
            ['gol_darah','string'],

            ['jenis_kelamin', 'required'],
            ['jenis_kelamin','string'],

            ['nik', 'trim'],
            ['nik', 'required'],
            [['nik'], 'unique', 'skipOnError' => true, 'targetClass' => Pasien::className(), 'targetAttribute' => ['nik' => 'nik']],

            ['id_kota', 'required'],
            ['id_provinsi', 'required'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'frontend\models\Pasien', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

          
        

            
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
         $user = new User();
         $user->username = $this->email;
         $user->setPassword($this->password);
         $user->generateAuthKey();
         $user->email = $this->email;
         $user->role = 7;
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

            $pasien = new Pasien();

            $pasien->nama_pasien = $this->nama_pasien;
            $pasien->alamat = $this->alamat;
            $pasien->no_telp_pasien = $this->no_telp_pasien;
            $pasien->gol_darah = $this->gol_darah;
            $pasien->jenis_kelamin = $this->jenis_kelamin;
            $pasien->nik = $this->nik;
            $pasien->id_kota = $this->id_kota;
            $pasien->id_provinsi = $this->id_provinsi;
            $pasien->id_user = $this->id_user;
            $pasien->email = $this->email;
            $pasien->password = $this->password;

             return $pasien->save() ? $pasien : null;

        }        
       
    }
}
