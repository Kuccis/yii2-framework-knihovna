<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "storedbooks".
 *
 * @property int $id
 * @property string $name
 * @property string $genre
 * @property boolean $borrowed
 * @property int $authorid
 */
class Storedbooks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'storedbooks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'genre', 'authorid'], 'required'],
            [['authorid'], 'integer'],
            [['borrowed'], 'boolean'],
            [['name', 'genre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Název',
            'genre' => 'Žánr',
            'borrowed' => 'Stav půjčení',
            'authorid' => 'Autor',
        ];
    }
    public function getBorrowedLabel()
    {
        return $this->borrowed ? 'Vypůjčené' : 'Volné';
    }
    public function getAuthorLabel()
    {
        $author = Authors::find()
            ->where(['id' => $this->authorid])
            ->one();

        return $author->jmeno." ".$author->prijmeni;
    }
}
