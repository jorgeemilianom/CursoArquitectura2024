<?php

use Core\Services\Storage\ContextService;


$Context = ContextService::getContext();


?>

<h1><?= $Context->getData('Title'); ?></h1>