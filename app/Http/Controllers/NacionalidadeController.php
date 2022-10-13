<?php

namespace App\Http\Controllers;

use App\Models\Nacionalidade;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class NacionalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $nacionalidades = Nacionalidade::all();
        return view('admin.nacionalidade.index', compact('nacionalidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.nacionalidade.crud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        $rules = ['nome' => 'required|string|max:255', 'sigla' => 'required|string|size:2'];
        $data = $request->validate($rules);
        Nacionalidade::create($data);
        return redirect()->route('nacionalidade.index')->with('success', 'Nacionalidade cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $nacionalidade = Nacionalidade::find($id);
        return response()->json($nacionalidade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $nacionalidade = Nacionalidade::find($id);
        return view('admin.nacionalidade.crud', compact('nacionalidade'));
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
        $rules = ['nome' => 'required|string|max:255', 'sigla' => 'required|string|size:2'];
        $data = $request->validate($rules);
        $nacionalidade = Nacionalidade::find($id);
        $nacionalidade->update($data);
        return redirect()->route('nacionalidade.index')->with('success', 'Nacionalidade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $nacionalidade = Nacionalidade::find($id);
        $nacionalidade->delete();
        return redirect()->route('nacionalidade.index')->with('success', 'Nacionalidade deletada com sucesso!');
    }
}
