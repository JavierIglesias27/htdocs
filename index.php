<!DOCTYPE html>
<html lang="ca">
    <head> 
       
        <meta charset="UTF-8">
        <title> instal XAMP </title>
        <meta name="Author" content="Javier Iglesias">
        <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
        <meta name="Viewport" content="width=device-with, initia-scale=1">  
       
    </head>
	<body>
		<h1>Start!!!!!!</h1>
        
        <ul>
        <?php /*aqui abrimos php*/ 

          echo ' <p> COMENTARIO 1 COMO FUNCIONA PHP BASICO </p>';
          $a=1;  /*  $ es una variable para numeros enteros (INT), llamada a y que su valor es 1*/
          $a1='2';  /* al ponerlo entre comillas es string-texto */
          $a2= 2.3;  /* el punto me indica el numero de decimales que hay despues del punto */
          $b='hola'; /* al poner comillas simple el coste de procesamiento es mejor/ */
          $c="hola";  /* al poner comillas dobles el coste de procesamiento es mas grande/ */
          echo $a+$a1; /* esto es lo q te ejecuta la a y a1 y me da de resultado 3 */ 
          echo $b.$c ;/*para concatenar dos textos se hace mediante el punto */
            echo $a.$a1;
           echo $a+$a2;
        
           echo '<p> funcion while esta haciendo bucle y le incluimos lista </p>';
            $num1=1;
           $num2=1;
           while ($num2<=10)
            {
                echo '<li>' .$num1+$num2++.'</li>'; /* num2++ me indica que se suma num 1+num2+1 SI PONES -- RESTA */
                                                    /* se puede aplicar una lista dentro del while  */
                                                    /*podmemos aplicar html el . '<br />'  */
           }

           echo '<p> funcion while esta haciendo bucle y le hacemos br /</p>';
           $num1=1;
           $num2=1;
           while ($num2<=10)
            {
                echo $num1+$num2++.'<br />'; /* num2++ me indica que se suma num 1+num2+1 SI PONES -- RESTA */
                                                    /* se puede aplicar una lista dentro del while  */
                                                    /*podmemos aplicar html el . '<br />'  */
           }
       
            echo '<p>otra forma de escribirlo </p>';
           $num1=1;
            $num2=1;
          while ($num2<=10)
           {
               echo $num1+($num2=$num2+1); /* es exactamente lo mismo que lo de arriba*/
           }
    
    
            echo '<p>la manera de un numero mayor hay q ponerlo como num2+5</p>';
            $num1=1;
            $num2=1;
           $num2=$num2+5;
            $num2++; // $num 2+1 =2
            $num2++; // $num 2+1=3
            echo $num2;

        echo '<p>bucle  FOR</p>';
            for  ($i=1; $i<10; $i++) { /* puedes poner $i=$i+1  */
                echo $i;
            }
        echo '<p>bucle  FOR con lista </p>';
            for  ($i=1; $i<10; $i++) { /* puedes poner $i=$i+1  */
                echo  '<li>'.$i.'</li>';
            }

        echo '<p>bucle  FOR con if </p>';

        for  ($i=1; $i<10; $i++) { 
            if($i>4){ /* pone la condicion que sea mayor a 4 xa q empieza a sumar */
                echo  '<li>'.$i.'</li>';

            }
        }         

        ?><!-- al poner esto indico q cierro php-->
      </ul>
		<h1>finish!!!!!</h1>
	</body>
</html>
