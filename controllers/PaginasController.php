<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController{
    public static function index(Router $router){

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades'=>$propiedades,
            'inicio' => $inicio,
        ]);
    }
        
    public static function nosotros(Router $router){

        $router->render('paginas/nosotros',  [
        ]); 
    }
    
    public static function propiedades(Router $router){

        $propiedades = Propiedad::get(9);

        $router->render('paginas/propiedades',  [
            'propiedades'=>$propiedades,
        ]); 
    }

    public static function propiedad(Router $router){

        $id = validarRedireccionar('/');
        $propiedad = propiedad::find($id);

        $router->render('paginas/propiedad',  [
            'propiedad'=>$propiedad,
        ]); 


    }

    public static function blog(Router $router){
        $router->render('paginas/blog',  [
        ]); 

    }

    public static function entrada(Router $router){
        $router->render('paginas/entrada',  [
        ]); 

    }

    public static function contacto(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $respuesta = $_POST['contacto'];
            debuggear($respuesta); 
            //crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // Configure SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'f7eab0e708e354';
            $mail->Password = '68360dcd506399';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo Email';

            // Habilitar Html
            $mail->isHTML(true);
            $mail->CharSet = 'utf-8';

            // Definir COntenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje: </p><br>';
            $contenido .= '<p>Nombre: '.$respuesta['nombre'].'</p><br>';
            $contenido .= '<p>Correo: '.$respuesta['email'] .'</p><br>';
            $contenido .= '<p>Telefono: '.$respuesta['telefono'] .'</p><br>';
            $contenido .= '<p>Mensaje: '.$respuesta['mensaje'] .'</p><br>';
            $contenido .= '<p>Vende o Compra: '.$respuesta['tipo'] .'</p><br>';
            $contenido .= '<p>Precio o Presupuesto: $.-'.$respuesta['precio'] .'</p><br>';
            $contenido .= '<p>Prefiere ser contactado: '.$respuesta['contacto'] .'</p><br>';
            $contenido .= '<p>Fecha de contacto: '.$respuesta['fecha'] .'</p><br>';
            $contenido .= '<p>Hora: '.$respuesta['hora'] .'</p><br>';
            $contenido .= '</html>';
             
            $mail->Body = $contenido;
            $mail->AltBody = 'Mensaje alternativo al html';
            
            
            //Enviar email
            /*             debuggear($mail); */
            if($mail->send()){
                echo 'Mensaje enviado';
            }
            if(!$mail->send()){
                echo 'ERROR no se pudo enviar el email 234234...';
            }
        } 
        $router->render('paginas/contacto',  [

        ]); 

    }
}



?>