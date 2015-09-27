<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ar
 *
 * @property Player[] $players
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
    }

    public function extraFields()
    {
        return [
            'players',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_en', 'name_ar'], 'required'],
            [['name_en', 'name_ar'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_en' => Yii::t('app', 'Name En'),
            'name_ar' => Yii::t('app', 'Name Ar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::className(), ['position_id' => 'id']);
    }
}
