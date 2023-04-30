<?php
/** @var $model \App\Model\User */ ?>

<br>
<h1>Create an Acount</h1>
<br>
<?php $form = \App\Core\Form\Form::begin('',"post") ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'firstname') ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'lastname') ?>
        </div>
    </div>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <?= $form->field($model, 'confirmPassword')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \App\Core\Form\Form::end() ?>
<!--
<form action="/register" method="post">
    <div class="mb-3">
        <label class="form-label">Firstname</label>
        <input type="text" class="form-control" name="firstname">
    </div>
    <div class="mb-3">
        <label class="form-label">Lastname</label>
        <input type="text" class="form-control" name="lastname">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control"name="email">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="confirmPassword">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
*/-->