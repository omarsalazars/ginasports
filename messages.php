<?php
if(isset($_GET['user'])) {
    $user = $_GET['user'];
}

if(isset($_GET['messageInfo'])){
    $messageInfo = json_decode($_GET['messageInfo'], true); 
}

require_once('api/messages.api.php');

?>