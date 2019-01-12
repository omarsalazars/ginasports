<?php  
$style = 'Default';
$user = '';

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
}

if(isset($_COOKIE[$user.'view'])){
	$style = $_COOKIE[$user.'view'];
}

?>
<?php if($style == 'Oscuro'): ?>
    <link rel="stylesheet" href="css/styleDark.css">
<?php elseif($style == 'Default'): ?>
    <link rel="stylesheet" href="css/style.css">
<?php elseif($style == 'Blanco'): ?>
    <link rel="stylesheet" href="css/styleWhite.css">
<?php elseif($style == 'Invertido'): ?>
    <link rel="stylesheet" href="css/styleInvert.css">
<?php endif; ?>