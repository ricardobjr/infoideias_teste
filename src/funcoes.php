<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        
        $seculo = $ano / 100;

        if($seculo < 100){
            return $seculo +1;
        }
        else
        {
            return $seculo;
        } 
    }

    
	
	
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {
        $contador = 0;
        $numero = $numero -1;
        $numeroPrimioAnterior = 0;

        for( $i = $numero; $i > 0; $i-- )
        {
            for($j = 1; $j < $i; $j++)
            {
                if( ($i % $j == 0) )
                {
                    $contador++;
                }
            }

            if($contador == 1){
                $numeroPrimioAnterior = $i;
                break;
            }
            else
            {
                $contador = 0;
            }

        }
        return $numeroPrimioAnterior;
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $arrayComMaioresValores = [];
        $aux = 0;
        for($i = 0 ; $i < count($arr) ; $i++)
        {
            for($i2 = 0 ; $i2 < count($arr[0]) ; $i2++)
            {
                if($arr[$i][$i2] > $aux)
                {
                    $aux = $arr[$i][$i2];
                }
            }
            $arrayComMaioresValores[$i] = $aux;
            $aux = 0;
        }
        sort($arrayComMaioresValores);
        return $arrayComMaioresValores[count($arrayComMaioresValores)-2];
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */
    
	public function SequenciaCrescente(array $arr): bool {
        $verificaContador = 0;
        $verificaContadorFinal = 0;
        $duplicado=0;

        for($i=0; $i < count($arr); $i++)
        {
            for($i2=0; $i2 < count($arr); $i2++)
            {
                if($arr[$i]==$arr[$i2] && $i != $i2){
                    $duplicado=1;
                }
            }

        }

        for($i=0; $i < count($arr); $i++)
        {
            $aux=$arr[$i];

            
                for($i2=0; $i2 < count($arr); $i2++)
                {
                    if($i2+1 < count($arr))
                    {
                        if($duplicado == 0)
                        {
                            if($arr[$i2] != $aux )
                            {
                                if($arr[$i2] > $arr[$i2+1])
                                {
                                    
                                    $verificaContador++;
                                }
                                
                            }
                        }
                        else
                        {
                            if($arr[$i2] > $arr[$i2+1])
                                {
                                    
                                    $verificaContador++;
                                }
                        }
                        
                    }
                    
                }

                
                $verificaContadorFinal = $verificaContador;
                $verificaContador=0;
            

        }
        
        if(($verificaContadorFinal<2 && $verificaContadorFinal!=0) || $verificaContadorFinal==0 && count($arr)==2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


echo "\n\n-----------Teste 1:--------------\n";

$teste_1 = New Funcoes();
echo $teste_1->SeculoAno(101);
echo "\n";
echo $teste_1->SeculoAno(1);

echo "\n\n-----------Teste 2:--------------\n";

$teste_2 = new Funcoes();
echo $teste_2->PrimoAnterior(29);

echo "\n\n-----------Teste 3:--------------\n";

$multidimensional = array (
    array(25,22,18),
    array(10,15,13),
    array(24,5,2),
    array(80,17,15)
    );

$teste_3 = new Funcoes();
echo $teste_3->SegundoMaior($multidimensional);

echo "\n\n-----------Teste 4:--------------\n";

$arr_teste_4 = [3, 5, 67, 98, 3];
$teste_4 = new Funcoes();
var_dump($teste_4->SequenciaCrescente($arr_teste_4));

