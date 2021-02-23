<?php
 header ('Content-type: application/json; charset=utf-8');

 
/*
  Unitary test for Request Response 
  $respuesta = [];
  $contacto = [ 'name'=> $_POST["name"], 'email' =>$_POST['mail'], 'phone' => $_POST['phone'] , 'message' => $_POST['message']];

array_push($respuesta,$contacto);

  echo json_encode($respuesta);  */
   

 if(isset($_POST))
 {
    $error = [];

  try
  {
          $contacto = [ 'name'=> $_POST["name"], 'email' =>$_POST['mail'], 'phone' => $_POST['phone'] , 'message' => $_POST['message']];
    
          $datos_post = http_build_query(
            $contacto
          );

          $opciones = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $datos_post
            )
          );

          $contexto = stream_context_create($opciones);

          $resultado = file_get_contents('https://prod-01.southcentralus.logic.azure.com:44. . . . . . . . . .7rwQ',
                                          false, $contexto);
    }
    catch (Exception $th)   
    {
      $error = ["Respuesta de error" => $th ];
      echo json_encode($error);
    }


 }
 else
 {
   echo "POST sin argumentos";
 }

 
?>
