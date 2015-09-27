<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ar
 * @property integer $numeric_code
 * @property string $alpha2_code
 * @property string $alpha3_code
 *
 * @property Player[] $players
 * @property Team[] $teams
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    public function extraFields()
    {
        return [
            'players',
            'teams'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_en', 'name_ar', 'numeric_code', 'alpha2_code', 'alpha3_code'], 'required'],
            [['numeric_code'], 'integer'],
            [['name_en', 'name_ar'], 'string', 'max' => 50],
            [['alpha2_code'], 'string', 'max' => 2],
            [['alpha3_code'], 'string', 'max' => 3],
            [['name_en'], 'unique'],
            [['name_ar'], 'unique']
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
            'numeric_code' => Yii::t('app', 'Numeric Code'),
            'alpha2_code' => Yii::t('app', 'Alpha2 Code'),
            'alpha3_code' => Yii::t('app', 'Alpha3 Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::className(), ['country_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeams()
    {
        return $this->hasMany(Team::className(), ['country_id' => 'id']);
    }
}
