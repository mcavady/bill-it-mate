<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in index.php?></title>
	<meta name="description" content="The aim is to build 'the one stop shop' for project managment and invoicing, bug reporting and ticket system. This is to be called bill it mate.">
	<meta name="keywords" content="project, management, invoicing, tickets, bill, it, mate, calendar, james, mcavady, uk, project, managment, bill-it-mate, bill it mate, billitmate">
	<meta name="robots" content="index, follow" >
	<meta name="author" content="james mcavady">
	<meta name="rating" content="general">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="<?php echo url::get_template_path();?>css/style.css" rel="stylesheet">
	<link href="<?php echo url::get_template_path();?>images/favicon.ico" rel="icon" type="image/x-icon" />
	<script type="text/javascript" src="<?php echo url::get_template_path();?>js/scripts.js" ></script>
</head>
<body>
