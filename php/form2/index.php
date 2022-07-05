<!DOCTYPE html>
<html lang="es">
    <head> 
       
        <meta charset="UTF-8">
        <title> Index php</title>
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
                       
                    }
        ?>     
    
        <div class="main">
                <form method="POST" action=".\save.php">
                    <div class="center texto" >
                        <label for="fname">Name:</label>
                        <input type="text" name="fname" placeholder="Insert Name"  class="input_text" value="<?php echo $name;?>">
                    </div>
                    <div class="center texto">
                        <label for="email">Email:</label>
                        <input type="mail" name="email" placeholder="usuario@gmail.com"  class="input_text" value="<?php echo $email;?>">
                    </div>
                    <div class="center texto">
                        <label for="password">Password:</label>
                        <input type="password" name="password"  placeholder="Insert Password"class="input_text" value="<?php echo $password;?>">
                    </div>

                    <div class="center texto">
                        <label for="edad">Edad:</label>
                        <input type="date" name="edad"  min="2022-01-01" max="2022-12-31" value="<?php echo $edad;?>">
                    </div>

                    <div class="center texto">
                        
                        <label for="pais">Pais:</label >
                    
                        <select class="center texto" id="pais" name="pais" required>
                            <?php  echo '$pais'; ?>
                        <option <?php if($pais=='ES'){echo 'selected';}?> value="ES">España</option>
                            <option <?php if($pais=='IT'){echo 'selected';}?>  value="IT">Italia</option>
                            <option  <?php if($pais=='FR'){echo 'selected';}?> value="FR">Francia</option>
                            <option  disabled  value=""></option>


                        </select>
                    </div>
                    <div class="center texto">

                        <p  class="texto">¿Lenguaje programación preferido?</p>

                        <div class="verde"  >
                            <input type="radio" id="html" name="radio" <?php if($radio=='H'){echo 'checked';}?>  value="H"> <!-- name =lenguaje es igual xa todos xq quiero que solo se seleccione una de las opciones y luego lo llamare asi en el post-->
                            <label  class="linea" for="html">HTML</label>
                            
                            <input type="radio" id="css" name="radio" <?php if($radio=='C'){echo 'checked';}?>  value="C" >
                            <label  class="linea" for="css">CSS</label>
                        
                            <input type="radio" id="js" name="radio" <?php if($radio=='J'){echo 'checked';}?>  value="J">
                            <label class="linea" for="js">JS</label>

                            <input type="radio" id="php" name="radio" <?php if($radio=='P'){echo 'checked';}?>  value="P">
                            <label class="linea" for="php">PHP</label>
                        </div> 
                        
                    </div>
                    <div class="right">
                        <input type="checkbox"  id="terms" name="terms"  <?php echo !empty($_POST['terms']) ? 'checked="checked"' : ''; ?>   value="1">
                        <label class="linea" for="terms"> Acepto terminos de uso</label>


                        <br />
                        <input type="checkbox"  id="cond" name="cond" <?php echo !empty($_POST['cond']) ? 'checked="checked"' : ''; ?>  value="1">
                        <label class="linea" for="cond">Consentimiento de tratar datos</label>

				    </div>
                    
                   <div class="center">
                        <input  id="btn" type="submit" value="Enviar a">
                        <input  id="btn"type="reset" value="Reset">
                    </div>
                   
                </form>
        </div>      
    </body>
</html>