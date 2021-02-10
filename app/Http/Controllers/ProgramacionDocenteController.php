<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProgramacionDocenteController extends Controller
{
    public function getProgrammingData($campus, $clave)
    {
        $response = Http::retry(5, 3000)->post('https://soft.uasd.edu.do/ProgramacionPorAsignatura/Default.aspx/ObtenerData', [
            'campus' => $campus,
            'clave' => $clave,
        ]);

        if($response->successful())
        {
            return response()->json(['data' => $response->body()], 200);
        }
        else
        {
            return response()->json([], 500);
        }
    }
}
