<?php
declare(strict_types=1);


namespace app\controllers\handlers;

use app\controllers\vo\Games;
use app\controllers\vo\GamesByGenre;
use app\models\game\Genre;

class IndexHandler
{
    public function handle(string $genreRequest): GamesByGenre
    {

        $genre = Genre::find()->andWhere(['genre' => $genreRequest])->one();

        if (!$genre) {
            throw new \Exception("genre $genreRequest not found");
        }

        $gameGenre = $genre->gameGenres;

        if (!$gameGenre) {
            throw new \Exception("games with the genre $genreRequest not found");
        }

        $games = [];
        foreach ($gameGenre as $item) {
            $games[] = $item->game->name;
        }

        return new GamesByGenre(
            $genre->genre,
            new Games(...$games)
        );
    }
}