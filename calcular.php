<?php
    // obter dados
    $nome  = $_POST['nome'];
    $total = (float) $_POST['total'];   
    $idade = (int) $_POST['idade'];
    if (isset($_POST['cartao']) ) 
    {
            $cartao = "sim";
    }
    else
    {
        $cartao = "nao";
    }
    //processamento    
    $descontoCartao=0;
    if ($idade==0)    
    {
        $descontoIdade=0;
    }
    else if ($idade==1)
    {
        $descontoIdade=5;
    }
    else
    {
        $descontoIdade=7;
    }//fim if da idade
    if ($cartao=="sim")
    {
        $descontoCartao=5;
    }
    $valorDescontoIdade=$total * ($descontoIdade/100);
    $valorDescontoCartao=$total * ($descontoCartao/100);
    $valorFinal = $total - $valorDescontoIdade - $valorDescontoCartao;    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FARMÁCIA PARACETALOKA</title>
</head>
<body>
    <div>
        <h1>FARMÁCIA PARACETALOKA</h1>
        <hr>
        <h2>Cliente: <?php echo $nome; ?></h2>
        <h3>Total Pedido: R$ <?php echo  number_format($total,2,",",".") ?></h3>
        <h4>Desconto pela faixa etária: R$ <?php echo  number_format($valorDescontoIdade,2,",",".") ?></h4>
        <h4>Desconto pelo cartão fidelidade: R$ <?php echo  number_format($valorDescontoCartao,2,",",".") ?></h4>
        <h1>Total a Pagar: R$ <?php echo  number_format($valorFinal,2,",",".") ?></h1>

        <?php
    // for: repete uma vez pra cada quantidade de parcelas (1x a 6x),
    // dividindo o total com desconto já calculado acima
    for ($parcelas = 1; $parcelas <= 6; $parcelas++) {
        $valorParcela = $valorFinal / $parcelas;
        echo $parcelas . "x de R$ " . number_format($valorParcela, 2, ',', '.') . "<br>";
    }
?>


        <a href="index.html">Voltar</a>
    </div>
</body>
</html>


