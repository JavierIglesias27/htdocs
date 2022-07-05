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
        
       </style>
    </head>
	<body>
    <table >
        <?php
            for($colum=1;$colum<=10;$colum++){ /* aqui ponemosel bucle de las columnas y las llamamos abajo dentro $columa */ 
                echo'<tr>';
                for($fila=1;$fila<=10;$fila++) {
                    //echo "<td>$colum-$fila</td>"; /* al poner el $fila seva incrementando y las dobles comillas permite añadir la variable a q se ejecute la accion*/ 
                    echo '<td>'.$colum. '-'.$fila.'</td>';  /*si pongo comillas simples y concateno mediante el punto y genera igual*/
                } 
             }
             echo'</tr>';
            /*solucion 1 se puede copiar el for de arriba y cambiamos <td>2-$a</td> y lo copio*/
        ?>
              
        </table>
      
	</body>
</html>