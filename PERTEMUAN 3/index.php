<?php
require_once 'controllers/UserController.php';

$controllers = new UserController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'create':
        //code...
        $controllers->create();
        break;

    case 'edit':
        //code...
        $controllers->edit();
        break;

    case 'delete':
        //code...
        $controllers->delete();
        break;

    default:
        //code...
        $controllers->index();
        break;
}