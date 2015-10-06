<?php
require_once('../../../etc/bdconf.php');
require_once('../../../includes/jf.funcoes.php');
require_once('include.php');

$depoimentos = new fianaise();

//$depoimentos->complemento = false;
$depoimentos->email = false;
$depoimentos->retorno = 'http://localhost/b/bbbloom/sistema/app/fianaise/sys/teste.php?teste=teste';
$depoimentos->form();


$depoimentos->lista();