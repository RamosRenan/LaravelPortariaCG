<?php

namespace App\Http\Controllers\PortariaCg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\visitantes;
use Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;



class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     * @View cadastro(formulário) de entrada de pessoal ao CG
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('PortariaCg/ManagerInputOutput/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // pega todos os dados
          $allData = DB::table('visitantes')->select('*')->orderBy('status', 'Desc')->get();

        return view('PortariaCg/ManagerInputOutput/show')->with(['data'=>$allData]);
    }

    
    public function store(Request $request)
    {
        // move foto do visitante para servidor de arquivo
        try {
            //code ...
            $returnStorage = Storage::disk('pictures')->put('', $request->file('fotoVisit'));
        } catch (\Throwable $th) {
            throw $th;
        }
        
        // cria novo visitante
        $newVisiting = new visitantes;
        $newVisiting->name           = $request->input('nome'); 
        $newVisiting->tel            = $request->input('Telefone'); 
        $newVisiting->recepcao       = $request->input('Recepcao'); 
        $newVisiting->cracha         = $request->input('Cracha'); 
        $newVisiting->rg             = $request->input('rg'); 
        $newVisiting->localdestino   = $request->input('local_destino'); 
        $newVisiting->responsavel    = $request->input('responsavel'); 
        $newVisiting->period_into    = $request->input('data_into').$request->input('hora_into');  
        $newVisiting->path_picture   = $returnStorage;
        $newVisiting->obs            = $request->input('description'); 
        $newVisiting->status         = true;
        $newVisiting->remember_token = $request->input('_token'); 
        
        //salva visitante
        try {
            //code...
            $newVisiting->save(); 
        } catch (\Throwable $th) {
            throw $th;
        }

        // retorna para pagina de origem
        return back()->with(['success'=>true]);
    }
          
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // pega todos os dados
        $allData = DB::tabble('visitantes')->select('*')->get();

        // exibe todos os registros da portaria
        return view('PortariaCg/ManagerInputOutput/show')->with(['data'=>$allData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // altera status visitantes
        $wichStatus = visitantes::where('id', $request->id)->get();

        if($wichStatus[0]->status){
            visitantes::where('id', $request->id)->update(['status'=>false, 'time_out'=>date('d/m/Y h:i:s')]);
        }else{
            visitantes::where('id', $request->id)->update(['status'=>true]);
        }

        return back()->with(['update'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
