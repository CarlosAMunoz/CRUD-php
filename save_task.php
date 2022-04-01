<?php


include("db.php"); //Incluyo el documento de la conexión a la base de datos. 
//Al hacer esto, me he traído la variable conn. 

//Validamos si a través del método POST existe 'save_task' lo que indicaría que están intentando guardar algún dato.  
if(isset($_POST['save_task'])){

    //Si esto se comple, guardamos los datos del formulario en una variable.  
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";

    $result = mysqli_query($conn, $query);

    if (!$result){
        die("Query Failed");
    }


    $_SESSION['message'] = 'Task Saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
    
}

?>