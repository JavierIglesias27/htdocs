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
        $tr='<tr>';
        $trc='</tr>' ;
        $td= '<td class="color_blue">' ;
        $td2= '<td class="color_green">';
        $var1= '-';
        $tdc= '</td>';
        $tda= '<td>';


            for($colum=10;$colum>=0;$colum--){ 
                echo $tr;
                for($fila=10;$fila>=0;$fila--) {
                    if($colum%2==0 &$fila%2==0){
                        echo $td.$colum.$var1.$fila.$tdc; 
                        }
                     else if($colum%3==0 &$fila%3==0){
                        echo $td2.$colum.$var1.$fila.$tdc; 
                      // break;  /*si aplica este break solo me pintara en verde hasta la primeA COLUMNA verde q encuntre */
                     }  

                    else {
                        echo $tda.$colum.$var1.$fila.$tdc; 
                    }  
                }
            }
             echo $trc;
            
        ?>
              
        </table>
      
	</body>
</html>