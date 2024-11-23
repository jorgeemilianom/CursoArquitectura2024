<?php

use Core\Services\Storage\ContextService;

$Context = ContextService::getContext();
// Sesssion:is_login
?>

<?php if (!$Context->get('Sesssion:is_login')): ?>
<div class="row">
    <div class="col">
        <form class="mt-4" method="POST">
            <div class="mb-3">
                <label for="user_e" class="form-label"> <?= $Context->get('Home:Title:message_email'); ?> </label>
                <input type="email" name="user" class="form-control" id="user_e">
            </div>
            <div class="mb-3">
                <label for="pass_e" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="pass_e">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col">
    </div>
</div>
<?php else: ?>
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        Bienvenido! Ya estás logueado
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>