<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List de Usuruios</title>
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<div class="container-fluid bg-primary">
          <div class="row">
              <div class="col-md">
                  <header class="py-3">
                      <h3 class="text-center">Hotel Barú</h3>
                  </header>
              </div>
          </div>
      </div>
     

    <table class="table">
        <thead>
            <tr>
                <th>Identificador</th>
                <th>Usuarios</th>
                <th>Contraseña</th>
                <th>Nombre Real</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                  foreach($usuarios as $user){ 
                      echo "<tr>";
                      echo "<td>".$user['id']."</td>";
                      echo "<td>".$user['username']."</td>";
                      echo "<td>".$user['password']."</td>";
                      echo "<td>".$user['nombre']."</td>";
                      echo "</tr>";
                  }
                ?>

        </tbody>
    </table>
    
</body>
</html>