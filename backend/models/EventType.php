<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "event_type".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ar
 * @property integer $penalty
 *
 * @property FixtureEvent[] $fixtureEvents
 */
class EventType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_type';
    }

    public function extraFields()
    {
        return [
            'fixtureEvents'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_en', 'name_ar'], 'required'],
            [['penalty'], 'integer'],
            [['name_en', 'name_ar'], 'string', 'max' => 25]
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
            'penalty' => Yii::t('app', 'Penalty'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixtureEvents()
    {
        return $this->hasMany(FixtureEvent::className(), ['event_id' => 'id']);
    }
}
