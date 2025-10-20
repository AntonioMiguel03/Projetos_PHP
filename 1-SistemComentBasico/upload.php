<?php
	include_once('conexao.php');	
	if(strtolower(substr($_FILES['image']['name'], -3)=="png")or
	strtolower(substr($_FILES['image']['name'], -3)=="jpg"))
	{	
		$nome = $_POST['nome'];
		$email = $_POST['email'];	
		$comentario = $_POST['comentario'];				 
		
		
		$dir = './arquivos/'; 
		$tmpName = $_FILES['image']['tmp_name']; 
		$name = $_FILES['image']['name']; 
		// move_uploaded_file
		if( move_uploaded_file( $tmpName, $dir . $name ) ) { 
				$mysql = new BancodeDados();
				$mysql->conecta();
				$sqlstring = "insert into tabela_comentarios (id, image,nome,email,comentario) values (null, '$name','$nome','$email','$comentario')";
				mysqli_query($mysql->con, $sqlstring);
				header('Location: index.php'); 
		} else {		
			echo "Erro ao gravar o image";	
		}
	}
	//check if file is empty
	else if($_FILES["image"]["error"] == 4)
	{
		
		$nome = $_POST['nome'];
		$email = $_POST['email'];	
		$comentario = $_POST['comentario'];				 
	
		$mysql = new BancodeDados();
		$mysql->conecta();

		echo '<div id = "alinhar_imegem_Padrao"><img src="perfil_Padrao.jpg" width="125px" heigth="200px" /></div>';
		
		$name = "perfil_Padrao.jpg";
			
		$sqlstring = "insert into tabela_comentarios (id, image,nome,email,comentario) values (null, '$name','$nome','$email','$comentario')";
		mysqli_query($mysql->con, $sqlstring);
		header('Location: index.php'); 
	}
	else{
		header('Location: index.php');
	}

?>


