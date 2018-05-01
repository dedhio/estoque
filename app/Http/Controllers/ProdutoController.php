<?php
/**
 * Created by PhpStorm.
 * User: geovani
 * Date: 31/03/18
 * Time: 22:34
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;


class ProdutoController extends Controller
{

    public function novo(){
        return view('produto.formulario');
    }

    public function adiciona(){

        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        return implode( ', ', array($nome, $descricao, $valor, $quantidade));
    }

    public function lista(){

        $produtos= DB::select('select * from produtos');

        if (view()->exists('produto.listagem'))
        {
            return view('produto.listagem')->withProdutos($produtos);
        }
    }
    public function mostra($id){

        $resposta =  DB::select('select * from produtos where id = ?',[$id]);

        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->withProduto($resposta[0]);
    }
}