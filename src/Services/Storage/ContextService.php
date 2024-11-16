<?php
declare(strict_types = 1);

namespace Core\Services\Storage;

final class ContextService
{
    private $data = [];

    public static function getContext(): self
    {
        global $Context;
        return $Context;
    }

    public function set(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }

    public function get(string $key, mixed $default = 0): mixed
    {
        return $this->data[$key]?? $default;
    }
}