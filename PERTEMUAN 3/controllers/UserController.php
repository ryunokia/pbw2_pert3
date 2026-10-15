<?php
require_once 'config/database.php';
require_once 'models/user.php';

/**
 * 
 */
class UserController
{
    private $model;

    function __construct()
    {
        //code...
        $db = (new database())->connect();
        $this->model = new user($db);
    }

    public function index()
    {
        //code ...
        $keyword = isset($_GET['search']) ? trim($_GET['search']) : null;
        $result = $this->model->getAll($keyword);
        include 'views/index.php';
    }

    public function create()
    {
        //code...
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->model->insert(
                $_POST['nama'],
                $_POST['alamat'],
                $_POST['tempat_tanggal_lahir'],
                $_POST['jenis_kelamin'],
                $_POST['agama']
            );
            header("location: index.php");
            exit;
        }else{
            include 'views/create.php';
        }
    }

    public function edit()
    {
        //code...
        $id = $_GET['id'] ?? null;
        if(!$id){
            header("location: index.php");
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->model->update(
                $id,
                $_POST['nama'],
                $_POST['alamat'],
                $_POST['tempat_tanggal_lahir'],
                $_POST['jenis_kelamin'],
                $_POST['agama']
            );
            header("location: index.php");
            exit;
        }else{
            $user = $this->model->getById($id);
            include 'views/edit.php';
        }
    }

    public function delete()
    {
        //code...
        $id = $_GET['id'] ?? null;
        if($id){
            $this->model->delete($id);
        }
        header("location: index.php");
        exit;
    }
}