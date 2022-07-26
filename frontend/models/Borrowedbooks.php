<?php

namespace frontend\models;

use common\models\User;
use frontend\models\Storedbooks;
use Yii;

/**
 * This is the model class for table "borrowedbooks".
 *
 * @property int $id
 * @property int $idbook
 * @property int $iduser
 * @property string $fromdate
 * @property string $untildate
 *
 * @property Storedbooks $idbook0
 * @property Authors $iduser0
 */
class Borrowedbooks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borrowedbooks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idbook', 'iduser', 'fromdate', 'untildate'], 'required'],
            [['idbook', 'iduser'], 'integer'],
            [['fromdate', 'untildate'], 'safe'],
            [['idbook'], 'exist', 'skipOnError' => true, 'targetClass' => Storedbooks::className(), 'targetAttribute' => ['idbook' => 'id']],
            [['iduser'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['iduser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idbook' => 'Kniha',
            'iduser' => 'Půjčeno uživatelem',
            'fromdate' => 'Půjčeno dne',
            'untildate' => 'Vrátit dne',
        ];
    }

    /**
     * Gets query for [[Idbook0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdbook0()
    {
        return $this->hasOne(Storedbooks::className(), ['id' => 'idbook']);
    }

    /**
     * Gets query for [[Iduser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(Authors::className(), ['id' => 'iduser']);
    }
    public function getUserLabel()
    {
        $user = User::find()
            ->where(['id' => $this->iduser])
            ->one();

        return $user->username;
    }
    public function getBookLabel()
    {
        $book = Storedbooks::find()
            ->where(['id' => $this->idbook])
            ->one();

        return $book->name;
    }
}
