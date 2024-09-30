<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PersonagensController extends Controller
{
    // Mostra a home
    public function MostrarHome()
    {
        return view('home');
    }

    // Para mostrar tela de cadastro de Personagem
    public function MostrarCadastroPersonagem()
    {
        return view('cadastroPersonagem');
    }

    // Para salvar os registros na tabela Personagem
    public function CadastroPersonagem(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nomePersonagem' => 'string|required',
        'dataPersonagem' => 'date|required',
        'obraPersonagem' => 'string|required',
        'imgPersonagem' => 'file|required|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    if ($validator->fails()) {
        return Redirect::back()->withErrors($validator)->withInput();
    }

    // Salvar a imagem no diretório public/imagens
    $path = $request->file('imgPersonagem')->store('imagens', 'public');

    // Criar o personagem
    Personagem::create(array_merge($request->all(), ['imgPersonagem' => $path]));

    return Redirect::route('lista-personagem')->with('success', 'Personagem cadastrado com sucesso!');
}


    // Para apagar os registros na tabela de Personagem
    public function Destroy(Personagem $id)
    {
        $id->delete();
        return Redirect::route('home')->with('success', 'Personagem apagado com sucesso!');
    }

    // Alterar registros na tabela de Personagem
    public function Update(Personagem $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomePersonagem' => 'string|required',
            'dataPersonagem' => 'date|required',
            'obraPersonagem' => 'string|required',
            'imgPersonagem' => 'file|mimes:jpeg,png,jpg,gif|max:2048' // Opcional, se a imagem não for obrigatória na atualização
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $id->fill($request->all());
        if ($request->hasFile('imgPersonagem')) {
            $path = $request->file('imgPersonagem')->store('imagens');
            $id->imgPersonagem = $path; // Atualiza o caminho da imagem
        }
        $id->save();

        return Redirect::route("home")->with('success', 'Personagem atualizado com sucesso!');
    }

    // Para mostrar somente os Personagem por código 
    public function MostrarPersonagemCodigo(Personagem $id)
    {
        return view('altera-Personagem', ['registrosPersonagem' => $id]);
    }

    // Para buscar os Personagem por nome
    public function MostrarPersonagemNome(Request $request)
    {
        $registros = Personagem::query();
        $registros->when($request->nomePersonagem, function($query, $valor) {
            $query->where('nomePersonagem', 'like', '%' . $valor . '%');
        });
        $todosRegistros = $registros->get();
        return view('listaPersonagem', ['registrosPersonagem' => $todosRegistros]);
    }
}
