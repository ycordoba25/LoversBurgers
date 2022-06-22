<?php

include 'entities/Cliente.php';
include 'models/ClienteModel.php';
include 'models/CarritoModel.php';
include 'entities/Categoria.php';
include 'models/CategoriaModel.php';
include 'models/CarritoproductoModel.php';

class ClienteController extends Controller
{

    protected $clienteModel;
    protected $carritoModel;
    protected $categoriaModel;
    protected $carritoproductoModel;

    public function __construct()
    {
        $this->clienteModel = $this->model('cliente');
        $this->carritoModel = $this->model('carrito');
        $this->categoriaModel = $this->model('categoria');
        $this->carritoproductoModel = $this->model('carritoproducto');
    }

    public function actionIndex()
    {
        $categorias = $this->categoriaModel->getCategorias();
        $datos = [
            'categorias' => $categorias
        ];
        $this->view('index', $datos);
    }

    public function actionHome()
    {
        $categorias = $this->categoriaModel->getCategorias();
        $datos = [
            'categorias' => $categorias
        ];
        $this->view('home', $datos);
    }

    public function actionError()
    {
        $datos = ["titlo" => 'error'];
        $this->view('error', $datos);
    }

    public function actionLogin()
    {
        if (isset($_POST['email'], $_POST['contraseña'])) {

            $email = $_POST['email'];
            $contrasena = $_POST['contraseña'];
            $clienteModel = new ClienteModel();

            if ($clienteModel->existe($email, $contrasena)->getDocumento() != null) {
                session_start();
                $cliente = $clienteModel->existe($email, $contrasena);
                $_SESSION['cliente'] = $cliente;
                header("location: " . URL);
                // echo "hola";
                //     echo "<script>
                //     window.location='" . URL . "cliente/home';
                //  </script>";
            } else {
                echo "<script>alert('Datos Incorrectos')</script>";
                $this->actionIndex();
            }
        } else {
            echo "<script>alert('Datos Incompletos')</script>";
            $this->actionIndex();
        }
        
    }

    public function actionCerrar()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->actionIndex();
    }

    public function actionregistrar()
    {
        if (
            isset($_POST['documento'], $_POST['nombres'], $_POST['apellidos'], $_POST['email'], $_POST['contraseña'], $_POST['telefono'], $_POST['direccion'])
            && is_numeric($_POST['documento']) && is_numeric($_POST['telefono'])
        ) {

            $documento = $_POST['documento'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $contrasena = $_POST['contraseña'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];

            $cliente = new Cliente($documento, $nombres, $apellidos, $email, $contrasena, $telefono, $direccion);
            $carrito = new Carrito($documento);

            try {
                $this->clienteModel->insertar($cliente);
                $this->carritoModel->insertar($carrito);
                $this->actionIndex();
            } catch (\Throwable $th) {
                echo $th;
            }
        } else {
            echo "<script>alert('Datos Incompletos)</script>";
            header("location: " . URL);
        }
    }

    public function actionCarrito($id_carrito = null)
    {
        if ($id_carrito == null) {
            $id_carrito = $_POST['id_carrito'];
        }
        $productosCarrito = $this->carritoproductoModel->listarCarrito($id_carrito);
        $categorias = $this->categoriaModel->getCategorias();
        $total = 0;
        foreach ($productosCarrito as $pc) {
            $total += ($pc->getPrecio()) * ($pc->getCantidad());
        }
        $this->carritoModel->actualizar($total, $id_carrito);
        $datos = [
            'productos' => $productosCarrito,
            'categorias' => $categorias,
            'total' => $total
        ];
        $this->view('carrito', $datos);
    }

    public function actionAgregarproducto($params){

        $id = $params[0];
        $precio = $params[1];
        $carrito = $params[2];
        //var_dump ($params);
        //var_dump ($this->carritoproductoModel->existe($carrito,$id));
        if (!$this->carritoproductoModel->existe($carrito,$id)) {
            $this->carritoproductoModel->insert($carrito, $id, $precio);
            $this->actionCarrito($carrito);
        }else{
            echo "<script>alert('Error al agregar')</script>";
            $this->actionCarrito();
        }
    }

    public function actionEliminarproducto()
    {
        $data = $_POST['data'];
        list($id_producto, $id_carrito) = explode(" ", $data);

        $productoBorrado = $this->carritoproductoModel->eliminar($id_producto, $id_carrito);
        if ($productoBorrado) {
            $this->actionCarrito($id_carrito);
        } else {
            echo "<script>alert('Error al eliminar')</script>";
            $this->actionCarrito();
        }
    }
}
