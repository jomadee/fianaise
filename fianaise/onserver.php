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

jf_update(PREFIXO.'fianaise', array('status' => ($_GET['status'] == 1 ? "0" : "1")), array('id' => $_GET['id']));
header('location: '.$_ll['app']['home']);
?>