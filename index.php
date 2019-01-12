<?php session_start();
require_once 'model/count.model.php';

if(!isset($_SESSION['count'])){
    $model = new CountModel();
    $model->increaseCount();
    $_SESSION['count'] = 'x';
}
require_once 'views/index.view.php';
