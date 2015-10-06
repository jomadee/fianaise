<?php


class fianaise{
	var $nome = 'Nome';
	var $email = 'E-mail';
	var $complemento = false;
	var $mensagem = 'Mensagem';
	var $retorno = false;
	
	static $local = null;
		
	function __construct(){
		$server = str_replace('\\','/',$_SERVER['SERVER_NAME']);
		$server = (substr($server,-1)=='/'?substr($server,0,strlen($server)-1):$server);
		
		self::$local = 'http://'.str_replace($_SERVER['DOCUMENT_ROOT'], $server, str_replace('\\','/',dirname(__FILE__))).'/';
	}
	
	function form(){
		echo '<form method="post" action="'.self::$local.'include.php" class="fne_form">'
				.(isset($_GET['fne_rt']) ? '<div class="fne_retorno">Depoimento enviado com sucesso!</div>' : '' )
				.'<input type="hidden" value="'.$this->retorno.'" name="retorno">'
				.'<fieldset>'
					.'<div class="fne_nome">'
						.'<label>'.$this->nome.'<label>'
						.'<input name="nome" type="text"/>'
					.'</div>'
					
					.(!$this->email
						?	''
						:	'<div class="fne_email">'
								.'<label>'.$this->email.'<label>'
								.'<input name="email" type="text"/>'
							.'</div>'
					)
					
					.(!$this->complemento
						?	''
						:	'<div class="fne_complemento">'
								.'<label>'.$this->complemento.'<label>'
								.'<input name="complemento" type="text"/>'
							.'</div>'
					)
					
					.'<div class="fne_mensagem">'
						.'<label>'.$this->mensagem.'<label>'
						.'<textarea name="texto"></textarea>'
					.'</div>'
				.'</fieldset>'
				
				.'<span class="botao"><button type="submit">Enviar</button></span>'
			.'</form>';
			
		if(!$this->retorno)
			echo '<script>alert("Defina um retorno para o formulário de depoimentos")</script>';
	}
	
	function lista($limit = 10){
		$lista = mysql_query('select * from '.PREFIXO.'fianaise where status = 1 order by id desc limit '.$limit);
		while($depoimento = mysql_fetch_assoc($lista)){
			echo '<div class="fne_nome">'
					.'<div class="fne_topo">'
						.'<span class="fne_nome">'.$depoimento['nome'].'</span>'
						.(!empty($depoimento['complemento']) ? '<span class="fne_complemento">'.$depoimento['complemento'].'</span>' : '')
					.'</div>'
					.'<div class="fne_mensagem">'.$depoimento['texto'].'</div>'
				.'</div>';
		}
	}
}

if(isset($_POST['texto'])){
	require_once('../../../etc/bdconf.php');
	require_once('../../../includes/jf.funcoes.php');
	
	if(strstr($_POST['retorno'], '?') != false)
		$retorno = $_POST['retorno'].'&';
	else
		$retorno = $_POST['retorno'].'?';
	
	unset($_POST['retorno']);
		
	jf_insert(PREFIXO.'fianaise', $_POST);
	
	header('location: '.$retorno.'fne_rt=ok');
}
?>