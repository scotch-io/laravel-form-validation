<?php
// MySQL
$mysqli = new mysqli('localhost', 'root', 'password');

$mysql_running = true;
if (mysqli_connect_errno()) {
    $mysql_running = false;
} else {
	$mysql_version = $mysqli->server_version;
}

$mysqli->close();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Vagrant Starter</title>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
	<style type="text/css">
		body 				{ }
		.container-fluid 	{ padding-left:20%; padding-right:20%; }
		.page-header i 		{ color:#cc3333; }
		.page-header h1 	{ padding-top:10px; }
    </style>
</head>
<body>
<div class="container-fluid">
	<div class="page-header">
		<i class="icon-magic icon-4x pull-left"></i>
		<h1>Success!</h1>
	</div>
	<p class="lead">Virtual Machine is up and running.</p>

	<h3>Installed Software</h3>
	<table class="table table-striped">
		<tr>
			<td>PHP Version</td>
			<td><?php echo phpversion(); ?></td>
		</tr>

		<tr>
			<td>MySQL running</td>
			<td><i class="icon-<?php echo ($mysql_running ? 'ok' : 'remove'); ?>"></i></td>
		</tr>

		<tr>
			<td>MySQL version</td>
			<td><?php echo ($mysql_running ? $mysql_version : 'N/A'); ?></td>
		</tr>
	</table>

	<h3>SSH Settings</h3>
	<table class="table table-striped">
		<tr>
			<td>Host</td>
			<td>172.90.90.90</td>
		</tr>
		<tr>
			<td>Username</td>
			<td>vagrant</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>vagrant</td>
		</tr>		
	</table>

	<h3>PHP Modules</h3>
	<table class="table table-striped">
		<tr>
			<td>MySQL</td>
			<td><i class="icon-<?php echo (class_exists('mysqli') ? 'ok' : 'remove'); ?>"></i></td>
		</tr>

		<tr>
			<td>CURL</td>
			<td><i class="icon-<?php echo (function_exists('curl_init') ? 'ok' : 'remove'); ?>"></i></td>
		</tr>

		<tr>
			<td>mcrypt</td>
			<td><i class="icon-<?php echo (function_exists('mcrypt_encrypt') ? 'ok' : 'remove'); ?>"></i></td>
		</tr>

	</table>

	<h3>MySQL credentials</h3>
	<table class="table table-striped">
		<tr>
			<td>Hostname</td>
			<td>localhost</td>
		</tr>

		<tr>
			<td>Username</td>
			<td>root</td>
		</tr>

		<tr>
			<td>Password</td>
			<td>password</td>
		</tr>

		<tr>
			<td colspan="2"><em>Note: External access is enabled! Just use <strong><?php echo $_SERVER['SERVER_ADDR'] ?></strong> as host.</em></td>
		</tr>
	</table>
</div>
</body>
</html>
