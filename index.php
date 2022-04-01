
<?php include("db.php")
/* En cuanto inicie la aplicación requiero tener lista mi conexión con la DB, por lo que usamos en include.*/ ?>

<?php include("includes/header.php")  ?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <!-- Comprobamos con php si la variable SESSION tiene asignado un mensaje. 
        En ese caso, imprimimos el mensaje en pantalla. -->
        <?php  if(isset($_SESSION['message'])){ ?>

           
        <div class="alert alert-<?= $_SESSION['message_type'];?>  alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']  ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <?php session_unset(); }?>

            <div class="card card-body">
                <!-- Le decimos dónde y con qué método enviará la información de nuestro formulario -->
                <form action="save_task.php" method="POST"> 
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" placeholder="Task Description" class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                </form>
            </div>
        </div>


        <!--Creamos la tabla donde vamos a imprimir nuestros datos.  -->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> Title </th>
                        <th> Description </th>
                        <th> Created At </th>
                        <th> Action </th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    //Utilizamos una consulta de PHP para traer los datos de la base de datos. 
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn, $query);
                    //Usamos un buble para recorrer los datos.  
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr> 
                                <td><?php echo $row['title'] ?> </td>
                                <td><?php echo $row['description'] ?> </td>
                                <td><?php echo $row['created_at'] ?> </td>
                                <td>
                                    <a href="update_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"> </i>
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                     <?php   } ?>
                </tbody>   
            </table>
        </div>
    </div>
</div>


<?php include("includes/footer.php")  ?>


