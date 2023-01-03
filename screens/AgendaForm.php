<?php
include "../database/bdAgenda.php";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<style>
  .Agenda {

    margin-left: 15px;
    margin-right: 50px;
    padding-left: 5px;

  }
</style>


<body>

  <?php
  $objBD = new BD();
  $objBD->conn();

  if (!empty($_GET['id'])) {
    $result = $objBD->buscar($_GET['id']);
  }
  if (!empty($_POST)) {

    if (empty($_POST['id'])) {
      $objBD->inserir($_POST);
    } else {
      $objBD->update($_POST);
    }
    header("Location: ./AgendaList.php");
  }
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/index.php">Sis Agenda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/index.php">Início </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/AgendaList.php">Minha Agenda <span class="sr-only">(Página atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/ContatoList.php">Meus Contatos</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <form action="./AgendaForm.php" method="post">
    <div class="Agenda">
      <h1>Formulário Agenda</h1>
      <input type="hidden" name="id" value="<?php echo !empty($result->id) ? $result->id : "" ?>" /><br>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
        <input type="text" class="form-control" name="titulo" placeholder="Reunião..." value="<?php echo !empty($result->titulo) ? $result->titulo : "" ?>" />
      </div>
      <div class="row">
        <div class="col">
          <label for="inputEmail4" class="form-label">Data Ínicio</label>
          <input type="date" class="form-control" name="data_inicio" placeholder="mm/dd/yyyy" value="<?php echo !empty($result->data_inicio) ? $result->data_inicio : "" ?>" />
        </div>
        <div class="col">
          <label for="inputPassword4" class="form-label">Hora Ínicio</label>
          <input type="time" class="form-control" name="hora_inicio" placeholder="--:-- --" value="<?php echo !empty($result->hora_inicio) ? $result->hora_inicio : "" ?>" />
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="inputEmail4" class="form-label">Data Fim</label>
          <input type="date" class="form-control" name="data_fim" placeholder="mm/dd/yyyy" value="<?php echo !empty($result->data_fim) ? $result->data_fim : "" ?>" />
        </div>
        <div class="col">
          <label for="inputPassword4" class="form-label">Hora Fim</label>
          <input type="time" class="form-control" name="hora_fim" placeholder="--:-- --" value="<?php echo !empty($result->hora_fim) ? $result->hora_fim : "" ?>" />
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="exampleFormControlInput1" class="form-label">Local</label>
          <input type="text" class="form-control" name="local_1" placeholder="Rua João Machado..." value="<?php echo !empty($result->local_1) ? $result->local_1 : "" ?>" />
        </div>
      </div>
      <div class="row">
        <div class="col">
          <?php
          $objBD = new BD();
          $objBD->conn();
          $resultConvidado = $objBD->convidado_id();

          echo "<label>Contato Convidado</label>
              <select class='custom-select mr-sm' name='convidado_id'>
              <option></option>";
          foreach ($resultConvidado as $item) {
            $select = $item['id'] == $result->convidado_id ? "selected" : "";

            echo "<option value='" . $item['id'] . "'  $select >" . $item['nome'] . "</option>";
          }
          echo "</select>";
          ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" placeholder="Ponto de referência..." rows="3"> <?php echo !empty($result->descricao) ? $result->descricao : "" ?> </textarea>
        </div>
      </div>
      <br>
      <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
      <a type="button" class="btn btn-primary" href="AgendaList.php"><i class="fa-solid fa-circle-arrow-left"></i> Voltar</a>
    </div>
  </form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://kit.fontawesome.com/de89dfee24.js" crossorigin="anonymous"></script>
</body>

</html>