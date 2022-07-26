<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $jmeno
 * @property string $prijmeni
 * @property string $img
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jmeno', 'prijmeni'], 'required'],
            [['jmeno', 'prijmeni', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jmeno' => 'Jmeno',
            'prijmeni' => 'Prijmeni',
            'img' => 'Img',
        ];
    }
}
