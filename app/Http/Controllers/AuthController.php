<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'create', 'unauthorized']]);
    }

    public function create(Request $request)
    {
        $data = ['error' => ''];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!$validator->fails()) {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $emailExists = User::where('email', $email)->count();
            if($emailExists === 0) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $newUser = new User();
                $newUser->name = $name;
                $newUser->email = $email;
                $newUser->password = $hash;
                $newUser->save();
                $token = auth()->attempt([
                    'email' => $email,
                    'password' => $password
                ]);
                if(!$token) {
                    $data['error'] = 'Ocorreu um erro no login do usuário! Tente novamente.';
                    return $data;
                }
                $data['data'] = auth()->user();
                $data['token'] = $token;
            } else {
                $data['error'] = 'E-mail já cadastrado';
                return $data;
            }
        } else {
            $data['error'] = 'Dados inexistentes e/ou inválidos';
            return $data;
        }
        return $data;
    }

    public function login(Request $request)
    {
        $data = ['error' => ''];
        $email = $request->input('email');
        $password = $request->input('password');
        $token = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);
        if(!$token) {
            $data['error'] = 'Usuário e/ou senha inválidos!';
            return $data;
        }
        $info = auth()->user();
        $data['data'] = $info;
        $data['token'] = $token;
        return $data;
    }
	
	public function loginAction(Request $request)
	{
		$creds = $request->only('email', 'password');
        $validator = Validator::make($creds, [
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string'],
        ]);
        if($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }
        if(Auth::attempt($creds)) {
            return redirect('/api/web/home');
        } else {
            $validator->errors()->add('password', 'E-mail e/ou senha inválidos!');
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }
	}

    public function logout()
    {
        auth()->logout();
        return ['error' => ''];
    }

    public function refresh()
    {
        $data = ['error' => ''];
        $token = auth()->refresh();
        $info = auth()->user();
        $data['data'] = $info;
        $data['token'] = $token;
        return $data;
    }

    public function unauthorized() {
        return response()->json([
            'error' => 'Não autorizado'
        ], 401);
    }
}
