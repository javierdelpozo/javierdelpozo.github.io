<?php

//Correo de destino; donde se enviará el correo.
$correoDestino = "contacto@javierdelpozo.com";

//Texto emisor; sólo lo leerá quien reciba el contenido.
$textoEmisor = "MIME-VERSION: 1.0\r\n";
$textoEmisor .= "Content-type: text/html; charset=UTF-8\r\n";

/*
	Recopilo los datos vía POST
	Con strip_tags suprimo etiquetas HTML y php para evitar una posible inyección.
	Como no gestiona base de datos no es necesario limpiar de inyección SQL.
*/
$nombre = strip_tags($_POST['nombre']);
$correo = strip_tags($_POST['email']);
$telefono = strip_tags($_POST['telefono']);
$empresa = strip_tags($_POST['empresa']);
$comentario = strip_tags($_POST['comentario']);
$fecha = date('j/n/Y');

//Formateo el asunto del correo
$asunto = "javierdelpozo.com - Mensaje de " . $nombre . "  el " . $fecha;

//Formateo el cuerpo del correo

$cuerpo = "<b>Fecha:</b> " . $fecha . "<br /><br />";
$cuerpo .= "<b>Nombre:</b> " . $nombre . "<br />";
$cuerpo .= "<b>E-mail:</b> " . $correo . "<br />";
$cuerpo .= "<b>Teléfono:</b> " . $telefono . "<br />";
$cuerpo .= "<b>Empresa:</b> " . $empresa . "<br /><br />";
$cuerpo .= "<b>Comentario:</b> " . $comentario;

// Envío el mensaje
mail($correoDestino, $asunto, $cuerpo, $textoEmisor);
?>

