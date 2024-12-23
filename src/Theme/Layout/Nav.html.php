<?php

use Core\Services\Storage\ContextService;

$Context = ContextService::getContext();

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Negocio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <?php if ($Context->get('Sesssion:is_login')): ?>
        <li class="nav-item">
          <a class="nav-link" href="/Products">Products</a>
        </li>
        <?php endif; ?>
        <?php if (!$Context->get('Sesssion:is_login')): ?>
          <li class="nav-item">
            <a class="nav-link" href="/Login">Login</a>
          </li>
        <?php endif; ?>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php if ($Context->get('Sesssion:is_login')): ?>
          <li class="nav-item btn btn-danger p-1 mx-2">
            <a class="nav-link" href="/logout">LogOut</a>
          </li>
          <?php endif; ?>
        </ul>
      </form>
    </div>
  </div>
</nav>