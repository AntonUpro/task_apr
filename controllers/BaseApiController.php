<?php
declare(strict_types=1);


namespace app\controllers;

use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\rest\Serializer;
use yii\web\Response;

class BaseApiController extends ActiveController
{
    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope' => 'data'
    ];

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                    'application/xml' => Response::FORMAT_XML,
                ],
            ],
        ];
    }
}