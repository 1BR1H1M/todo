<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CRUD codeigniter</title>
  </head>
  <body>
    <div class="container">
        <h1>CRUD con Codeigniter 4</h1>
        <div class="row">
            <div class="col-sm-12"> <!-- Corregido: "lass" a "class" -->
                <form method="POST" action="<?php echo base_url().'/crear' ?>">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                    <label for="paterno">Primer apellido</label>
                    <input type="text" name="paterno" id="paterno" class="form-control">
                    <label for="materno">Segundo apellido</label>
                    <input type="text" name="materno" id="materno" class="form-control">
                    <br>
                    <button class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        <hr>
        <h2>Listado de personas</h2>
        <div class="row">
            <div class="col-sm-12">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php foreach($datos as $key): ?>
                            <tr>
                                <td><?php echo $key->nombre ?></td>
                                <td><?php echo $key->paterno ?></td>
                                <td><?php echo $key->materno ?></td>
                                <td>
                                    <a href="<?php echo base_url().'/obtenerNombre/'.$key->id_nombre ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/eliminar/'.$key->id_nombre ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        let mensaje= <?php echo $mensaje ?>;

        if (mensaje == '1') {
            swal(':D', 'Agregado con exito!', 'success');

        } else if (mensaje == '0'){
            swal(':c', 'No se pudo agregado con exito!', 'error');
        } else if (mensaje == '2'){
            swal(':D', 'Se actualizaron los datos con exito!', 'success');
        } else if (mensaje == '3'){
            swal(':c', 'No se pudieron actualizar los datos con exito!', 'error');
        } else if (mensaje == '4'){
            swal(':D', 'Se borraron los datos con exito!', 'success');
        } else if (mensaje == '5'){
            swal(':c', 'No se borraron los datos con exito!', 'error');
        }
    </script>
</body>
</html>