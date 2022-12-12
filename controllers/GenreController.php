<?php
declare(strict_types=1);


namespace app\controllers;

use app\models\game\Genre;

class GenreController extends BaseApiController
{
    public $modelClass = Genre::class;
}