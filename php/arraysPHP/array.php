<!--como crear un array-->
<html>
    <body>
        <!--ARRAY BASICO-->
<?php
        /*como crear un array*/
        /* $array es una variable que se puede llamar como quieras mmanolo */
        $array = array( 'javi','albert', 'erik', 'marc'); /* es una palabra reservada que llama a un constructor y escribimos la lista*/

        var_dump($array);/*esto imprime igual que echo y nos da mas informacion de la q necesita pe te dice la sila variable es string, numero*/
        
        var_dump(count(array($array))); /* me cuenta el numero de objetos que hay dentro del arrayen este caso 4*/

        
        echo ('br /'); /*para separar los dos impresores*/

        /* como recorrer ale array */

        for($i=count($array);$i<=0;$i--) { /* al poner -- nos dara la lista a la izquierda */
            echo $array[$i-1].'<br />'; /*se resta menos 1  porque los valores del array van de [0]-[3]*/
                                        /* si en le print ponemos print_r[4] da el mensaje de warning error */
        }
        print_r($array)


        for($i=0; $i<count($array);$i++) { /* al poner ++ nos dara la lista ordenada */
            echo $array[$i].'<br />'; /*se resta menos 1  porque los valores del array van de [0]-[3]*/
                                        /* si en le print ponemos print_r[4] da el mensaje de warning error */
        }

        print_r($array)

?>

<!--PARTE 2 COMO MODIFICAR EL ARRAY Y AÑADIR QUITAR-->
<?php
    $alumnos = array( 'javi','albert', 'erik', 'marc');
    array_push($alumnos, 'montse','desire'); /* consite en añadir cosas dentro del array alumnos */
    print_r($alumnos);
    unset(alumnos [3], $alumonos [4]);/*xa borrar cosas dentro del array con la posicion [3] y elimina erik y [4]  tmb*/
    echo $alumnos[2];  /* para imprimir una sola cosa ECHO xa las listas los otros */

?>

<!--PARTE 4-->
<?php
    $a = array( 1=>'one', 2=>'two',  3=>'three', 4=>'four'); /* 1=> este uno es el key valor y s epuede sustituir por texto o lo que quiereas */
    var_dump ($a);

    print_r($a);

    echo $a;

    $a = array( 'a'=>'one', 'b'=>'two',  'c'=>'three', 'd'=>'four'); /* 1=> este uno es el key valor y s epuede sustituir por texto o lo que quiereas */
    var_dump ($a);
    echo $a['a']; /*me imprime la key valor = a es decir imprime a */

    /* como imprimir todo el array con letras/numeros en el key value */
    /* el foreach recorre todo el array igual q for xo renombrando */

    foreach( $a as $juan){ /*$a es una array contexto y con AS coge cada valor y les asigna posiciones dentro de juan */
        echo $juan.'<br/>'; /*aqui se puede poner texto h*/

    }
    foreach( $a as $juan){ 
        echo '<p><b>'.$juan.'</b></p><br/>';  /*aqui aplicamos html y le cambiamso formatos tmb s epuede añadir style */
    }

?>
<!--parte 5 if/else -->
<!--leer y imprimir cosas en xml -->

<?php


    if(!$xml= simplexml_load_file ('db2.xml')){ /* aqui me indica ! que si falla la carga del archivo me indicara que no se puede cargar */
        echo "No se ha podido cargar";
    }

    else{ /** el$ml hace referencia al list user del xml que hay q exportar */
        foreach($xml as $user){ /* list arrays ( es el objecto q contiene dos arrays users y su contenido) contine dos arrays  llamados users y o que contiene name, mail password...  e */
            echo 'nombre:'.$user->name.'<br />'; /** aqui solo imprimos delist_user--> user--> el name */
            echo 'mail:'.$user->mail.'<br />'; /** aqui solo imprimos delist_user--> user--> el mail */
            //echo 'mail:'.$user->mail.'<br />';/* aqui se llama a los objetos QUE ES  ARRAY DE ARRAYS */
            //echo 'mail:'.$user-['mail'].'<br />';/* aqui se llama aL ARRAY  INDIVIDUAK NO AL OBJETO */
        }

    }
       
?>

 <!--  AÑADIR USUARIO NUEVO A  NUSTRA BBDD como  escribri texto en XML-->
<?php
    $usuarios= new SimpleXMLElement ('db2.xml',0, true); /* es un contuctor que guardara la varaibles dentro de $usuarios antes s e llamba listusers */
    $nuevousuario=$usuario->adddchild('users'); /* addchild añadimos un hijo(creamos la etiqueta users) a usuarios(listusers) */
    $nuevousuario=adddchild('name', 'bernat'); /*añadimos los datos dentro de la lista */
    $nuevousuario=adddchild('mail', 'madof');
    $nuevousuario=adddchild('password', 'madof');
    $nuevousuario=adddchild('time', time());

    //var_dump($usuarios); /** XA IMPRIMIR LO QUE HAY */
    $usuarios-->saveXML('db2.xml'); /* GUARDAR EL USUARIO RECIEN CREADO */








?>

    </body>

</html>