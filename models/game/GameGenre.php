<?php

namespace app\models\game;



/**
 * This is the model class for table "game_genre".
 *
 * @property int $id_game
 * @property int $id_genre
 *
 * @property Game $game
 * @property Genre $genre
 */
class GameGenre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'game_genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_game', 'id_genre'], 'required'],
            [['id_game', 'id_genre'], 'default', 'value' => null],
            [['id_game', 'id_genre'], 'integer'],
            [['id_game'], 'exist', 'skipOnError' => true, 'targetClass' => Game::class, 'targetAttribute' => ['id_game' => 'id']],
            [['id_genre'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::class, 'targetAttribute' => ['id_genre' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_game' => 'Id Game',
            'id_genre' => 'Id Genre',
        ];
    }

    /**
     * Gets query for [[Game]].
     *
     * @return \yii\db\ActiveQuery|GameQuery
     */
    public function getGame()
    {
        return $this->hasOne(Game::class, ['id' => 'id_game']);
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery|GenreQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::class, ['id' => 'id_genre']);
    }

    /**
     * {@inheritdoc}
     * @return GameGenreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GameGenreQuery(get_called_class());
    }
}
