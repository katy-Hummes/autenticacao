<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user()->load('profile');
        return view('profile', compact('user'));
    }

    public function userUpdate(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $user->update([
            'name' => $request->input('name')
        ]);
        return redirect()->route('profile')->with('userUpdated', 'Usuário atualizado com sucesso');
    }

    public function profileCreate(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();

        UserProfile::create([
            'user_id' => $user->id,
            'biography' => $request->input('biography'),
            'cpf' => $request->input('cpf'),
            'birth' => $request->input('birth'),
            'age' => $request->input('age')
        ]);
        return redirect()->route('profile')->with('profileCreated', 'perfil criado com sucesso');
    }

    public function profileUpdate(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $user->profile->update([
            'biography' => $request->input('biography'),
            'cpf' => $request->input('cpf'),
            'birth' => $request->input('birth'),
            'age' => $request->input('age'),
        ]);
        return redirect()->route('profile')->with('profileUpdated', 'perfil atualizado com sucesso');
    }
}
