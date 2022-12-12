<?php
declare(strict_types=1);


namespace app\controllers;

use app\models\game\Studio;

class StudioController extends BaseApiController
{
    public $modelClass = Studio::class;

}