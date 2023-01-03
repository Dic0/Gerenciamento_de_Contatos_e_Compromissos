<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<style>
  .Telas {
    margin-left: 15px;
    margin-right: 50px;
    padding-left: 5px;
  }

  img {
    width: 150px;
    height: 150px;
    display: inline-block;
    float: left;
    margin-right: 20px;
  }

  .Conteudo1 {
    border: solid;
    border-width: 1px;
    border-color: #808080;
    box-sizing: border-box;
    height: 180px;
    display: table;
    display: inline-block;
    width: 35%;
  }

  .Conteudo2 {
    border: solid;
    border-width: 1px;
    border-color: #808080;
    box-sizing: border-box;
    height: 180px;
    display: table;
    display: inline-block;
    width: 45%;
    float: right;
    margin-right: 200px;
  }

  .Cont {
    margin-top: 20px;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/index.php">&nbsp&nbsp&nbspSis Agenda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/index.php">Início </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/AgendaList.php">Minha Agenda <span class="sr-only">(Página atual)</span> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/ContatoList.php">Meus Contatos</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>

  <div class="Telas">
    <h1>Telas</h1>
    <div class="Conteudo1">

      <img src="../Avaliacao_TAI/img/Contato.png">

      <div class="Cont">
        <h2>Meus Contatos</h2>
        <p>Cadastre e Gerencie todos os seus contatos</p>

        <button class="btn btn-primary" type="submit" onclick="window.location.href = 'http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/ContatoList.php'">Ver</button>
      </div>
    </div>
    <div class="Conteudo2">

      <img src="../Avaliacao_TAI/img/Agenda.png">

      <div class="Cont">
        <h2>Minha Agenda</h2>
        <p>Cadastre e Gerencie todos os seus compromissos na sua Agenda</p>

        <button class="btn btn-primary" type="submit" onclick="window.location.href = 'http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/AgendaList.php'">Ver</button>
      </div>
    </div>
  </div>









  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/de89dfee24.js" crossorigin="anonymous"></script>
</body>

</html>