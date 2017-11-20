<?php $this->layout('view::layout.html.php'); ?>

<?php
$this->start('assets');
echo $this->assets(['view::Home/style.css'], ['inline' => false]);
$this->stop('assets');
?>
	<h1>Hello <?= $username ?></h1>
<?php foreach ($this->v('userData') as $user): ?>
	<hr>
	<p>Username: <?= $this->e($user['username']); ?></p>
	<p>Firstname: <?= $this->e($user['first_name']); ?></p>
	<p>Lastname: <?= $this->e($user['last_name']); ?></p>
<?php endforeach; ?>