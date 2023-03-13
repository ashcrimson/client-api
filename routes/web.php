<?php

use Carbon\Carbon;
use App\Models\Indicador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    $urlAcceso = 'https://postulaciones.solutoria.cl/api/acceso';
    $urlApiIndicadores = 'https://postulaciones.solutoria.cl/api/indicadores';

  

    $respuestaAcceso = Http::acceptJson()->contentType('application/json-patch+json')
            ->post($urlAcceso,[
                'userName' => 'felipepinojapa4snk_prj@indeedemail.com',
                'flagJson' => true
            ])->json();

        // dd($acceso);


    $respuestaApi = Http::withToken($respuestaAcceso["token"])->get($urlApiIndicadores)->json();
    // dd($respuestaApi);

    try {
        DB::beginTransaction();
        foreach($respuestaApi as $indicador)
        {
           Indicador::create([
            'nombreIndicador' => $indicador["nombreIndicador"],
            'codigoIndicador' => $indicador["codigoIndicador"],
            'unidadMedidaIndicador' => $indicador["unidadMedidaIndicador"],
            'valorIndicador' => $indicador["valorIndicador"],
            
           ]);
        }

    } catch (\Exception $exception) {
        
        dd($exception);
        
        DB::rollBack();
    }

    DB::commit();

    echo "<h1>ÉXITO</h1>";

});
