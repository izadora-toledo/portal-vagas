<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga;
use App\Models\Candidato;
use Illuminate\Support\Facades\Auth;


class VagaController extends Controller
{
   
    public function index(Request $request)
    {
        $vagas = Vaga::query();

        // Filtragem
        if ($request->has('filtro')) {
            $filtro = $request->input('filtro');
            $vagas->where(function($query) use ($filtro) {
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

    public function edit($id)
    {
        $vaga = Vaga::findOrFail($id);
        return view('vagas.create', compact('vaga'));
    }

    public function update(Request $request, Vaga $vaga)
    {
        $vaga->fill($request->all());
        $vaga->save();

        return redirect()->route('vagas.index')->with('success', 'Vaga atualizada com sucesso!');
    }

    public function destroy(Vaga $vaga)
    {
        // Exclui todos os registros relacionados na tabela vaga_candidatos
        $vaga->candidatos()->detach();
        
        // Exclui a vaga em si
        $vaga->delete();
    
        return redirect('/vagas')->with('success', 'Vaga excluída com sucesso!');
    }
    
    

    public function pausar($id)
{
    $vaga = Vaga::find($id);
    $vaga->status = 'pausado';
    $vaga->save();

    return redirect()->back();
}

public function ativar($id)
{
    $vaga = Vaga::find($id);
    $vaga->status = 'ativo';
    $vaga->save();

    return redirect()->back();
}

    


    public function toggleCandidatura(Vaga $vaga)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $candidato = $vaga->candidatos()->where('user_id', $user->id)->first();

        if ($candidato) {
            $candidato->delete();
        } else {
            $candidato = new Candidato();
            $candidato->user_id = $user->id;
            $candidato->vaga_id = $vaga->id;
            $candidato->save();
        }

        return back();
    }   





}
