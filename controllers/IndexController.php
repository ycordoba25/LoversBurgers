<?php
include 'entities/Categoria.php';
include 'models/CategoriaModel.php';
include 'models/AdministradorModel.php';
include 'models/ClienteModel.php';

class IndexController extends Controller{
    protected $categoriaModel;

    public function __construct(){
        $this->categoriaModel = $this->model('categoria');
    }

    public function actionIndex(){
        $categorias = $this->categoriaModel->getCategorias();
            $datos = [
                'categorias' => $categorias,
            ];
        $this->view('index',$datos);
    }
    

    public function actionError(){
        $datos = ["titlo" => 'error'];
        $this->view('error',$datos);
    }
}

?>