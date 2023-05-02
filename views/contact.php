<?php 
  use App\Core\Form\TextField;
  /** @var \App\Core\View $this*/ 
  $this->title = 'Contact page'; 
?>
<br>
  <h1>contact page</h1>
<br>
<?php $form = \App\Core\Form\Form::begin('',"post") ?>
    <?= $form->field($model, 'subject') ?>
    <?= $form->field($model, 'email') ?>
    <?= new TextField($model, 'body') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \App\Core\Form\Form::end() ?>