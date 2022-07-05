<!DOCTYPE html>
<html lang="es">
    <head> 
       
        <meta charset="UTF-8">
        <title> formulario php</title>
        <meta name="Author" content="Javier Iglesias">
        <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
        <meta name="Viewport" content="width=device-with, initia-scale=1">  
       <style>
           body{
				background-color:#848484;
			}
			.main{
				background-color: #f2f2f2;
				margin: 5%;
				border-radius: 5px;
			}
			.center{
				margin: auto;
				width:30%;
				padding:10px;
				text-align:center;
			}
			label{
				text-align:left;
				display:block;
			}
			.input_text{
				width:99%;
            }
		
       </style>
    
    </head>


<body>

<?php
    $name ='';
    $email='';
    $password='';
    $save1=false;
    $save2=false;
    $save3=false;
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") { /*$server variable predeterminada para hacer metodo post/get*/ 
        if(! empty($_POST['fname'])){
            $name = $_POST['fname']; /*sil avariable no esta vacia se pone lo q esta en name */
            $save1=true; /**boleano q me indica q si un campo esta vacio no me lo dara */
            //echo $name.'<br />' ; /* lo comento para que me imprima en el recuadro */
        }
    }
    echo var_dump($save1);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(! empty($_POST['email'])){
            $email = $_POST['email'];
            //echo $email.'<br />' ;
            $save2=true;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(! empty($_POST['password'])){
            $password = $_POST['password'];
            //echo $password.'<br />' ;
            $save3=true;
        }
    }

    /*
    else{
        $name = $_POST['fname'];
            if (empty($name)) {
                echo "Name is empty";
            } else {
                echo $name;
            }
    } */
    
?>   
<div class="main">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div class="center" >
					<label for="fname">Name:</label>
					<input type="text" name="fname" placeholder="Your name.." class="input_text" value="<?php echo $name;?>"> <!--el value sirve xa que al enviar los datos me los mantega-->
				</div>
				<div class="center">
					<label for="email">Email:</label>
					<input type="text" name="email" placeholder="Your mail.."class="input_text" value="<?php echo $email;?>">
				</div>
				<div class="center">
					<label for="password">Password:</label>
					<input type="password" name="password" placeholder="Your password" class="input_text" value="<?php echo $password;?>">
				</div>
				<div class="center">
					<input type="submit">
				</div>
			</form>
		</div>
<style>
    .asd {
        margin-left:20px;
    }
</style>

<?php
$save=false;
if($save1&$save2&$save3)  {
            $save=true;
        }
        else{
            $name="";
            $email="";
            $password="";
         };
echo var_dump($save1);
?>


<div class="main">
    <div class="asd">
        <p>Nombre: <?php echo $name; ?></p>
    </div>
    <div class="asd">
        <p>Mail <?php echo $email; ?></p>
    </div>
    <div class="asd">
        <p>Password <?php echo $password; ?></p>
    </div>

</div>
<style>
   
table, th, td {
border:1px solid black;

}
</style>

<div class="main">
        <?php
        echo var_dump($save1);
        if($save1&$save2&$save3)  {

            echo "yes";
            
        
            //write q ya lo tengo hecho
                $usuarios = new SimpleXMLElement('tablaform3_post.xml', 0, true);
                $nuevoUsuario = $usuarios->addChild('user');
                $nuevoUsuario->addChild('name', $name); /* */
                $nuevoUsuario->addChild('email', $email);
                $nuevoUsuario->addChild('password', $password);
                $nuevoUsuario->addChild('time', time());
                //var_dump($usuarios->user[2]);
                //var_dump($usuarios);
            $usuarios->saveXML('tablaform3_post.xml');
                unset($_POST['fname']);
                unset($_POST['email']);
                unset($_POST['password']);
                header("location:".$_SERVER['PHP_SELF']); /*con esto le indico queno me repita los datos al introducirlos */
            //print_r($_POST);
        }
                ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Mail</th>
                <th>password</th>
                <th>time</th>
            </tr>
        </thead>
        <tbody>

            <?php  
            
                if(!$xml = simplexml_load_file('tablaform3_post.xml')){
                            echo "No se ha podido cargar el archivo";
                        } else {
                            foreach ($xml as $user){
                                echo '<tr>';
                                    echo '<td>'.$user->name.'</td>'; 
                                    echo '<td>'.$user->email.'</td>';
                                    echo '<td>'.$user->password.'</td>';
                                    echo '<td>'.$user->time.'</td>';
                                echo'</tr>';
                            }
                        }         
            ?>
            
                    
            
        </tbody>    
    </table>
    
</div>
    

              
</body>
    </html>