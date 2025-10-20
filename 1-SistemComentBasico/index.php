<html>

 <head>
  <link rel="stylesheet" href="monitor_notebook.css" type="text/css">
 </head>

 <body>

  <form action="upload.php" method="POST" enctype="multipart/form-data">
  
	<div>
		<label for="image">
		   <img class="circular_square" id = "blah" src="perfil_Padrao.jpg" with="100px" height="100px" />
		</label>
		<!-- Previsualizar imagem = onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" -->
		<input id="image" type="file" name="image" id="arquivo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="display: none" />
	</div>
	   <label for="nome">Nome:</label> <input type="text" name="nome" id="nome" required="required" />
	   <br><br>
	   <label for="email">Email:</label> <input type="email" name="email" id="email" required="required"/>
	   <br><br>
	   <label> Comentario: <br>
		<textarea name="comentario" class="Input" style="width: 400px" required></textarea>
	   </label>
	   <br><br>
	   <input type="submit" value="Comentar" oncLick="envio()"/>


	</form>
	<h1>Comentarios</h1>
	

<?php
	include_once('conexao.php');
	//criando o objeto mysql e conectando ao banco de dados
	$mysql = new BancodeDados();
	$mysql->conecta();
	
	$sqlstring = 'select * from tabela_comentarios order by id desc';
	$query = @mysqli_query($mysql->con, $sqlstring);
	while ($dados = @mysqli_fetch_array($query)){
		echo '<hr>';
		echo '<div id = "fundo2">';
		echo '<br><div id = "alinhar_imegem">';
		echo "<img class='circular_square' src='arquivos/".$dados['image']."' width='125px' heigth='200px'>";
		echo '</div>';
	    echo '<div id = "formulario">';
		echo '</br><b>'.$dados['nome'] . '</b></br>';
		echo $dados['comentario']. '<br></br>';
		echo '</div>';
		echo '</div>';
	}
	$mysql->fechar();	
?>

 </body>
 
 <script>
function envio() {
 var   f = document.getElementById('image').value;
 var   n = document.getElementById('nome').value;
 var   a = document.getElementById('email').value;
 var   d = document.getElementById('comentario').value;
 var ext = f.substring(f.lastIndexOf('.') + 1);
if (f != "" && n != "" && a != "" && d != "" && (ext == "jpg" || ext=="png")) {
	alert("Seus dados foram enviados com sucesso!");
}
else{
	alert("Insira seus dados corretamente!");
}
}
</script>

</html>