<?php
declare(strict_types=1);


namespace app\controllers\vo;

class GamesByGenre implements \JsonSerializable
{

   public function __construct(
       private string $genre,
       private Games $games,
   )
   {
   }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @return Games
     */
    public function getGames(): Games
    {
        return $this->games;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }


}