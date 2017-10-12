<?php

namespace api\modules\v1\models {

    use \yii\db\ActiveRecord;
    /**
     * Country Model
     *
     * @author Budi Irawan <deerawan@gmail.com>
     */
    class User extends ActiveRecord
    {
        /**
         * @inheritdoc
         */
        public static function tableName()
        {
            return 'user';
        }

        /**
         * @inheritdoc
         */
        public static function primaryKey()
        {
            return ['id'];
        }

        /**
         * Define rules for validation
         */
        public function rules()
        {
            return [
                [['username', 'password_hash', 'email','status'], 'required']
            ];
        }
        public static function findByUsername($username)
        {
            return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
        }

//
    }
}
