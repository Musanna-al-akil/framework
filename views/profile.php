<?php 
/** @var \Musanna\MvcCore\View $this*/  
$this->title = 'Profile'; 
?>
<h1>Profile page</h1>

<form action="" method="post">
    <div class="mb-3">
        <la bel class="form-label">Subject</label>
        <input type="text" class="form-control" name="subject">
    </div>
    <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
        <label class="form-label">body</label>
        <input type="text" class="form-control" name="body">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>