<?php


session_start();


/* Hacemos uso de una biblioteca de sql llamada mysqli con su función connect 
y lo guardamos dentro de una variable para poderlo re-utilzar*/

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql_crud'
);


//     #Se comprueba si la DB sí está conectada. 
// if(isset($conn)){
//     echo "DB's connected";
// }



?>