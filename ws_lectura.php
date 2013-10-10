<?php
    $WEB_SERVICE = "http://10.10.8.13:4947/WS_Califica_SMS/WS_Crecos.asmx?WSDL";
    session_start();
    $codigoCliente = $_SESSION ['vcodigoCliente'];
    $fechaBase = $_GET ['fechaActual'];
    if (empty($fechaBase)) {$fechaBase = date ("Y/m/d");}
   
    $nuevafecha = strtotime ( '-3 month' , strtotime ( $fechaBase ) ) ;
    $fechaActual = date ( 'Ymd' , $nuevafecha );

    // Estado Ingresado
    $estado = '0';
 
    // Invocamos al WebService implementando el web metodo para obtener las facturas.
    try 
    {
        $soapClient = new SoapClient ($WEB_SERVICE,
        array ('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
        $parametros = array (
            'c_cliente' => $codigoCliente,
            'd_fecha_base' => $fechaActual,
            'c_estado' => $estado
            );
        $ready = $soapClient->DisCli_F_VenDetReclamos($parametros)->DisCli_F_VenDetReclamosResult;  
        //Habilitamos solo estó para ver el retorno del WS con su estructura
        //var_dump($ready);
    } catch (Exception $e) 
    {
        trigger_error($e->getMessage(), E_USER_WARNING);
    } 
    
    $xml = simplexml_load_string($ready->any);
    $detalleReclamos = array();

    foreach ($xml->NewDataSet->DEVOLUCIONES as $detalleReclamo)
    { 
        $detalleReclamos[] = array(
            'SOLICITUD'  => (string) $detalleReclamo->SOLICITUD,
            'USUARIO' => (string) $detalleReclamo->USUARIO,
            'FACTURA' => (string) $detalleReclamo->FACTURA,
            'FECHA_EMI' => (string) $detalleReclamo->FECHA_EMI,
            'DES_ESTADO' => (string) $detalleReclamo->DES_ESTADO
        );  
    }

    header("Content-type: application/json");
    echo "{\"total\":" .count($detalleReclamos). ", \"data\":" .json_encode($detalleReclamos). "}";
?>
