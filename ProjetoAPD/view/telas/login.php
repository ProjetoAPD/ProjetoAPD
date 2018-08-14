<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="assets/images/nome.png">
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Login</title>

    <link rel="stylesheet" type="text/css" href="assets/style.css">

    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="../semantic/dist/semantic.min.js"></script>


  <style type="text/css">
    body {
      background-color: #4C2C63;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }

    .content {
      color: white;
    }
    
    .ui.fluid.large.teal.submit.button{
      color: white;
      background-color: #4C2C63;
    }
}

  </style>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <img src="assets/images/nome.png" class="image">
      <div class="content">
        Logue em sua conta
      </div>
    </h2>




    <form method="post" action="../../controller/acoesUsu.php?acao=login" class="ui large form">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="Email">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="senha" placeholder="Senha">
          </div>
        </div>
          <button class="ui fluid large teal submit button" type="submit">Login</button>
          <?php if (isset($_GET['erro']) and $_GET['erro'] == 1){ ?>

              <h4 style="color: red">Erro ao validar os dados, tente novamente</h4>

          <?php } ?>
      </div>





    </form>




    <div class="ui message">
      Não cadastrado? <a href="cadastro.php">Cadastre-se</a>
    </div>
    <hr>
    <div class="ui message"><a href="index.php">Voltar a página inicial</a> </div>
  </div>
</div>

</body>

</html>
