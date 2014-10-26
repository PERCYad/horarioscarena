<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <title><?php print $view->tabla ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- incluyo la libreria jQuery -->
    <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
    <!-- incluyo el archivo que tiene mis funciones javascript -->
    <script type="text/javascript" src="resources/functions.js"></script>
    <!-- incluyo el framework css , blueprint. -->
    <link rel="stylesheet" type="text/css" href="resources/screen.css" />
    <!-- incluyo mis estilos css -->
    <link rel="stylesheet" type="text/css" href="resources/style.css" />
</head>

<body>
    <div id ="block"></div>
    <div class="container">
        <h1 class="title">Altas bajas y modificaciones a <?php print $view->tabla ?></h1>
        <div id="popupbox"></div>
        <div id="content">
			<?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
        </div>

		<table>
		<thead>
		<tr>
		<th align="center"><a id="new" class="button" href="javascript:void(0);"><?php echo $view->label ?></a></th>
		<th align="right"><a id="salir" class="button" href="javascript:void(0);">Salir</a></th>
		</tr>
		</thead>
		</table>

    </div>
</body>

</html>