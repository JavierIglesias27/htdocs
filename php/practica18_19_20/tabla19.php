<!DOCTYPE html>
<html lang="ca">
    <head> 
       
        <meta charset="UTF-8">
        <title> tabla10x10 </title>
        <meta name="Author" content="Javier Iglesias">
        <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
        <meta name="Viewport" content="width=device-with, initia-scale=1">  
       <style>
    
           table, td, th {
            /*border: 1px solid black; aqui no haria falta poner el raduis*/
            border-style: solid;
            border-color:black; 
            border-width: 1px;
            border-radius:0px;
            text-align: center;
             }
            table{
               width:100%;
               border-collapse: collapse; /*te quita el borde de cada uno y te lo unifica*/
            }
            td,th {
                padding:15px; /*amplio el recuadro xq q  sea mas ancho*/
                margin: 0px; 
            }
            .color_blue{
                background-color: blue; /*creamos la clase blue y la green */
            }
            .color_green{
                background-color: green;
            }
        
       </style>
    </head>
	<body>
    <table >
        <?php
            for($colum=1;$colum<=10;$colum++){ 
                echo'<tr>';
                for($fila=1;$fila<=10;$fila++) {
                    if($colum%2==0 &$fila%2==0){
                        echo '<td class="color_blue">'.$colum.'-'.$fila.'</td>'; 
                        }
                     else if($colum%3==0 &$fila%3==0){
                        echo '<td class="color_green">'.$colum.'-'.$fila.'</td>'; 
                      // break;  /*si aplica este break solo me pintara en verde hasta la primeA COLUMNA verde q encuntre */
                     }  

                    else {
                        echo '<td>'.$colum.'-'.$fila.'</td>'; 
                    }  
                }
            }
             echo'</tr>';
            
        ?>
              
        </table>
      
	</body>
</html>