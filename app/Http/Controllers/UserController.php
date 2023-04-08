<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect('/home');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('home.welcome');
        }

        return back()->withErrors(['email' => 'Email ou senha inválidos.']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function index()
    {
        $users = User::all();

        return view('users.index')->with('users', $users);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));   
    }

    public function edit()
    {
        $user = Auth::user();
        return view('auth.users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        try {
            $user->save();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('user.edit')->with('error', 'Erro ao atualizar perfil. Por favor, tente novamente.');
        }
        
        return redirect()->route('user.edit')->with('success', 'Perfil atualizado com sucesso!');        
    }
    
    public function destroy()
    {
        $user = Auth::user();
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Usuário não encontrado');
        }
    
        // Restrição para usuário de ID 1
        if ($user->id === 1) {
            return redirect()->route('login')->with('error', 'O usuário admin não pode ser deletado.');
        }
    
        DB::table('vaga_candidatos')->where('user_id', $user->id)->delete();
        $user->delete();
        Auth::logout();
        return redirect()->route('login')->with('success', 'Usuário deletado com sucesso');
    }   
}
