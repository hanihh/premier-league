<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "player_status".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_ar
 *
 * @property Squad[] $squads
 */
class PlayerStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'player_status';
    }

    public function extraFields()
    {
        return [
            'squads'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_en', 'name_ar'], 'required'],
            [['name_en', 'name_ar'], 'string', 'max' => 15]
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
    public function getSquads()
    {
        return $this->hasMany(Squad::className(), ['status_id' => 'id']);
    }
}
