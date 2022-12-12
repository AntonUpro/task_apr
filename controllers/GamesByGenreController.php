<?php
declare(strict_types=1);


namespace app\controllers;

use app\controllers\handlers\IndexHandler;
use app\controllers\vo\ErrorResponse;
use yii\rest\Controller;

class GamesByGenreController extends Controller
{

    public function __construct($id, $module, private IndexHandler $handler, $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex($genreRequest)
    {
        try {
            $response = $this->handler->handle($genreRequest);
            return $this->asJson($response);
        } catch (\Exception|\Error $error) {
            return $this->asJson(new ErrorResponse(false, $error->getMessage()));
        }
    }
}