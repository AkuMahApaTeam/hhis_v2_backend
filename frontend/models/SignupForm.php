<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public   $id_dokter;
    public $username;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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

        $user = new User();
        $user->id_dokter = $id_dokter;
        $user->username = $nama_dokter;
        $user->setPassword($password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}
