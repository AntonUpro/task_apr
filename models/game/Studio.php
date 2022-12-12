<?php

namespace app\models\game;

use Yii;

/**
 * This is the model class for table "studio".
 *
 * @property int $id
 * @property string $studio
 *
 * @property Game[] $games
 */
class Studio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'studio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['studio'], 'required'],
            [['studio'], 'string', 'max' => 255],
            [['studio'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'studio' => 'Studio',
        ];
    }

    /**
     * Gets query for [[Games]].
     *
     * @return \yii\db\ActiveQuery|GameQuery
     */
    public function getGames()
    {
        return $this->hasMany(Game::class, ['id_studio' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return StudioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudioQuery(get_called_class());
    }
}
