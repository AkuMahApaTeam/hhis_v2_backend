<?php

namespace api\modules\v1\models {

    use \yii\db\ActiveRecord;
    /**
     * Country Model
     *
     * @author Budi Irawan <deerawan@gmail.com>
     */
    class ArtikelDokter extends ActiveRecord
    {
        /**
         * @inheritdoc
         */
        public static function tableName()
        {
            return 'artikel_dokter';
        }

        /**
         * @inheritdoc
         */
        public static function primaryKey()
        {
            return ['id_artikel_dokter'];
        }

        /**
         * Define rules for validation
         */
        public function rules()
        {
            return [
                [['id_dokter', 'id_artikel'], 'required']
            ];
        }

//
    }
}
