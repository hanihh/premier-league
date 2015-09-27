<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "player".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ar
 * @property integer $country_id
 * @property integer $position_id
 *
 * @property FixturePlayer[] $fixturePlayers
 * @property Country $country
 * @property Position $position
 * @property Squad[] $squads
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'player';
    }

    public function extraFields()
    {
        return [
            'country',
            'position',
            'squads'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_en', 'name_ar'], 'required'],
            [['country_id', 'position_id'], 'integer'],
            [['name_en', 'name_ar'], 'string', 'max' => 100]
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
            'country_id' => Yii::t('app', 'Country ID'),
            'position_id' => Yii::t('app', 'Position ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixturePlayers()
    {
        return $this->hasMany(FixturePlayer::className(), ['player_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSquads()
    {
        return $this->hasMany(Squad::className(), ['player_id' => 'id']);
    }
}
