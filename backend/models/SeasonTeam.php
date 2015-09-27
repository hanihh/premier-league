<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "season_team".
 *
 * @property integer $id
 * @property integer $season_id
 * @property integer $team_id
 * @property integer $total_point
 * @property integer $total_scored
 * @property integer $total_against
 * @property integer $game_played
 *
 * @property Season $season
 * @property Team $team
 */
class SeasonTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'season_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['season_id', 'team_id'], 'required'],
            [['season_id', 'team_id', 'total_point', 'total_scored', 'total_against', 'game_played'], 'integer'],
            [['season_id', 'team_id'], 'unique', 'targetAttribute' => ['season_id', 'team_id'], 'message' => 'The combination of Season ID and Team ID has already been taken.']
        ];
    }
	
	public function extraFields()
    {
        return [
            'season',
            'team'
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'season_id' => 'Season ID',
            'team_id' => 'Team ID',
            'total_point' => 'Total Point',
            'total_scored' => 'Total Scored',
            'total_against' => 'Total Against',
            'game_played' => 'Game Played',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeason()
    {
        return $this->hasOne(Season::className(), ['id' => 'season_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }
}
