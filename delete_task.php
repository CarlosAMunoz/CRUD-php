<?php

include("db.php");

//Comprobamos si existe un id que estemos enviando para eliminar. 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //hacemos la consulta a mysql
    $query = "DELETE FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);

    //Si no existe mostramos mensaje de error. 
    if(!$result){
        die ("Query Failed");
    }

    $_SESSION['message'] = 'Task Removed Successflly';
    $_SESSION['message_type'] = 'danger';
    //Si existe y finaliza la consulta de eliminación, redirenccionamos a index y mostramos mensaje de éxito.  

    header("Location:index.php");
}


?>