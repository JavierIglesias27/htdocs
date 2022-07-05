<html>
	<body>
		<?php
		/*
			$manolo = array('hosni','erik', 'marc', 'raquel');
			var_dump($manolo);
			echo '<br />';
			echo '<br />';
			print_r($manolo);
			echo '<br />';
			echo '<br />';
			echo count($manolo);
			echo '<br />';
			echo '<br />';
			var_dump(4.52);
			echo '<br />';
			echo '<br />';
			var_dump(count($manolo));
			echo '<br />';
			echo '<br />';
			
			for($i=0;$i<count($manolo);$i++){
				echo $manolo[$i].'<br />';
			}
			*/
		?>
		
		<?php
		/*
			$alumnos = array('hosni','erik', 'marc', 'raquel');
			array_push($alumnos,'mon','desire');
			print_r($alumnos);
			echo '<br />';
			echo '<br />';
			unset($alumnos[3]);
			print_r($alumnos);
			echo '<br />';
			echo '<br />';
			echo $alumnos[2];
		*/
		?>
		<?php
		/*
			$a = array('a' => 'one','b' => 'two','c' => 'three');
			var_dump($a);
			echo '<br />';
			echo '<br />';
			print_r($a);
			echo '<br />';
			echo '<br />';
			echo $a['b'];
			//echo $a[1];
			echo '<br />';
			echo '<br />';
			foreach($a as $value){
				echo '<p><b>'.$value.'</b></p><br />';
			}
			*/
		?>
		<?php
		/*
			if(!$xml = simplexml_load_file('db2.xml')){
				echo "No se ha podido cargar el archivo";
			} else {
				foreach ($xml as $user){
					echo 'Nombre: '.$user->name.'<br>';
					echo 'Email: '.$user->email.'<br>';
					echo 'Email2: '.$user['email'].'<br>';
				}
			}
			*/
		?>
		<?php
		/*
			$usuarios = new SimpleXMLElement('db2.xml', 0, true);
			$nuevoUsuario = $usuarios->addChild('user');
			$nuevoUsuario->addChild('name', 'Bernard');
			$nuevoUsuario->addChild('email', 'Madoff');
			$nuevoUsuario->addChild('password', 'Madoff');
			$nuevoUsuario->addChild('time', time());
			//var_dump($usuarios->user[2]);
			//var_dump($usuarios);
			//$usuarios->saveXML('db2.xml');
		*/
		?>
	</body>
</html>