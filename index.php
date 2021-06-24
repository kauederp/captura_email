<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRE-SE JÁ!!!</title>
	<link rel="stylesheet" href="css/captura_login.css">
	<link rel="icon" type="imagem/png" href="images/icon_guia.png" />
</head>
<body>
<?php

function send_mail($email,$nome){

	$to_email = $email;
	$subject = "RECEITAS INCRIVEIS - REGISTRO / PDF grátis";
	//$body = "Olá, este é um email que comprova seu registro, clicando no botão abaixo terá acesso ao arquivo do livro de de receitas em PDF.";
	
	$body = "
<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<meta charset='UTF-8'>
	
	<style>
	*{
		box-sizing:border-box;
		margin:0;
		padding:0;
		border:0;
		font-family:sans;
	}
	html,body{
		height:100vh;
	}
	body{
		background-color:#ff8;
	}
	
	main{
		width:100vw;
		margin-top:20vw;
		background-color:rgb(200,200,200);
		padding-bottom:20vw;
	}
	p{
		margin-bottom:10vw;
		
	}
	a{
		margin-left: 35vw;
		background-color:#f00;
		border-radius:10px;
		padding:2vw;
		color:#fff;
		text-decoration:#fff;
		text-transform:uppercase;		
	}

	</style>
</head>
<body>
	<main>
		<p>Olá senhor(a) " . $nome . ", este é um email que comprova seu registro, clicando no botão abaixo terá acesso ao arquivo do livro de de receitas em PDF.</p>
		<a href='https://drive.google.com/file/d/157AL66I0IUu0iDtl6YHt8eyRCi-nog5i/view?usp=sharing'>Acessar</a>
	</main>
</body>
</html>
";

	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=UTF-8';

	$headers[] = "From:kauederp@gmail.com";
	
	if (mail($to_email, $subject, $body, implode("\r\n",$headers))) {
		echo "Email enviado com sucesso para $to_email.";
	} else {
		echo "Falha no envio do email.";
	}
}
if(isset($_POST['enviar'])){
	$email = $_POST['email'];
	$dados = fopen("dados.txt","a+");

	$nome = $_POST['nome'];
	$celular = $_POST['celular'];


	fwrite($dados,"$nome|$email|$celular\n");
	fclose($dados);
	
	send_mail($email,$nome);
	header("location: index.php");
}




?>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
		<h1>cadastro:</h1>
		<label for="nome">Nome completo</label>
        <input required type="text"  pattern="[a-zA-Z]+"  placeholder="ex: John Doe" class="input" name="nome">
        <label for="email">email</label>
		<input required type="email" placeholder="ex: lorem@email.com" name="email" class="input">	 
       <label for="celular">Número de Celular</label>
		<input required type="number" pattern="[0-9]{9,9}" name="celular" placeholder="ex: DDD XXXXX XXXX" class="input">
		<br>
		
	    <input id="enviar" type="submit" name="enviar" value="enviar">
		<label></label>
		<br>
		<input type="hidden" data-privacy="true" name="privacy_policy" value="1">Ao informar meus dados, eu concordo com a <a href="privacy-policy-link" target="_blank">Política de Privacidade</a>.
		<label for="communications">Ao clicar em ENVIAR</label>
		<input required type="checkbox" data-privacy="true" name="communications"  value="1">
	 		Eu concordo em receber comunicações e ofertas personalizadas de acordo com meus interesses, Sendo possível cancelar a qualquer momento o serviço.
	</form>
	<div id="text">
		<h1>Após o cadastro, VOCÊ terá acesso a:</h1>
		<p>Adipisicing doloribus consectetur deserunt commodi quo? Quas enim dolores molestias nesciunt architecto Qui suscipit nobis temporibus illo vero nam? Ratione ipsam exercitationem quas ea dolorem Molestias sequi harum consectetur iste</p>
<br>

	<h1>Também será disponibilizado:</h1>
<img src="images/guloseimas_1.jpg" alt="pudim" class="guloseimas">
	<p>Dolor quaerat nisi dignissimos rem dolor, exercitationem maiores, cum Rerum consequuntur praesentium beatae ut sunt repellat et Id quia provident rem nostrum cupiditate Culpa ex explicabo quidem placeat reiciendis tempora</p>
<img src="images/guloseima_2.jpg" alt="torta de limão" class="guloseimas">
	<p>Lorem a nulla voluptatem est molestias Eligendi adipisci enim quaerat ea sint corporis Cupiditate a expedita dignissimos alias ullam ratione. Expedita optio tempora odio eaque atque Quaerat pariatur rem doloribus</p>
	

	</div>
	<footer>Kauê Delgado Pereira © 2021</footer>
<script src="js/captura_login.js"></script>
</body>
</html>
