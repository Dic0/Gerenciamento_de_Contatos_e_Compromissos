<?php
include "../database/bdContato.php";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  .botao1 {
    margin-left: 10px;
  }

  .botao2 {
    margin-left: 10px;
  }

  .listagem {
    margin-left: 15px;
    margin-right: 50px;
    padding-left: 5px;
  }
</style>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/index.php">Sis Agenda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/index.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/AgendaList.php">Minha Agenda</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/ContatoList.php">Meus Contatos <span class="sr-only">(Página atual)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <div class="listagem">
    <h2>Listagem de Contatos</h2>
    <form action="./ContatoList.php" method="post">
      <div class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="valor" aria-label="Pesquisar">
        <div class="col-auto my-1">
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="tipo">
            <option selected>Tipo</option>
            <option value="nome">Nome</option>
            <option value="email">E-mail</option>
          </select>
        </div>
        <div class="botao1">
          <button type="submit" class="btn btn-outline-success"> <i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
        </div>
        <div class="botao2">
          <a type="button" class="btn btn-primary" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/ContatoForm.php"> <i class="fa-solid fa-plus"></i> Cadastrar</a>
        </div>
      </div>
    </form>
  </div>
  <br>

  <?php
  $objBD = new BD();
  $objBD->conn();

  if (!empty($_POST['valor'])) {
    $result = $objBD->pesquisar($_POST);
  } else {
    $result = $objBD->select();
  }

  if (!empty($_GET['id'])) {
    $objBD->remover($_GET['id']);
    header("location: ./ContatoList.php");
  }

  echo "<table class='table table-hover'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Nome</th>
        <th scope='col'>Sobrenome</th>
        <th scope='col'>Telefone 1</th>
        <th scope='col'>Tipo Telefone 1</th>
        <th scope='col'>Telefone 2</th>
        <th scope='col'>Tipo Telefone 2</th>
        <th scope='col'>Email</th>
        <th scope='col'>Ação</th>
        <th scope='col'>Ação</th>
      </tr>
    </thead>";

  foreach ($result as $item) {
    echo "
    <tbody>
      <tr>
        <th scope='row'>" . $item['id'] . "</th>
        <td>" . $item['nome'] . "</td>
        <td>" . $item['sobre_nome'] . "</td>
        <td><a href='tel:" . $item['telefone1'] . "'>" . $item['telefone1'] . "</td>
        <td>" . $item['tipo_telefone1'] . "</td>
        <td><a href='tel:" . $item['telefone2'] . "'>" . $item['telefone2'] . "</td>
        <td>" . $item['tipo_telefone2'] . "</td>
        <td><a href='mailto:" . $item['telefone1'] . "'>" . $item['email'] . "</td>
        <td><a href='./ContatoForm.php?id=" . $item['id'] . "'><span style='color: orange;'><i class='fa-solid fa-pen-to-square orange'></i></a></td>
        <td><a href='./ContatoList.php?id=" . $item['id'] . "' onclick=\"return confirm('Deseja realmente remover o registro?') \" ><span style='color: red;'><i class='fa-solid fa-trash red'></i></a></td>
      </tr>
      </tbody>";
  }

  echo "</table>";
  ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://kit.fontawesome.com/de89dfee24.js" crossorigin="anonymous"></script>
</body>

</html>