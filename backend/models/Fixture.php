<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fixture".
 *
 * @property integer $id
 * @property integer $home_id
 * @property integer $away_id
 * @property string $time
 * @property integer $home_goals
 * @property integer $away_goals
 *
 * @property Team $home
 * @property Team $away
 * @property FixturePlayer[] $fixturePlayers
 */
class Fixture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fixture';
    }

    public function extraFields()
    {
        return [
            'home',
            'away',
            'fixturePlayers'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['home_id', 'away_id'], 'required'],
            [['home_id', 'away_id', 'home_goals', 'away_goals'], 'integer'],
            [['time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'home_id' => Yii::t('app', 'Home ID'),
            'away_id' => Yii::t('app', 'Away ID'),
            'time' => Yii::t('app', 'Time'),
            'home_goals' => Yii::t('app', 'Home Goals'),
            'away_goals' => Yii::t('app', 'Away Goals'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHome()
    {
        return $this->hasOne(Team::className(), ['id' => 'home_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAway()
    {
        return $this->hasOne(Team::className(), ['id' => 'away_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixturePlayers()
    {
        return $this->hasMany(FixturePlayer::className(), ['fixture_id' => 'id']);
    }
}
