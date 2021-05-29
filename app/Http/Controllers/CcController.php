<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CcController extends Controller
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
        $info = Department::all();
        $data['data'] = $info;
        return $data;
    }

    public function create(Request $request)
    {
        $data = ['error' => ''];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if(!$validator->fails()) {
            $name = $request->input('name');
            $newDept = new Department();
            $newDept->name = $name;
            $newDept->save();
        } else {
            $data['error'] = 'Dados inexistentes e/ou inválidos';
            return $data;
        }
        return $data;
    }

    public function one($id)
    {
        $data = ['error' => ''];
        $info = Department::find($id);
        $data['data'] = $info;
        return $data;
    }

    public function update(Request $request)
    {
        $data = ['error' => ''];
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $dept = Department::find($id);
        $dept->name = $name;
        if($dept->save()) {
            $data['data'] = 'Dados atualizados com sucesso!';
        } else {
            $data['error'] = 'Não houve nenhuma atualização, tente novamente';
        }
        return $data;
    }

    public function delete($id)
    {
        $data = ['error' => ''];
        $dept = Department::find($id);
        $dept->delete();
        return $data;
    }

}
