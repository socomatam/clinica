<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use Session;
use App\Medico;
use App\Cita;
use App\Especialidade_medico;
use App\Especialidade;
use App\Tratamiento;
use Illuminate\Http\Request;
use App\Http\Requests\MedicoRequest;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::paginate(10);
		return view('clinica.medicos.medicos', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$lang = \App::getLocale(session('lang'));
		
		if(Gate::allows('administradores', Auth::user())){
			return view('clinica.medicos.create-medicos');
		}else{
			
			if($lang == 'es'){
				Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no está autorizada para crear nuevos médicos.');	
			}else{
				Session::flash('mensaje_autorizacion', 'Your account does not have permission to create new doctors.');	
			}//fin else
			
			return redirect('medicos');
		}  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoRequest $request)
    {
		
		$lang = \App::getLocale(session('lang'));
		Medico::create($request->all());
		
		if($lang == 'es'){
				Session::flash('mensaje_confirmacion', 'El médico se ha creado correctamente.');	
		}else{
				Session::flash('mensaje_confirmacion', 'The doctor was created successfully.');
		}

        return redirect('medicos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = Medico::find($id);
		
		$especialidades = Especialidade_medico::select('especialidades.id AS especialidad_id','especialidades.especialidad')
												->join('especialidades', 'especialidade_medico.especialidade_id', '=', 'especialidades.id')
												->where('especialidade_medico.medico_id', $id)
												->get();
		
		$especialidades_select = Especialidade::All();
		
		return view('clinica.medicos.especialidades_medicos', compact('medico', 'especialidades','especialidades_select'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$lang = \App::getLocale(session('lang'));
		
		if(Gate::allows('administradores', Auth::user())){
			$medico = Medico::find($id);
			return view('clinica.medicos.edit-medicos', compact('medico'));
		}else{
			
			if($lang == 'es'){
				Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no está autorizada para editar médicos.');
			}else{
				Session::flash('mensaje_autorizacion', 'Your user account is not authorized to edit doctors.');
			}//fin else
			
		}//fin else
		return redirect('medicos');
    }//fin edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoRequest $request, $id)
    {
        $request = request()->except('_token','_method');
		Medico::where('id',$id)->update($request);
		Session::flash('mensaje_editado', 'El médico se ha actualizado correctamente.');
        return redirect('medicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if(Gate::allows('administradores', Auth::user())){
			$citas = Cita::where("medico_id", $id)->count();
			$tratamientos = Tratamiento::where("medico_id", $id)->count();
			$especialidades = Especialidade_medico::where("medico_id", $id)->count();
			$cant = $citas + $tratamientos;

			if($cant > 0){
				echo "error";
			}else{
				Medico::find($id)->delete();
				echo "success";
			}
		}else{
			return "desautorizado";
		}
    }
}

