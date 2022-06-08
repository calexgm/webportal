<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\UsuariosModel;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $usuario = $request->usuario;
        $password = $request->password;
        try {
            DB::beginTransaction();

            $user = UsuariosModel::where("", $usuario)->where("", $password)->first();
            DB::commit();
            return response()->json([
                'data' => true
            ]);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json([
                'data' => false
            ]);
        }
    }

    public function logout()
    {
        try {
            
        } catch (Exception $ex) {

        }
    }
}
