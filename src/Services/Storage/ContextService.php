<?php
declare(strict_types=1);

namespace Core\Services\Storage;

final class ContextService
{
    private $Data = [];

    public static function getContext(): self
    {
        global $Context;
        return $Context;
    }

    public function getData(string $key): mixed
    {
        if(isset($this->Data[$key])) return $this->Data[$key];

        return false;
    }

    public function setData(string $key, mixed $value): void
    {
        $this->Data[$key] = $value;
    } 
}