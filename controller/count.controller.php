<?php  
require_once 'model/count.model.php';

$countModel = new CountModel();

$count = $countModel->getCount();

$stats = $countModel->getStats();

require_once 'views/count.view.php';
?>