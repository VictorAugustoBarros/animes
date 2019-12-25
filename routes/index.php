<?php
/**
 * Created by PhpStorm.
 * User: piterson
 * Date: 20/08/19
 * Time: 14:09
 */

/** Padrao de retorno de valores para a tela */


/** Realizar request AJAX com o padrao "routes/${controller}/${action}" */
/** Nome do arquivo deve ser igual ao nome da ${controller} */
/** Nome da classe do controller utilizar como padao > replace('-','_', ${controller}).'_controller' */
/** Ver o arquivo modelo em '/controllers/kami-sms.php' */

$_controller = $_REQUEST["controller"];
$_action = $_REQUEST["action"];

try{
    $_file_load = $_SERVER['DOCUMENT_ROOT']."/mvc/controllers/".$_controller.".php";

    if (file_exists($_file_load)){
        require_once($_file_load);
        $_controller_name = $_controller;
        if(class_exists($_controller_name, false)){
            $_controller = new $_controller_name();
            if(method_exists($_controller, $_action)){
                $__r = $_controller->$_action($_REQUEST);
                $json_return = $__r;
            } else
                throw new Exception("Action not found");
        } else
            throw new Exception("Class not found");
    } else
        throw new Exception("File not found");

}catch (Exception $e){
    $json_return["status"] = 0;
    $json_return["data"] = $e->getMessage();
}

die(json_encode($json_return));
