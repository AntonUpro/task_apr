<?php

namespace app\models\game;

/**
 * This is the ActiveQuery class for [[Studio]].
 *
 * @see Studio
 */
class StudioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Studio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Studio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
