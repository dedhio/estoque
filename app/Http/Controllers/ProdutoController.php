<?php
/**
 * Created by PhpStorm.
 * User: geovani
 * Date: 31/03/18
 * Time: 22:34
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class ProdutoController extends Controller
{

    public function lista(){

        $produtos= DB::select('select * from produtos');

        if (view()->exists('listagem'))
        {
            return view('listagem')->withProdutos($produtos);
        }
    }
}