<?php

namespace app\models\game;

/**
 * This is the ActiveQuery class for [[GameGenre]].
 *
 * @see GameGenre
 */
class GameGenreQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return GameGenre[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return GameGenre|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
