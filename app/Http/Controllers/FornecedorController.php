<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    // criando o método listar
    public function listar(Request $request)
    {

        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(2);

        //dd($fornecedores);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    // criando o método adicionar
    public function adicionar(Request $request)
    {
        $msg = '';

        // Cadastro
        if ($request->input('_token') != '' && $request->input('id') == '') {
            // Validação
            $regras = [
                'nome'  => 'required|min:3|max:40',
                'site'  => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo email não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);
            //echo 'Chegamos no cadastro';
            //cadastro
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //redirect

            //dados view
            $msg = 'cadastro realizado com sucesso!';
        }

        // Edição
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg =  'Atualização realizado com sucesso!';
            } else {
                $msg =  'Houve um erro na atualização!';
            }
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    // Criando o Método editar
    public function editar($id, $msg = '')
    {
        //echo $id;
        $fornecedor = Fornecedor::find($id);

        //dd($fornecedor);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
}
