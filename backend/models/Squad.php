<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "squad".
 *
 * @property integer $id
 * @property integer $player_id
 * @property integer $team_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $status_id
 * @property integer $number_in_squad
 *
 * @property Player $player
 * @property Team $team
 * @property PlayerStatus $status
 */
class Squad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'squad';
    }

    public function extraFields()
    {
        return [
            'player',
            'team',
            'status'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['player_id', 'team_id', 'status_id', 'number_in_squad'], 'required'],
            [['player_id', 'team_id', 'status_id', 'number_in_squad'], 'integer'],
            [['start_date', 'end_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'player_id' => Yii::t('app', 'Player ID'),
            'team_id' => Yii::t('app', 'Team ID'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'status_id' => Yii::t('app', 'Status ID'),
            'number_in_squad' => Yii::t('app', 'Number In Squad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayer()
    {
        return $this->hasOne(Player::className(), ['id' => 'player_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(PlayerStatus::className(), ['id' => 'status_id']);
    }
}
