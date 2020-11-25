<?php
require '../../classes/controller.class.php';

session_start();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    Controller::query('DELETE FROM members WHERE id=:id', array('id'=>$id));

    $_SESSION['message'] = 'Record has been deleted';
    $_SESSION['msg_type'] = 'danger';

    header('Location: ../views/members.php');
}