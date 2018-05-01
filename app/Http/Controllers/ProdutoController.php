<?php
/**
 * Created by PhpStorm.
 * User: geovani
 * Date: 31/03/18
 * Time: 22:34
 */

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Support\Facades\Request;


class ProdutoController extends Controller
{

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona()
    {
        Produto::create(Request::all());

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function edita($id)
    {
        $produto = Produto::find($id);

        if(empty($produto))
        {
            return "Esse produto não existe";
        }
        return view('produto.formularioEdicao')->withProduto($produto);
    }

    public function lista()
    {
        $produtos= Produto::all();
        return view('produto.listagem')->withProdutos($produtos);
    }

    public function listaJson()
    {
        $produtos = Produto::all();
        return $produtos;
    }

    public function mostra($id)
    {
        $produto =  Produto::find($id);
        if(empty($produto))
        {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->withProduto($produto);
    }

    public function altera($id)
    {
        $params = Request::all();
        $produto = Produto::find($id);
        $produto->nome = $params['nome'];
        $produto->valor = $params['valor'];
        $produto->descricao = $params['descricao'];
        $produto->quantidade = $params['quantidade'];
        $produto->save();
        return redirect()
            ->action('ProdutoController@lista');
    }

    public function remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }

}