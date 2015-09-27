<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fixture_player".
 *
 * @property integer $id
 * @property integer $fixture_id
 * @property integer $player_id
 * @property integer $start_time
 * @property integer $end_time
 *
 * @property FixtureEvent[] $fixtureEvents
 * @property Fixture $fixture
 * @property Player $player
 */
class FixturePlayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fixture_player';
    }

    public function extraFields()
    {
        return [
            'fixtureEvents',
            'fixture',
            'player'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fixture_id', 'player_id', 'start_time'], 'required'],
            [['fixture_id', 'player_id', 'start_time', 'end_time'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fixture_id' => Yii::t('app', 'Fixture ID'),
            'player_id' => Yii::t('app', 'Player ID'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixtureEvents()
    {
        return $this->hasMany(FixtureEvent::className(), ['fixture_player_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixture()
    {
        return $this->hasOne(Fixture::className(), ['id' => 'fixture_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayer()
    {
        return $this->hasOne(Player::className(), ['id' => 'player_id']);
    }
}
