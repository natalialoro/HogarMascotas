<?php namespace App\Controllers;

use App\Models\Modeloanimales;

class RegistroControlador extends BaseController{
    
    public function index(){
		return view('vistaRegistro');
	}

	public function registrar(){

		
		$nombre=$this->request->getPost("nombre");
		$edad=$this->request->getPost("edad");
		$tipo=$this->request->getPost("tipo");
		$descripcion=$this->request->getPost("descripcion");
		$comida=$this->request->getPost("comida");
		$foto=$this->request->getPost("foto");

		
		$datosEnvio=array(
			"nombre"=>$nombre,
			"edad"=>$edad,
			"tipo"=>$tipo,
			"descripcion"=>$descripcion,
			"comida"=>$comida,
			"foto"=>$foto
		);

		
		$modeloAnimales= new Modeloanimales();

	
		try{
			
			$modeloAnimales->insert($datosEnvio);
			$mensaje="Registro agregado con Exito";
			return (redirect()->to(base_url("public/"))->with('mensaje',$mensaje));



		}catch(\Exception $error){

			echo($error->getMessage());

		}

	}

	public function buscar(){
		
	
		$modeloAnimales=new Modeloanimales();

		
		try{

			
			$datosConsultados=$modeloAnimales->findAll();

			
			$datosParaVista=array("animales"=>$datosConsultados);

			
			return view('vistaListado',$datosParaVista);


		}catch(\Exception $error){

			echo($error->getMessage());

		}

	}

	public function eliminar($id){

		
		$modeloAnimales=new ModeloAnimales();

	
		try{

			$modeloAnimales->where('id',$id)->delete();
			echo("Registro eliminado con exito");

		}catch(\Exception $error){

			echo($error->getMessage());

		}

	}

	public function editar($id){

	
		$nombre=$this->request->getPost("nombreEditar");
		$descripcion=$this->request->getPost("descripcionEditar");

		

	
		$datosEnvio=array(
			"nombre"=>$nombre,
			"descripcion"=>$descripcion	
		);

		
		$modeloAnimales= new Modeloanimales();

	
		try{

			$modeloAnimales->update($id,$datosEnvio);
			$mensaje="Registro editado con exito";
			
		}catch(\Exception $error){

			echo($error->getMessage());

		}
		

		

	}

	

}
