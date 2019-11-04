<?php 

$nomeArquivo="produto.json";

//conversao do json em array associativo, tem todos os dados do produto
$produtos = json_decode(file_get_contents($nomeArquivo),true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <section class="container bg-light p-5">
        <div class="row mt-5">
            <a href="index.php"><button class="ml-3"> Voltar</button></a>
        </div>
        <div class='row'>

                <?php if(isset($produtos)&& $produtos !=[]) { ?>
                <?php foreach($produtos as $produto) { ?>

            <div class="col-4">
               <img src="<?php echo $produto["imagem"];?>" class="img-fluid" alt=""> 
            </div>

            <div class="col-8">
            <h1><?php echo $produto['nome'] ?></h1>

            <h3>Categoria</h3>
            <h4><?php echo $produto ['categoria'] ?></h4>

            <h3>Descrição</h3>
            <h4><?php echo $produto ['descricao'] ?></h4>

            
                <div class="d-flex justify-content-between">
                    <p>Quantidade em estoque</p>
                    <p><?php echo $produto['quantidade'] ?></p>
                    <p>Preco do produto. R$</p>
                    <p><?php echo $produto['preco'] ?></p>
 
            <div class="pr-5"> 
                <p></p>
            </div>
                </div>
            </div>

        <?php }?>
        <?php }?>

        </div>

    </section>
</body>
</html>