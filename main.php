<?php

require_once __DIR__ . '/vendor/autoload.php';

use Reweb\Job\Backend;

$caixaEletronico = new Backend\CaixaEletronico;

//NECESSARIO PARA INICIAR QUALQUER TIPO DE TRANSAÇÃO
//CASO NÃO SEJA SETADA ESTA FUNÇÃO, A FUNÇÃO CONSTRUCT DO PHP UTILIZARA A CONTA CORRENTE (0) POR DEFAULT
echo $caixaEletronico->selecionaConta(1);

//ESPERA UM PARAMETRO (valorSaque)
echo $caixaEletronico->saque(500);

//ESPERA UM PARAMETRO (valorDeposito)
echo $caixaEletronico->deposito(1000); 

//ESPERA DOIS PARAMETROS (valorTransferido, contaDestino)
echo $caixaEletronico->transferencia(2000, 1);
