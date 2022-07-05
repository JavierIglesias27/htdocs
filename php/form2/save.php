<!DOCTYPE html>
<html lang="es">
    <head> 
       
        <meta charset="UTF-8">
        <title>Save php</title>
        <meta name="Author" content="Javier Iglesias">
        <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
        <meta name="Viewport" content="width=device-with, initia-scale=1">  
        <link rel="stylesheet" href="style.css">
    			
        
    </head>
    <body>

        <?php
            $name ='';
            $email='';
            $password='';
            $pais='';
            $radio='';
            $edad='';
            $terms=0;
            $cond=0;
            $save1=false;
            $save2=false;
            $save3=false;
            $save4=false;
            $save5=false;
            $save6=false;
           
            
            

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(! empty($_POST['fname'])){
                            $name = $_POST['fname'];
                            $save1=true;
                        }
                    
                        if(! empty($_POST['email'])){
                            $email = $_POST['email'];
                            $save2=true;
                        }
                   
                        if(! empty($_POST['password'])){
                            $password = $_POST['password'];
                            $save3=true;
                        }
                  
                        if(! empty($_POST['pais'])){
                            $pais = $_POST['pais'];
                            $save4=true;
                        }
                        if(! empty($_POST['radio'])){
                            $radio = $_POST['radio'];
                            $save5=true;
                        }
                        if(! empty($_POST['edad'])){
                            $edad = $_POST['edad'];
                            $save6=true;
                        }
                        if(!empty($_POST['terms'])){
                            $terms = 1;       
                        }
                        if(!empty($_POST['cond'])){
                            $cond = 1;    
                        }
                    }

        ?>     

        <div class="main2">
    
            <div class=" center left ">
                <p class="<?php if(!$save1){echo 'red';} else {echo 'green';} ?>">Nombre: <?php echo $name; ?></p>  
                <?php
                if(strlen($_POST['fname'])<=2) {
                                    echo "minimo 2 caracteres";        
                            }
                ?>
            </div>
            <div class="center left">
                <p class="<?php if(!$save2){echo 'red';} else {echo 'green';} ?>"  >Mail: <?php echo $email; ?></p> 
                <?php
               
               if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
               {
                   echo "Error al introducir mail" ;
               }
                ?>

            </div>
            <div class="center left">
                <p class="<?php if(!$save3){echo 'red';} else {echo 'green';} ?>" >Password: <?php echo $password; ?></p>
            </div>
            
            <div class="center left">

               <p class="<?php if(!$save4){echo 'red';} else {echo 'green';} ?>">Pais: <?php echo $pais; ?> </p>

            </div>
            <div class="center left">

               <p class="<?php if(!$save5){echo 'red';} else {echo 'green';} ?>">Radio: <?php echo $radio;?> </p>
            </div>
            <div class="center left">

             <p class="<?php if(!$save6){echo 'red';} else {echo 'green';} ?>">Edad: <?php echo $edad;?> </p>

            </div>  

            <div class="center left">

               <p class="<?php if($terms==0){echo 'orange';} else {echo 'green';} ?>">terms: <?php echo $terms;?> </p>

            </div>
            <div class="center left">

                <p class=" <?php if($cond==0){echo 'orange';} else {echo 'green';} ?>">cond: <?php echo $cond;?> </p>
            </div>  

               <?php
               print_r($_POST); /*aqui es una fecha */

               print_r(strtotime($_POST['edad'])); /*con strtotime me hace el cambio de fecha a numero y lo aplico abajo */


               ?>
        </div>

       <div class="main3">
            <div class=" center">
                    
                <?php
            
                            if($save1&$save2&$save3&$save4&$save5&$save6)  {
                               
                                    $usuarios = new SimpleXMLElement('db.xml', 0, true);
                                    $nuevoUsuario = $usuarios->addChild('user');
                                    $nuevoUsuario->addChild('name', $name); 
                                    $nuevoUsuario->addChild('email', $email);
                                    $nuevoUsuario->addChild('password', $password);
                                    $nuevoUsuario->addChild('radio', $radio);
                                    $nuevoUsuario->addChild('pais', $pais);
                                    $nuevoUsuario->addChild('edad', strtotime($_POST['edad']));
                                    $nuevoUsuario->addChild('terms', $terms);
                                    $nuevoUsuario->addChild('cond', $cond);
                                    $usuarios->saveXML('db.xml');
                                   /*
                                   unset($_POST['name']);
                                    unset($_POST['email']);
                                    unset($_POST['password']);
                                    unset($_POST['pais']);
                                    unset($_POST['radio']);
                                    unset($_POST['edad']);
                                    unset($_POST['terms']);
                                    unset($_POST['cond']);

                                    */

                                    //header("location:".$_SERVER['PHP_SELF']);   
                                    echo '<form method="POST" action=".\tabla.php">
                                    <div>
                                    <input  id="btn1" type="submit" Value="Enviar a"  >
                                    </div>
                                    </form>';

                                    echo 'Guardando datos...' ;'<input type="summit">';
                            }
                            

                            else {
                                    echo '<form method="POST" action=".\index.php">
                                    <div >
                                    <input id="btn2" type="submit" value="Enviar a" >
                                    </div>
                                    <input type="hidden" name="fname" value="'.$name.'" >
                                    <input type="hidden" name="email" value="'.$email.'" >
                                    <input type="hidden" name="password" value="'.$password.'" >
                                    <input type="hidden" name="pais" value="'.$pais.'" >
                                    <input type="hidden" name="radio" value="'.$radio.'" >
                                    <input type="hidden" name="edad" value="'.$edad.'" >
                                    <input type="hidden" name="terms" value="'.$terms.'" >
                                    <input type="hidden" name="cond" value="'.$cond.'" >
                                    
                                    </form> ';

                                    echo 'Volviendo al inicio...' ;'<input type="summit">';
                            }                             
                    ?>    
            </div>   
        </div>           
    </body>
</html>
