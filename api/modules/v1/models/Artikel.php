<?php

namespace api\modules\v1\models {

    use \yii\db\ActiveRecord;
    /**
     * Country Model
     *
     * @author Budi Irawan <deerawan@gmail.com>
     */
    class Artikel extends ActiveRecord
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
        public static function primaryKey()
        {
            return ['id_artikel'];
        }

        /**
         * Define rules for validation
         */
        public function rules()
        {
            return [
                [['judul', 'deskripsi', 'image','abstrak'], 'required']
            ];
        }

//
    }
}
