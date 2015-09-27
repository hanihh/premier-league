<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stadium".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ar
 *
 * @property Team[] $teams
 */
class Stadium extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stadium';
    }

    public function extraFields()
    {
        return [
            'teams'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name_en', 'name_ar'], 'string', 'max' => 20]
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
    public function getTeams()
    {
        return $this->hasMany(Team::className(), ['stadium_id' => 'id']);
    }
}
