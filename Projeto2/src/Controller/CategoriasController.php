<?php

namespace Andres\Controller;

use Andres\Model\DAO\CategoriaDAO;
use Andres\Model\DAO\Categoria;

class CategoriasController
{
    public static function index()
    {
        $categoriaDAO = new CategoriaDAO();
        $resultado = $categoriaDAO->consultar();
        require '../src/View/Categorias/index.php';
    }
    public static function criar()
    {
        require '../src/View/Categorias/criar.php';
    }
    public static function alterar($params)
    {
        $id = $params[1];
        $categoriaDAO = new CategoriaDAO();
        $resultado = $categoriaDAO->consultarPorId($id);
        require '../src/View/Categorias/alterar.php';
    }
    public static function excluir($params)
    {
        $id = $params[1];
        $categoriaDAO = new CategoriaDAO();
        $resultado = $categoriaDAO->consultarPorId($id);
        require '../src/View/Categorias/excluir.php';
    }
    public static function visualizar($params)
    {
        $id = $params[1];
        $categoriaDAO = new CategoriaDAO();
        $resultado = $categoriaDAO->consultarPorId($id);
        require '../src/View/Categorias/visualizar.php';
    }
}