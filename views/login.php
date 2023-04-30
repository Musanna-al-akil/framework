<br>
<h1>Login</h1>
<br>
<?php $form = \App\Core\Form\Form::begin('',"post") ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \App\Core\Form\Form::end() ?>