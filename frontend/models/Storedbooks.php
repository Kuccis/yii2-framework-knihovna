<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "storedbooks".
 *
 * @property int $id
 * @property string $name
 * @property string $genre
 * @property int $borrowedcount
 * @property string $img
 * @property int $authorid
 *
 * @property Authors $author
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
            [['borrowedcount', 'authorid'], 'integer'],
            [['name', 'genre', 'img'], 'string', 'max' => 255],
            [['authorid'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['authorid' => 'id']],
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
            'borrowedcount' => 'Půjčeno',
            'authorid' => 'Autor',
            'img' => 'Nahrajte náhledovou fotografii',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'authorid']);
    }
    public function getAuthorLabel()
    {
        $author = Authors::find()
            ->where(['id' => $this->authorid])
            ->one();

        return $author->jmeno." ".$author->prijmeni;
    }
}
