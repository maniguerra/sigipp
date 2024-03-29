<?php


class ControladorClientes{

        /*=============================================
        MOSTRAR CLIENTES
        =============================================*/

        static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

         }


         /*=============================================
        CREAR CLIENTES
        =============================================*/

    static public function ctrCrearCliente(){

        if(isset($_POST["nuevoCliente"])){


                    if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
                    preg_match('/^[0-9.]+$/', $_POST["nuevoDocumento"]) &&
                    ($_POST["nuevoEmail"] == '' || preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) ) && 
                    preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
                    preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])){

                        

                            $tabla = "clientes";
                            
                            $datos = array(
                                "nombre"=>$_POST["nuevoCliente"],
                                "documento"=>$_POST["nuevoDocumento"],
                                "email"=>$_POST["nuevoEmail"],
                                "telefono"=>$_POST["nuevoTelefono"],
                                "direccion"=>$_POST["nuevaDireccion"]);
                            
                            $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

                            
                            if($respuesta == "ok"){
                                echo '<script>
                                swal.fire({
                                    type: "success",
                                    title: "El cliente ha sido guardado correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
            
                                }).then(function(result){
                                    if(result.value){
                                        window.location = "clientes";
            
                                    }   
            
                                });
                            </script>';
                            }

                    }   else{

                        echo '<script>
                        swal.fire({
                            type: "error",
                            title: "Los datos no pueden estar vacíos o contener carateres especiales",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
    
                        }).then(function(result){
                            if(result.value){
                                window.location = "clientes";
    
                            }   
    
                        });
                      </script>';

                             }
       
       
           }


    }



        /*=============================================
        EDITAR CLIENTES
        =============================================*/


    static public function ctrEditarCliente(){

        if(isset($_POST["editarCliente"])){


                    if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
                    preg_match('/^[0-9.]+$/', $_POST["editarDocumento"]) &&
                    ($_POST["editarEmail"] == '' || preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) ) && 
                    preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
                    preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])){

                       

                            $tabla = "clientes";
                            
                            $datos = array(
                                "id"=>$_POST["idCliente"],
                                "nombre"=>$_POST["editarCliente"],
                                "documento"=>$_POST["editarDocumento"],
                                "email"=>$_POST["editarEmail"],
                                "telefono"=>$_POST["editarTelefono"],
                                "direccion"=>$_POST["editarDireccion"]);
                            
                            $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

                            
                            if($respuesta == "ok"){
                                echo '<script>
                                swal.fire({
                                    type: "success",
                                    title: "El cliente ha sido editado correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
            
                                }).then(function(result){
                                    if(result.value){
                                        window.location = "clientes";
            
                                    }   
            
                                });
                            </script>';
                            }

                    }   else{

                        echo '<script>
                        swal.fire({
                            type: "error",
                            title: "Los datos no pueden estar vacíos o contener carateres especiales",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
    
                        }).then(function(result){
                            if(result.value){
                                window.location = "clientes";
    
                            }   
    
                        });
                      </script>';

                             }
       
       
           }


    }


    
/*==========================================
ELIMINAR CLIENTE
==========================================*/

static public function ctrEliminarCliente(){
    if(isset($_GET["idCliente"])){

        $tabla = "clientes";
        $datos = $_GET["idCliente"];


        $respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal.fire({
							  type: "success",
							  title: "El cliente ha sido borrado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "clientes";

										}
									})

						</script>';

				}
    }
}
}
