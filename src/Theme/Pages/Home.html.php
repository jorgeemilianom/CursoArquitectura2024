<?php

use Core\Services\Storage\ContextService;

$Context = ContextService::getContext();

?>


<h1><?= $Context->get('Home:Title:h1'); ?></h1>
<h2><?= $Context->get('Home:Title:h2'); ?></h2>
