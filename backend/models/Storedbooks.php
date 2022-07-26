<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "storedbooks".
 *
 * @property int $id
 * @property string $name
 * @property string $genre
 * @property int $borrowed
 * @property string $img
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
            [['borrowed', 'authorid'], 'integer'],
            [['name', 'genre', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'genre' => 'Genre',
            'borrowed' => 'Borrowed',
            'img' => 'Img',
            'authorid' => 'Authorid',
        ];
    }
}
