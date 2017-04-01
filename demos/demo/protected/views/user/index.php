<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'User',
);
?>
<h1>User file</h1>
<?php
foreach ($users as $user) {
	echo $user->username;
}
?>