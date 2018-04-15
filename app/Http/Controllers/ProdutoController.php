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

    public function lista(){

        $produtos= DB::select('select * from produtos');

        if (view()->exists('listagem'))
        {
            return view('listagem')->withProdutos($produtos);
        }
    }
    public function mostra(){

        $id = Request::input('id', '0');
        $resposta =  DB::select('select * from produtos where id = ?',[$id]);

        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('detalhes')->withProduto($resposta[0]);
    }
}