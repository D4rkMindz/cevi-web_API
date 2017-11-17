<?php $this->layout('view::layout.html.php'); ?>
<h1>Hello World</h1>
<?php foreach ($this->v('userData') as $user):?>
    <hr>
    <p>Username: <?= $this->e($user['username']);?></p>
    <p>Firstname: <?= $this->e($user['first_name']);?></p>
    <p>Lastname: <?= $this->e($user['last_name']);?></p>
<?php endforeach;?>