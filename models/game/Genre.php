<?php

namespace app\models\game;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $genre
 *
 * @property GameGenre[] $gameGenres
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre'], 'required'],
            [['genre'], 'string', 'max' => 255],
            [['genre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genre' => 'Genre',
        ];
    }

    /**
     * Gets query for [[GameGenres]].
     *
     * @return \yii\db\ActiveQuery|GameGenreQuery
     */
    public function getGameGenres()
    {
        return $this->hasMany(GameGenre::class, ['id_genre' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return GenreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GenreQuery(get_called_class());
    }
}
