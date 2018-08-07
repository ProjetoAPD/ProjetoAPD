  <!DOCTYPE html>
  <html>
  <head>
    <link rel="icon" href="assets/images/nome.png">
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Cadastro</title>


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
        color: #ffffff;
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
          Cadastre-se
        </div>
      </h2>
      <form method="post" class="ui large form" action="../../controller/acoesUsu.php?acao=cadastrar">
        <!-- usuario -->
        <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user outline icon"></i>
              <input type="text" name="usuario" placeholder="Nome de usuário">
            </div>
          </div>
          <!-- email -->
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="email" placeholder="E-mail">
            </div>
          </div>
            <!-- tipo usuario -->
            <div class="field">
                <div class="ui left icon input">
                    Tipo de usuário:
                    <input type="radio" name="tipo_usuario" value="3" id="comum" title="comum"> Comum
                    <input type="radio" name="tipo_usuario" value="2" id="psicologo" title="psicologo"> Psicólogo
                </div>
            </div>
            <!-- psicologo -->
            <div class="field" id="psicologo">
                <div class="ui left icon input">
                    <i class="address card icon"></i>
                    <input type="text" name="crp" id="crp" placeholder="CRP">
                </div>
            </div>
          <!-- senha -->
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="senha" placeholder="Digite sua senha">
            </div>
          </div>
          <!-- senha -->
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="confirmar_senha" placeholder="Confirme sua senha">
            </div>
          </div>
            <button class="ui fluid large teal submit button" type="submit">Cadastrar</button>
        </div>


          <div class="ui error message"></div>

      </form>

      <div class="ui message">
        Já tem conta? <a href="login.php">Logue</a>
      </div>
      <hr>
      <div class="ui message"><a href="index.php">voltar a pagina inicial</a> </div>
    </div>
  </div>

  </body>

  </html>
