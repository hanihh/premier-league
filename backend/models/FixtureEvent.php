<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fixture_event".
 *
 * @property integer $id
 * @property integer $event_id
 * @property integer $event_time
 * @property integer $fixture_player_id
 *
 * @property EventType $event
 * @property FixturePlayer $fixturePlayer
 */
class FixtureEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fixture_event';
    }

    public function extraFields()
    {
        return [
            'event',
            'fixturePlayer'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'event_time', 'fixture_player_id'], 'required'],
            [['event_id', 'event_time', 'fixture_player_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'event_id' => Yii::t('app', 'Event ID'),
            'event_time' => Yii::t('app', 'Event Time'),
            'fixture_player_id' => Yii::t('app', 'Fixture Player ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(EventType::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixturePlayer()
    {
        return $this->hasOne(FixturePlayer::className(), ['id' => 'fixture_player_id']);
    }
}
