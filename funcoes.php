<?php
    function cadastrarProduto ($nomeProduto, $nomeCategoria , $nomeDescricao , $nomeQuantidade , $nomePreco , $nomeImagem ){
      $nomeArquivo="produto.json";

        //verificando se o arquivo existe.
      if(file_exists($nomeArquivo)){

        //abrindo e pegando info do arquivo json.
        $arquivo = file_get_contents($nomeArquivo);

        //transformando o Json em arrray(decode).

        $produtos = json_decode ($arquivo, true);


        
        //Adicionando novo produto na estrutura do array associativo.   
        //tava o geito antigo aqui
        
        
        
        
        
        //agora vem a lógica do ID
        if($produtos ==[]){
            $produtos[]= ["id"=>1,"nomeProduto"=>$nomeProduto,"nomeCategoria"=> $nomeCategoria, "nomeDescricao"=> $nomeDescricao,"nomeQuantidade"=> $nomeQuantidade,"nomePreco"=> $nomePreco,"nomeImagem"=> $nomeImagem];
        }else{
            $ultimoProduto = end($produtos);
            $incrementandoId =$ultimoProduto["id"] + 1;
            $produtos[]=["id"=>$incrementandoId,"nomeProduto"=>$nomeProduto,"nomeCategoria"=> $nomeCategoria, "nomeDescricao"=> $nomeDescricao,"nomeQuantidade"=> $nomeQuantidade,"nomePreco"=> $nomePreco,"nomeImagem"=> $nomeImagem];           
            
        }
        
     
        //colocando o arquivo alterado em formato json
        $json = json_encode($produtos);
        
        
        
        //fechando novamente para exportar
        // Salvando os arquivos no produto.json. Estrutura -primeiro nome do arquivo , depois o encode
        
        
        $deuCerto = file_put_contents($nomeArquivo, $json);
        if($deuCerto){
            return "Deu certo brother";
        }else {
            return "Não deu bom";
        }
        var_dump($produtos);
        

      
    }else{
        
        //aqui declaramos a estrutura da array, vazio ainda, para depois adicionar elementos dentro dele.
      $produtos = [];

      //array_push()
      //o nome da etiqueta tem que ser o mesmo lá do form; o nome da variável é a mesma definida na function

      $produtos[]= ["id"=>1,"nomeProduto"=>$nomeProduto,"nomeCategoria"=> $nomeCategoria, "nomeDescricao"=> $nomeDescricao,"nomeQuantidade"=> $nomeQuantidade,"nomePreco"=> $nomePreco,"nomeImagem"=> $nomeImagem];
        
      
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
      //salvando arquivo- dentro do files tem que ter o name que vai no input do form, e dps o dado especifico que quero pegar dentro desse araray.

      $nomeImg = $_FILES['nomeImagem']['name'];
      $localTmp = $_FILES['nomeImagem']['tmp_name'];

      // pegando a data atual para concatenar ao nome da imagem
      $dataAtual = date("d-m-y");
      //onde os arquivo serão salvos
      $caminhoSalvo='images/'.$dataAtual.$nomeImg;

      //passando da onde ele tá, pra onde ele vai

      $deuCerto = move_uploaded_file($localTmp, $caminhoSalvo);
      
      //esse echo imprimi o retorno da função
      echo cadastrarProduto($_POST['nomeProduto'],$_POST['nomeCategoria'], $_POST['nomeDescricao'], $_POST['nomeQuantidade'], $_POST['nomePreco'],$caminhoSalvo);
} 

// Para que os produtos após cadastrados no form sejam exibidos na mesma tela, preciso deixar as variáveis abaixo depois da função.
$nomeArquivo="produto.json";
//abrindo e já transformando o arquivo json em array associativo
$produtos = json_decode(file_get_contents($nomeArquivo),true);

?>
