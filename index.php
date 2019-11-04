

<?php require_once("funcoes.php"); ?>

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






<section class="container d-flex justify-content-center">
<div class="row">

<!---- Começoo da Tabela -------->
<div class="col-7 pt-5 pr-5">

  <h1>Todos os Produtos</h1>
  
  <table class="table">
  
    <thead class="thead-light">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Categoria</th>
        <th scope="col">Preco</th>
      </tr>
    </thead>
    <tbody>

<!-- COvertir json em array associativo e percorrer em um foreach-->
      <?php if(isset($produtos)){ ?>
      <?php foreach($produtos as $produto) {?>
          <tr>
            <td><a href="individual.php?id=<?php echo $produto['id']; ?>"><?php echo $produto['nomeProduto']; ?></a></td>
            
            <td><?php echo $produto["nomeCategoria"] ?></td>
            <td><?php echo $produto["nomePreco"] ?></td>
          </tr>
          <!-- Fechando o foreach -->
      <?php } ?>
          <!--- Fechando o if(isset) --->
      <?php } else{ ?>
      <h4>Não tem foto cadastrado</h4>
      <?php } ?>
        </tbody>
  </table>
</div>

<!-- /table -->

<!---- Começoo do formuláriio ----->

<div class="col-5 p-5 mt-5">
<form class="bg-light " action="" method="post"  enctype="multipart/form-data" style="border: 1px solid red;">
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
</div>
</div>
</section>
<!---- Final do formuláriio ----->

</body>
</html>