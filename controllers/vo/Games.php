<?php
declare(strict_types=1);


namespace app\controllers\vo;

class Games implements \JsonSerializable
{
    private array $games;

    public function __construct(string ...$games)
    {
        $this->games = $games;
    }

    /**
     * @return array
     */
    public function getGames(): array
    {
        return $this->games;
    }

    public function jsonSerialize(): mixed
    {
        return $this->getGames();
    }


}