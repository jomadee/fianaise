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

$navigi = new navigi();
$navigi->tabela = PREFIXO.'fianaise';
$navigi->query = 'select * from '.$navigi->tabela.' order by id desc';
$navigi->delete = true;
$navigi->exibicao = 'lista';

$navigi->paginacao = 20;

$navigi->configSel = 'status';

$navigi->config['1']['botao'] = 
$navigi->config['0']['botao'] = 
							array(
								array(
								'link' => $_ll['app']['sen_html'].'&id=#ID', 
								'modal' => '430xauto')
							);
							
$navigi->config['1']['botao'][0]['fa'] = 'fa-eye';
$navigi->config['1']['botao'][0]['class'] = 'bt_ativo';
$navigi->config['0']['botao'][0]['fa'] = 'fa-eye-slash';
	
echo app_bar('Fianaise', null)
	.'<div class="boxCenter">'
		.$navigi->monta(true)
	.'</div>';
?>