<?php

use Core\Services\Storage\CacheService;
use Core\Services\Storage\ContextService;
use Core\Services\Storage\MySQLPDOService;
use Core\Services\Storage\MySQLService;

$Context = ContextService::getContext();

$db1 = new MySQLService();
$db = new MySQLPDOService();


// var_dump($db1->query("SELECT * FROM `users`")[0]['full_name']);
// echo '<hr>';
// var_dump($db->query("SELECT * FROM `users`")[0]['full_name']);

# Ejemplo de uso
$cache = new CacheService('mi_cache.json');

// Guardar datos
$cache->set('usuario', ['nombre' => 'Jorge', 'edad' => 30]);
$cache->set('token', 'abc123');

// Obtener datos
echo "Usuario: ";
print_r($cache->get('usuario')); // Devuelve el array del usuario

echo "Token: ";
echo $cache->get('token'); // Devuelve 'abc123'
?>


<h1><?= $Context->get('Home:Title:h1'); ?></h1>
<h2><?= $Context->get('Home:Title:h2'); ?></h2>
