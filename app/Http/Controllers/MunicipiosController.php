<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MunicipiosController extends Controller
{
    public function byDepartamento($id)
    {
        return DB::table('municipios')->where('departamento_id', $id)->get();
    }

}
