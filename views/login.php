<?php 
/** @var \Musanna\MvcCore\View $this*/ 
$this->title = 'Login'; 
?>
<br>
<h1>Login</h1>
<br>
<?php $form = \Musanna\MvcCore\Form\Form::begin('',"post") ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \Musanna\MvcCore\Form\Form::end() ?>