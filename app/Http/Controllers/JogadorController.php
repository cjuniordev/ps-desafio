<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use App\Models\Nacionalidade;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $jogadores = Jogador::all();
        return view('admin.jogador.index', compact('jogadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $nacionalidades = Nacionalidade::all();
        return view('admin.jogador.crud', compact('nacionalidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = ['nome' => 'required|string|max:255', 'idade' => 'required', 'imagem' => 'required', 'nacionalidade_id' => 'required'];
        $data = $request->validate($rules);

        if($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('jogadores', 'public');
        }
        Jogador::create($data);
        return redirect()->route('jogador.index')->with('success', 'Jogador cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $jogador = Jogador::find($id);
        return response()->json($jogador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $nacionalidades = Nacionalidade::all();
        $jogador = Jogador::find($id);
        return view('admin.jogador.crud', compact('jogador', 'nacionalidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $jogador = Jogador::find($id);

        $rules = ['nome' => 'required|string|max:255', 'idade' => 'required', 'imagem' => 'required', 'nacionalidade_id' => 'required'];
        $data = $request->validate($rules);

        if($request->hasFile('imagem')) {
            Storage::delete('public/' . $jogador->imagem);
            $data['imagem'] = $request->file('imagem')->store('jogadores', 'public');
        }

        $jogador->update($data);
        return redirect()->route('jogador.index')->with('success', 'Jogador atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $jogador = Jogador::find($id);

        if($jogador->imagem)
            Storage::delete('public/' . $jogador->imagem);

        $jogador->delete();
        return redirect()->route('nacionalidade.index')->with('success', 'Jogador deletado com sucesso!');
    }
}
