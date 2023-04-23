<?php
    require_once 'DB_conection.php';
    require_once 'funciones.php';
    require_once 'consultas.php';

    $html='';
    $errores = array();
    $tipo= $DB_conection->real_escape_string($_POST['respuesta1']);
    if($tipo > 1){
        $tipo=0;
    }
    if(!empty($_POST)){
        $empresa= $DB_conection->real_escape_string(strtoupper($_POST['empresa']));
        
        if(checarRemDes($empresa)){
            $html='
                <div class="error">'.$errores[] ="Escribe un nombre valido".'</div>';
        }
      
        if(empUniExiste($empresa)){
            $html='
                <div class="error">'.$errores[] ="El nombre que trata de registrar ya existe en la DB".'</div>';
        } 
        if(count($errores)==0){
            $nvoEmp=addEmpUni($empresa, $tipo);
            if($nvoEmp >0){
                $html='
                    <div class="success">'.$errores[] ="Se ha registrado el nombre de mepresa".'</div>';
            }
            else{
                
            }
        }
    }
    //echo $html;
    //echo var_dump($destinatario);

    //echo var_dump($html);
    //echo var_dump($errores);

?>