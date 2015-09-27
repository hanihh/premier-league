<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "season".
 *
 * @property integer $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 *
 * @property SeasonTeam[] $seasonTeams
 */
class Season extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'season';
    }

    public function extraFields()
    {
        return [
            'seasonTeams'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'start_date', 'end_date'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeasonTeams()
    {
        return $this->hasMany(SeasonTeam::className(), ['season_id' => 'id']);
    }
}
