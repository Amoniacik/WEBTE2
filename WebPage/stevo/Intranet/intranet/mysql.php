<?php

require_once('config.php');
$id_user = $_POST['id_user'];
$id_nepritomnost =$_POST['id_nepritomnost'];
$id_date =$_POST['id_date'];

    $conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DBNAME);

    if ($conn->connect_error)
        die("Napicu error: " . $conn->connect_error);

    $sql = "DELETE FROM dochadzka WHERE datum = '".$id_date."' AND id_pracovnik = ".$id_user;
    $conn->query($sql);

    if ($id_nepritomnost > 0)
    {
        $sql = "INSERT INTO dochadzka (id_pracovnik, id_nepritomnost, datum) VALUES (".$id_user.",".$id_nepritomnost.",'".$id_date."')";
        $conn->query($sql);
    }

    $conn->close();
?>