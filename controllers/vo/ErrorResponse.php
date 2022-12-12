<?php
declare(strict_types=1);


namespace app\controllers\vo;

class ErrorResponse implements \JsonSerializable
{
    public function __construct(
        private bool $success,
        private string $errorMsg
    )
    {
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @return string
     */
    public function getErrorMsg(): string
    {
        return $this->errorMsg;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}