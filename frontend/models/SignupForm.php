<?php
namespace frontend\models;

use frontend\components\NodeLogger;
use frontend\models\Mahasiswa;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nama_lengkap;
    public $nimrn;
    public $fakultas;
    public $jurusan;
    public $tahun_masuk;
    public $reCaptcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'frontend\models\Mahasiswa', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 25],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'frontend\models\Mahasiswa', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['nama_lengkap', 'required'],
            ['nama_lengkap','string', 'min' => 2, 'max'=>25],

            ['nimrn', 'required'],
            ['nimrn','number'],

            ['fakultas', 'required'],
            ['fakultas','number'],

            ['jurusan', 'required'],
            ['jurusan','number'],

            ['tahun_masuk', 'required'],
            ['tahun_masuk','string','min' => 4],

            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6Lcc-hYUAAAAAE1aXqLgelxAmUvyM5RYkcJj7j_G', 'uncheckedMessage' => 'Please confirm that you are a bot.'],
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
        
        $user = new Mahasiswa();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->nama_lengkap = $this->nama_lengkap;
        $user->nimrn = $this->nimrn;
        $user->fakultas = $this->fakultas;
        $user->jurusan = $this->jurusan;
        $user->tahun_masuk = $this->tahun_masuk;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
