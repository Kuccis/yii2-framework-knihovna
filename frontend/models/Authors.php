<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $jmeno
 * @property string $prijmeni
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
            [['jmeno', 'prijmeni'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Autor',
            'jmeno' => 'Jméno',
            'prijmeni' => 'Příjmení',
        ];
    }

    public function getFullName()
    {
        return $this->jmeno." ".$this->prijmeni;
    }
}
