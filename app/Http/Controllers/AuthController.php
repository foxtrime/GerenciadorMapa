<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Auth;


class AuthController extends Controller
{
    public function login()
    {
            return view('auth.login');
    }

    public function entrar(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $credentials = ['email'=>$request->email,'password'=>$request->password];

        if(Auth::attempt($credentials))
        {
            return redirect()->intended('home');
        }else{
            return redirect()->back()->with('msg','Acesso Negado, Email ou senha invalida');
        }
    }


    public function inicio()
    {
        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
       
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $md5 = Hash::make($request->password);
		// dd($md5);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nivel' => $request->nivel,
            // 'password' => $md5,
            'password' => '$2y$10$P53tPOss9WuPaR80i8IchuNZyjwvlcX6QFlRE4LbgT5QvKZgIVIEa',
        ]);

        return redirect()->to('/register');

    }

    public function AlteraSenha()
	{
		$usuario = Auth::user();
		return view('usuarios.altera_senha',compact('usuario'));    	
    }

    public function SalvarSenha(Request $request)
	{
	    // Validar
		$this->validate($request, [
			'password_atual'        => 'required',
			'password'              => 'required|min:6|confirmed',
			'password_confirmation' => 'required|min:6'
		]);

		// Obter o usuário
		$usuario = User::find(Auth::user()->id);

		if (Hash::check($request->password_atual, $usuario->password))
		{

			$usuario->update(['password' => bcrypt($request->password)]);            

			return redirect('/home')->with('sucesso','Senha alterada com sucesso.');
		}else{
			return back()->withErrors('Senha atual não confere');
		}
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }
}