<?php
 header ('Content-type: application/json; charset=utf-8');

 
/*
  $respuesta = [];
  $contacto = [ 'name'=> $_POST["name"], 'email' =>$_POST['mail'], 'phone' => $_POST['phone'] , 'message' => $_POST['message']];

array_push($respuesta,$contacto);

  echo json_encode($respuesta);  */

   //"https://prod-01.southcentralus.logic.azure.com:443/workflows/14a2f5fd554f4ce9a8088839c33cba03/triggers/request/paths/invoke?api-version=2016-10-01&sp=%2Ftriggers%2Frequest%2Frun&sv=1.0&sig=_gf-rrC-sg9NtLrsJKgj1Wxcd1vyrOWZB_NYVj37rwQ"
   //https://prod-01.southcentralus.logic.azure.com:443/workflows/14a2f5fd554f4ce9a8088839c33cba03/triggers/request/paths/invoke?api-version=2016-10-01&sp=%2Ftriggers%2Frequest%2Frun&sv=1.0&sig=_gf-rrC-sg9NtLrsJKgj1Wxcd1vyrOWZB_NYVj37rwQ

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

          $resultado = file_get_contents('https://prod-01.southcentralus.logic.azure.com:443/workflows/14a2f5fd554f4ce9a8088839c33cba03/triggers/request/paths/invoke?api-version=2016-10-01&sp=%2Ftriggers%2Frequest%2Frun&sv=1.0&sig=_gf-rrC-sg9NtLrsJKgj1Wxcd1vyrOWZB_NYVj37rwQ',
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