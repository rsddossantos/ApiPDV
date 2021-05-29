<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cc;
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
        $info = DB::table('ccs')
            ->select('ccs.*',
                (DB::raw("(SELECT departments.name FROM departments WHERE departments.id = ccs.id_department) AS department_name")),
            )
            ->orderBy('department_name')
            ->get();
        $data['data'] = $info;
        return $data;
    }

    public function create(Request $request)
    {
        $data = ['error' => ''];
        $name = $request->input('name');
        $dept = $request->input('id_department');
        if ($name < 0) {
            $data['error'] = 'O código do custo deve ser maior que zero';
            return $data;
        }
        $newCc = new Cc();
        $newCc->name = $name;
        $newCc->id_department = $dept;
        $newCc->save();

        return $data;
    }

    public function one($id)
    {
        $data = ['error' => ''];
        $info = Cc::find($id);
        $data['data'] = $info;
        return $data;
    }

    public function update(Request $request)
    {
        $data = ['error' => ''];
        $id = $request->input('id');
        $name = $request->input('name');
        $dept = $request->input('id_department');
        $cost = Cc::find($id);
        $cost->name = $name;
        $cost->id_department = $dept;
        if($cost->save()) {
            $data['data'] = 'Dados atualizados com sucesso!';
        } else {
            $data['error'] = 'Não houve nenhuma atualização, tente novamente';
        }
        return $data;
    }

    public function delete($id)
    {
        $data = ['error' => ''];
        $dept = Cc::find($id);
        $dept->delete();
        return $data;
    }

}
