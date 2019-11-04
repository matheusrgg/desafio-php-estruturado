

<?php
    function cadastrarProduto ($nomeProduto, $nomeCategoria , $nomeDescricao , $nomeQuantidade , $nomePreco , $nomeImagem ){
      $nomeArquivo="produto.json";

      if(file_exists($nomeArquivo)){

        //abrindo e pegando info do arquivo
        $arquivo = file_get_contents($nomeArquivo);

        //transformando o Json em arrray

        $produtos = json_decode ($arquivo, true);
      
        $produtos[]= ["nome"=>$nomeProduto, "categoria"=>$nomeCategoria ,"descricao"=>$nomeDescricao, "quantidade"=>$nomeQuantidade, "preco"=>$nomePreco, "imagem"=>$nomeImagem];
        $json = json_encode($produtos);


        //fechando novamente para exportar
        $deuCerto = file_put_contents($nomeArquivo, $json);
        if($deuCerto){
            return "Deu certo brother";
        }else {
            return "Não deu bom";
        }
        var_dump($produtos);
      

      
    }else{
        
      $produtos = [];

      //array_push()

      $produtos[]= ["nome"=>$nomeProduto, "categoria"=>$nomeCategoria ,"descricao"=>$nomeDescricao, "quantidade"=>$nomeQuantidade, "preco"=>$nomePreco, "imagem"=>$nomeImagem];
      
          //transformando array em json
      $json = json_encode($produtos);
          //salvando o json dentro de um arquivo
      $deuCerto = file_put_contents($nomeArquivo, $json);

      if($deuCerto){
          
          return "Deu certo brother";
      }else {
          return "Não deu bom";
      }
      

      var_dump($json);
  }
}

      //verificar dentro da página se tem alguma coisa dentro da página, pra vê se n tá vázio
    //Por que vc colocou as informações do formulário no POST

    if($_POST){   

      //separar as iformações em variaveis para começar a usar
      //salvando arquivo

      $nomeImg = $_FILES['nomeImagem']['name'];
      $localTmp = $_FILES['nomeImagem']['tmp_name'];

      //onde os arquivo serão salvos
      $dataAtual = date("d-m-y");
      $caminhoSalvo='images/'.$dataAtual.$nomeImg;

      //passando da onde ele tá, pra onde ele vai

      $deuCerto = move_uploaded_file($localTmp, $caminhoSalvo);
      
      
      echo cadastrarProduto($_POST['nomeProduto'],$_POST['nomeCategoria'], $_POST['nomeDescricao'], $_POST['nomeQuantidade'], $_POST['nomePreco'],$caminhoSalvo);
} 

$nomeArquivo="produto.json";
$produtos = json_decode(file_get_contents($nomeArquivo),true);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>






<section class="d-flex justify-content-end">

<!---- Começoo da Tabela -------->



  <h1>Todos os Produtos</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Categoria</th>
        <th scope="col">Preco</th>
      </tr>
    </thead>
    <tbody>

<!-- COvertir json em array associativo e percorrer em um foreach-->

      <?php foreach($produtos as $produto) {?>
          <tr>
            <td><?php echo $produto["nome"] ?></td>
            <td><?php echo $produto["categoria"] ?></td>
            <td><?php echo $produto["preco"] ?></td>
          </tr>
      <?php } ?>
        </tbody>
  </table>

<!-- /table -->

<!---- Começoo do formuláriio ----->



<form class=" col-4 bg-light " action="" method="post"  enctype="multipart/form-data" style="border: 1px solid red;">
<h1>Cadastrar Produtos</h1>
  


    <div class="form-group">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" name="nomeProduto" placeholder="Email">
    </div>


    <div class="form-group">
      <label for="inputState">Categoria</label>
      <select name="nomeCategoria" class="form-control">
        <option selected>Choose...</option>
        <option>Camiseta</option>
        <option>Calça</option>
        <option>Casaco</option>
      </select>
    </div>

    <div class="form-group">
      <label for="inputPassword4">Descrição</label>
      <input type="text" class="form-control" name="nomeDescricao" placeholder="#">
    </div>
  </div>


  <div class="form-group">
    <label for="inputAddress">Quantidade</label>
    <input type="number" class="form-control" name="nomeQuantidade" placeholder="1234 Main St">
  </div>


  <div class="form-group">
    <label for="inputAddress2">Preço</label>
    <input type="number" class="form-control" name="nomePreco" placeholder="Apartment, studio, or floor">
  </div>

  <div class="form-group">
    <label for="nomeImagem">Foto do Produto</label>
    <input type="file" class="form-control" name="nomeImagem" placeholder="Imagem">
  </div>
  
  


  <button type="submit" class="btn btn-primary">Sign in</button>

</form>
</section>
<!---- Final do formuláriio ----->

</body>
</html>