<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VagaController extends Controller
{
    public function index(Request $request)
    {
        $vagas = Vaga::query();

        // Filtragem
        if ($request->has('filtro')) {
            $filtro = $request->input('filtro');
            $vagas->where(function ($query) use ($filtro) {
                $query->where('titulo', 'like', '%' . $filtro . '%')
                    ->orWhere('empresa', 'like', '%' . $filtro . '%')
                    ->orWhere('localizacao', 'like', '%' . $filtro . '%')
                    ->orWhere('tipo_contratacao', 'like', '%' . $filtro . '%')
                    ->orWhere('salario', 'like', '%' . $filtro . '%')
                    ->orWhere('status', 'like', '%' . $filtro . '%');
            });
        }

        // Ordenação
        $ordenacao = $request->input('ordenacao', 'asc');
        $campo = $request->input('campo', 'id');
        $vagas->orderBy($campo, $ordenacao);

        // Paginação
        $vagas = $vagas->paginate(20);

        return view('vagas.index', compact('vagas'));
    }

    public function create()
    {
        $vaga = new Vaga();
        $ja_candidatou = false;

        return view('vagas.create', compact('vaga', 'ja_candidatou'));
    }

    public function store(Request $request)
    {
        $vaga = new Vaga;
        $vaga->fill($request->all());
        $vaga->save();

        return redirect()->route('vagas.index')->with('success', 'Vaga criada com sucesso!');
    }
    
    public function show(Vaga $vaga)
    {
        $ja_candidatou = $vaga->candidatos()->where('user_id', auth()->user()->id)->exists();

        return view('vagas.show', compact('vaga', 'ja_candidatou'));
    }

    public function edit($vaga)
    {
        $vaga = Vaga::findOrFail($vaga);

        return view('vagas.create', compact('vaga'));
    }

    public function update(Request $request, Vaga $vaga)
    {
        $vaga->fill($request->all());
        $vaga->save();

        return redirect()->route('vagas.index')->with('success', 'Vaga atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $vaga = Vaga::findOrFail($id);

        // Remove candidatos vinculados a essa vaga, caso haja
        DB::table('vaga_candidatos')->where('vaga_id', $vaga->id)->delete();

        // Deleta a vaga da tabela tbvagas
        $vaga->delete();

        return redirect()->route('vagas.index')->with('success', 'Vaga excluída com sucesso!');
    }

    public function pausar($vaga)
    {
        $vaga = Vaga::find($vaga);
        $vaga->status = 'pausado';
        $vaga->save();

        return redirect()->back();
    }

    public function ativar($vaga)
    {
        $vaga = Vaga::find($vaga);
        $vaga->status = 'ativo';
        $vaga->save();

        return redirect()->back();
    }

}