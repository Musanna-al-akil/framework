<?php 
  use Musanna\MvcCore\Form\TextField;
  /** @var \Musanna\MvcCore\View $this*/ 
  $this->title = 'Contact page'; 
?>
<br>
  <h1>contact page</h1>
<br>
<?php $form = \Musanna\MvcCore\Form\Form::begin('',"post") ?>
    <?= $form->field($model, 'subject') ?>
    <?= $form->field($model, 'email') ?>
    <?= new TextField($model, 'body') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \Musanna\MvcCore\Form\Form::end() ?>