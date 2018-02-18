<?php
    
    // Encabezado del control que verificar si la session expiro.
    require '../../_includes/ctrl_checksession.php';
    
    // Encabezado del control
    require '../../_includes/ctrl_header.php';
    
    // Se abra la conexion a la BD.
    require '../../_includes/ctrl_openDB.php';    
    

    require 'model/modelfacturas.php';
    $model = new modelfacturas($con->db); 
    
    $tableData = stripcslashes($_POST['pTableData']);

	// Decode the JSON array
	$tableData = json_decode($tableData,TRUE);

	// now $tableData can be accessed like a PHP array
	
    $idFactura   = $_POST["idFactura"];
    
    $totalNota 	 = $_POST["totalNota"];
    $totalIvNota = $_POST["totalivnota"];
    $idTienda	 = $_POST["idTienda"];
    $userVendedor = $_POST["userVendedor"];

    
/*    
     echo "<pre>";
     print_r($_POST);
     echo "<pre>";
     exit;
*/     
      
    
    $result = $model->saveDevolucion($idTienda,$tableData,$idfactura,$totalNota,$totalIvNota,$userVendedor);

	if ($result !== "OK"){
   		// Hubo en error inesperado en la operacion en la base de datos.
   		// La variable $result  tiene el mensaje que se le debe
   		// desplegar al usuario  	           
	  	//header("Location: ../../resources/misc/errorMsg.php?errormsg=".$result);
	  	echo $result;
	}else{         
    	echo 'Operacion Exitosa';
	}
    //header("Location: listOrders.php");    

?>