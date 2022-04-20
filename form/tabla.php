<!DOCTYPE html>
<html lang="es">
    <head> 
       
        <meta charset="UTF-8">
        <title> tabla php</title>
        <meta name="Author" content="Javier Iglesias">
        <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
        <meta name="Viewport" content="width=device-with, initia-scale=1">  
        <link rel="stylesheet" href="tablastyle.css">
       
         
    </head>

    <body>        
        <div class="main">
                  
            <table id="clientes">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Mail</th>
                        <th>Password</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>

                    <?php  
                    
                        if(!$xml = simplexml_load_file('db.xml')){
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