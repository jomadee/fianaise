<?php
/**
*
* Fianaise | lliure 7.x
*
* @Versão 1.0
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.newsmade.com.br/
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

$depoimento = mysql_fetch_assoc(mysql_query('select * from '.PREFIXO.'fianaise where id = "'.$_GET['id'].'" limit 1'));
$link = $_ll['app']['onserver'].'&id='.$depoimento['id'].'&status='.$depoimento['status'];

echo '<div class="depoimento">'
		.'<h2>Depoimento '.str_pad($depoimento['id'], 7, 0, STR_PAD_LEFT).'</h2>'
		.'<div><span>Nome</span>'.$depoimento['nome'].'</div>'
		.(!empty($depoimento['email']) ? '<div><span>E-mail</span>'.$depoimento['email'].'</div>' : '')
		.(!empty($depoimento['complemento']) ? '<div><span>Complemento (Formação, cargo, empresa...)</span>'.$depoimento['complemento'].'</div>' : '')
		.'<div><span>Mensagem</span>'.$depoimento['texto'].'</div>'
		.'<span class="botao"><a href="'.$link.'">'.($depoimento['status'] == 1 ? 'Ocultar' : 'Exibir'). '</a></span>'
	.'</div>';

?>