<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['list']]);
        $this->loggedUser = auth()->user();
    }

    public function list()
    {
        $data = ['error' => ''];
        $info = User::all();
        $data['data'] = $info;
        return $data;
    }

    public function update(Request $request)
    {
        $data = ['error' => ''];
        $user = $this->loggedUser;
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        if (!empty($name)) {
            $user->name = $name;
        }
        if (!empty($email)) {
            $emailExists = User::where('email', $email)->count();
            if($emailExists === 0) {
                $validator = Validator::make(['email' => $email], ['email' => 'required|email']);
                if(!$validator->fails()) {
                    $user->email = $email;
                } else {
                    $data['error'] = 'E-mail inválido';
                    return $data;
                }
            } else {
                $data['error'] = 'E-mail já cadastrado';
                return $data;
            }
        }
        if (!empty($password)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user->password = $hash;
        }
        if($user->save()) {
            $data['data'] = 'Dados atualizados com sucesso';
        } else {
            $data['error'] = 'Não houve nenhuma atualização, tente novamente';
        }
        return $data;
    }

    public function delete($id) {
        $data = ['error' => ''];
        if ($this->loggedUser->id != $id) {
            $user = User::find($id);
            $user->delete();
        } else {
            $data = ['error' => 'Não pode ser excluído o próprio usuário que está logado'];
        }
        return $data;
    }
}
