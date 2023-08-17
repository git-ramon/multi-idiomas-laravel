<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    public function index()
    {
        return view('home');
        
    }
    
    public function create(){
        $produto = Produto::paginate(4);

        return view('produtos.create', ['produto' => $produto]);
    }

    public function store(Request $request){
        Produto::create([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

      //  return redirect('/produtos/novo');
       return redirect('/produtos/novo')->with('msg', 'Produto Criado com Sucesso!');
    }

    public function show($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.show', ['produto' => $produto]);
    }

    public function edit($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', ['produto' => $produto]);
    }

    public function update(Request $request, $id){

        $produto = Produto::findOrFail($id);

        $produto->update([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
        ]);

        return redirect('/produtos/novo')->with('msg-edit', 'Produto Atualizado com Sucesso!');
    }

    public function delete($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.delete', ['produto' => $produto]);
    }

    public function destroy($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect('/produtos/novo')->with('msg-delete', 'Produto Deletado!');
    }
}
