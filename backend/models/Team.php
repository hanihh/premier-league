<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ar
 * @property integer $established_at
 * @property integer $country_id
 * @property integer $stadium_id
 *
 * @property Fixture[] $fixtures
 * @property Fixture[] $fixtures0
 * @property SeasonTeam[] $seasonTeams
 * @property Squad[] $squads
 * @property Country $country
 * @property Stadium $stadium
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    public function extraFields()
    {
        return [
            'country',
            'stadium',
            'squads'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_en', 'name_ar', 'established_at'], 'required'],
            [['established_at', 'country_id', 'stadium_id'], 'integer'],
            [['name_en', 'name_ar'], 'string', 'max' => 50]
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
            'established_at' => Yii::t('app', 'Established At'),
            'country_id' => Yii::t('app', 'Country ID'),
            'stadium_id' => Yii::t('app', 'Stadium ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixtures()
    {
        return $this->hasMany(Fixture::className(), ['home_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixtures0()
    {
        return $this->hasMany(Fixture::className(), ['away_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeasonTeams()
    {
        return $this->hasMany(SeasonTeam::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSquads()
    {
        return $this->hasMany(Squad::className(), ['team_id' => 'id']);
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
    public function getStadium()
    {
        return $this->hasOne(Stadium::className(), ['id' => 'stadium_id']);
    }
}
