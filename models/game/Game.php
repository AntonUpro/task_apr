<?php

namespace app\models\game;



/**
 * This is the model class for table "game".
 *
 * @property int $id
 * @property int $id_studio
 * @property string $name
 *
 * @property GameGenre[] $gameGenres
 * @property Studio $studio
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_studio', 'name'], 'required'],
            [['id_studio'], 'default', 'value' => null],
            [['id_studio'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_studio'], 'exist', 'skipOnError' => true, 'targetClass' => Studio::class, 'targetAttribute' => ['id_studio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_studio' => 'Id Studio',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[GameGenres]].
     *
     * @return \yii\db\ActiveQuery|GameGenreQuery
     */
    public function getGameGenres()
    {
        return $this->hasMany(GameGenre::class, ['id_game' => 'id']);
    }

    /**
     * Gets query for [[Studio]].
     *
     * @return \yii\db\ActiveQuery|StudioQuery
     */
    public function getStudio()
    {
        return $this->hasOne(Studio::class, ['id' => 'id_studio']);
    }

    /**
     * {@inheritdoc}
     * @return GameQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GameQuery(get_called_class());
    }
}
