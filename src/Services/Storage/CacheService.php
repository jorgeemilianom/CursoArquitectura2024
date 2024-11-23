<?php

declare(strict_types=1);

namespace Core\Services\Storage;


final class CacheService
{
    private string $cacheFile;

    public function __construct(string $filePath = 'cache.json')
    {
        $this->cacheFile = $filePath;

        // Verificar si el archivo existe, si no, crearlo vacío
        if (!file_exists($this->cacheFile)) {
            file_put_contents($this->cacheFile, json_encode([]));
        }
    }

    /**
     * Guardar un valor en el cache.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, mixed $value): void
    {
        $data = $this->readCache();
        $data[$key] = $value;
        $this->writeCache($data);
    }

    /**
     * Obtener un valor del cache.
     *
     * @param string $key
     * @return mixed|null
     */
    public function get(string $key): mixed
    {
        $data = $this->readCache();
        return $data[$key] ?? null; // Retorna null si no existe
    }

    /**
     * Leer los datos del archivo de cache.
     *
     * @return array
     */
    private function readCache(): array
    {
        $content = file_get_contents($this->cacheFile);
        return json_decode($content, true) ?? [];
    }

    /**
     * Escribir datos en el archivo de cache.
     *
     * @param array $data
     * @return void
     */
    private function writeCache(array $data): void
    {
        file_put_contents($this->cacheFile, json_encode($data, JSON_PRETTY_PRINT));
    }
}
