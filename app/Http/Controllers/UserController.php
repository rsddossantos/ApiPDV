<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->loggedUser = auth()->user();
    }

    public function list()
    {
        $data = ['error' => ''];
        $info = DB::table('users')
            ->select('users.*',
                (DB::raw("(SELECT offices.name FROM offices WHERE offices.id = users.id_office) AS office_name")),
                (DB::raw("(SELECT departments.name FROM departments WHERE departments.id = users.id_department) AS department_name")),
            )
            ->orderBy('department_name')
            ->get();
        $data['data'] = $info;
        return $data;
    }

    public function one($id)
    {
        $data = ['error' => ''];
        $info = User::find($id);
        $data['data'] = $info;
        return $data;
    }

    public function update(Request $request)
    {
        $data = ['error' => ''];
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $office = $request->input('id_office');
        $department = $request->input('id_department');
        $user = User::find($id);
        if (!empty($name)) {
            $user->name = $name;
        }
        if (!empty($email) && $user->email != $email) {
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
        if (!empty($password) && $password != $user->password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user->password = $hash;
        }
        $user->id_office = $office;
        $user->id_department = $department;
        if($user->save()) {
            $data['data'] = 'Dados atualizados com sucesso!';
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
