<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
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

        return redirect('/dashboard');
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
            return redirect()->route('home');
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
        return view('auth.edit', compact('user'));
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
            // Tratar exceção
            dd($ex->getMessage());
        }

        return redirect()->route('user.edit')->with('success', 'Perfil atualizado com sucesso!');
} 
    
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuário não encontrado');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso');
    }







}
