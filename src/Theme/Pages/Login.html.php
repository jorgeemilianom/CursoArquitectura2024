<?php

use Core\Services\Storage\ContextService;

$Context = ContextService::getContext();

?>



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
