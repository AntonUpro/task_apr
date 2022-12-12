<?php

namespace app\controllers;

use app\models\game\Game;

/**
 * GameController implements the CRUD actions for Game model.
 */
class GameController extends BaseApiController
{
    public $modelClass = Game::class;
}
