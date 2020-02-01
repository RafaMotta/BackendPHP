<?php

namespace Reweb\Job\Backend;

/**
 * Classe de exemplo
 *
 * @author Marcelo Jean <mjean@reweb.com.br>
 */
class CaixaEletronico
{
    /**
     * M�todo de exemplo
     *
     * @return string
     */

    

    private $tipoConta; // 0 = conta corrente / 1 = conta poupança
    protected $limiteContaCorrente = 600;
    protected $limiteContaPoupanca = 1000;
    protected $contaDestinoTransferencia;

    function __construct(){
        $this->selecionaConta($this->tipoConta);
    }

    public function selecionaConta($conta)
    {
        if($conta == 0){
            $this->tipoConta = 0;
        }else{
            $this->tipoConta = 1;
        }
    }

    public function verificaLimiteSaque($tipoConta)
    {
       if($tipoConta == 0){
            $limiteConta = $this->limiteContaCorrente;
       }else{
            $limiteConta = $this->limiteContaPoupanca;
       }
       return $limiteConta;
    }

    public function verificaSaldo($tipoConta)
    {
       if($tipoConta == 0){
            $saldo = $this->limiteContaCorrente;
       }else{
            $saldo = $this->limiteContaPoupanca;
       }
       return $saldo;
    }


    public function descontoSaque($tipoConta)
    {
        if($tipoConta == 0){
            $valorFinalConta = $this->limiteContaCorrente -= 2.5;
       }else{
            $valorFinalConta = $this->limiteContaPoupanca -= 0.80;;
       }
       return $valorFinalConta;
    }

    public function saque($valor)
    {
        if($this->tipoConta == 0){
            if($this->limiteContaCorrente-$valor > 0){
                $this->limiteContaCorrente -= $valor;
                $this->descontoSaque($this->tipoConta);
                return "\nSaque realizado com sucesso! Seu saldo atual é de: B$ ". $this->limiteContaCorrente;
            }else{
                return "\nSem limite para o saque";
            }
            
        }else{
            if($this->limiteContaPoupanca-$valor > 0){
                $this->limiteContaPoupanca -= $valor;
                $this->descontoSaque($this->tipoConta);
                return "\nSaque realizado com sucesso! Seu saldo atual é de: B$ ". $this->limiteContaPoupanca;
            }else{
                return "\nSem limite para o saque";
            }
        }
    }

    public function deposito($valor)
    {
        if($this->tipoConta == 0){
            $valorFinalConta = $this->limiteContaCorrente += $valor;
       }else{
            $valorFinalConta = $this->limiteContaPoupanca += $valor;
       }
       return "\nDepositado com sucesso! Saldo atual da conta é de: B$ " . $valorFinalConta;
    }

    public function transferencia($valorTransferencia, $contaDestino)
    {
        if($this->tipoConta == 0){
            if($this->limiteContaCorrente - $valorTransferencia > 0){
                $this->limiteContaCorrente -= $valorTransferencia;
                $this->contaDestinoTransferencia += $valorTransferencia;
                return "\nTransferido com sucesso! Saldo atual da conta é de: B$ " . $this->limiteContaCorrente;
            }else{
                return "\nValor a ser transferido excede saldo da conta";
            }
       }else{
            if($this->limiteContaPoupanca - $valorTransferencia > 0){
                $saldoAtual = $this->limiteContaPoupanca -= $valorTransferencia;
                $this->contaDestinoTransferencia += $valorTransferencia;
                return "\nTransferido com sucesso! Saldo atual da conta é de: B$ " . $this->limiteContaPoupanca;
            }else{
                return "\nValor a ser transferido excede saldo da conta";
            }          
       }      
    }

}
