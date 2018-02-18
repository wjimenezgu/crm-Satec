<?php

    session_start();
    
    require '../../_config/db/UserConnection.php';          
    $userConnect = new UserConnection($_SESSION["USER_SESSION"], $_SESSION["PWD_USER"] );
    
    require '../../_config/db/DBConexion.php';
    $conn = new DBConexion(1, $userConnect);    
    
    require 'model/modelMCompras.php';
    $model = new modelMCompras($conn->db);
    
    $idProveedor  = $_POST["idProveedor"];
    $nameArticulo = $_POST["desArticle"];
    
    $infoArticulo = $model->getInfoArtiByDes($idProveedor, $nameArticulo);                            
    
    //  CodArti
    //  CodArtiPro
    //  DesArticulo        
    echo json_encode($infoArticulo);
    
?>