<?php require_once("funcoes.php"); ?>


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


                        <?php

                        foreach($produtos as $produto){
                            if($_GET["id"]==$produto["id"]){

                        ?>



                        <div class="col-4">
                        <img src="<?php echo $produto["imagem"];?>" class="img-fluid" alt=""> 
                        </div>

                        <div class="col-8">
                        <h1><?php echo $produto['nomeProduto'] ?></h1>

                        <h3>Categoria</h3>
                        <h4><?php echo $produto["nomeCategoria"]; ?></h4>            
                        
                                

                        <h3>Descrição</h3>
                        <h4><?php echo $produto ['nomeDescricao'] ?></h4>

                                                                        
                        <div class="d-flex justify-content-between">
                            <p>Quantidade em estoque</p>
                            <p><?php echo $produto['nomeQuantidade'] ?></p>
                            <p>Preco do produto. R$</p>
                            <p><?php echo $produto['nomePreco'] ?></p>
                        </div>

                        <div class="pr-5"> 
                            <p></p>
                        </div>
                    </div>


                <?php }?>
                <?php }?>

        </div>

            
                

        </section>
    </body>
</html>