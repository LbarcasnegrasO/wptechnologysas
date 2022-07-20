<?php
require_once("layouts/header.php");
?>
<a href="index.php?m=nuevo" class="btn">NUEVO</a>
<br/><br/>
<table>
    <tr>
        <td>ID</td>
        <td>NONBRE</td>
        <td>APELLIDO</td>
        <td>TELEFONO</td>
        <td>F. NACIMIENTO</td>
        <td>CORREO</td>
        <td>ACCION</td>
    </tr>
    <tbody>
        <?php foreach($dato as $key => $value)
            foreach($value as $v):?>
                <tr>
                    <td><?php echo $v['id'] ?></td>
                    <td><?php echo $v['firstname'] ?></td>
                    <td><?php echo $v['lastname'] ?></td>
                    <td><?php echo $v['phonenumber'] ?></td>
                    <td><?php echo $v['birthdate'] ?></td>
                    <td><?php echo $v['email'] ?></td>
                    <td>
                        <a class="btn" href="/index.php?m=editar&id=<?php echo $v['id'] ?>">EDITAR</a>
                        <a class="btn-d" href="/index.php?m=eliminar&id=<?php echo $v['id'] ?>">BORRAR</a>
                    </td>
                 </tr>

            <?php endforeach ?>
        
    </tbody>
</table>
<?php
require_once("layouts/footer.php");


/*
use views;
use models;
use request;

class UsuariosView extends Views {

    public function display() {
        //Obtener el modelo enviado desde el controlador
        $objModel = $this->getModel("Usuarios");

        $objRequest = new Request("POST");
        $txtNombre = $objRequest->getParam("nombre");

        //Utiliza el modelo para buscar un usuario por nombre,
        //recibe un array asociativo y retorna un array
        $arrUsuario = $objModel->findUsuario(array("nombre"=>txtnombre));
        //Metodo para asignar un valor al template
        //Parametro 1: nombre de la variable en el template
        //Parametro 2: nombre del valor, array u objeto a asignar
        $this->assign("arrUsuario", $arrUsuario);

        // metodo para enviar a pantalla el resultado de una vista
        $this->out("login.tpl");
    }
}

?>

<table>
    <tr>
        <td>Nombre:</td>
        <td>{$arrUsuario['name']}</td>
    </tr>
</table>
*/