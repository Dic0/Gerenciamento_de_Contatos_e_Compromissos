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
  .espacamento {
    margin-left: 15px;
    margin-right: 50px;
    padding-left: 5px;
  }

  .col {
    margin: 5px;
  }

  .tamanho {
    width: 600px;
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
    header("Location: ./ContatoList.php");
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
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/index.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/AgendaList.php">Minha Agenda</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/ContatoList.php">Meus Contatos<span class="sr-only">(Página atual)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <div class="espacamento">
    <form action="./ContatoForm.php" method="post">
      <h2>Formulário Contato</h2>
      <input type="hidden" name="id" value="<?php echo !empty($result->id) ? $result->id : "" ?>" /><br>
      <div class="form-row">
        <div class="col">
          <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo !empty($result->nome) ? $result->nome : "" ?>" />
        </div>
        <div class="col">
          <input type="text" class="form-control" name="sobre_nome" placeholder="Sobrenome" value="<?php echo !empty($result->sobre_nome) ? $result->sobre_nome : "" ?>" />
        </div>
      </div>

      <div class="form-row">
        <div class="col">
          <input type="text" class="form-control" name="telefone1" placeholder="Telefone 01" value="<?php echo !empty($result->telefone1) ? $result->telefone1 : "" ?>" />
        </div>
        <div class="col">
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="tipo_telefone1">
            <option selected>Tipo Telefone 01</option>
            <?php if ($result->tipo_telefone1 != "Comercial") {
              echo "<option value='Comercial'>Comercial</option>";
            } ?>
            <?php if ($result->tipo_telefone1 != "Casa") {
              echo "<option value='Casa'>Casa</option>";
            } ?>
            <?php if ($result->tipo_telefone1 != "Celular") {
              echo "<option value='Celular'>Celular</option>";
            } ?>
            <?php if ($result->tipo_telefone1 != "Principal") {
              echo "<option value='Principal'>Principal</option>";
            } ?>
          </select>
          </select>
        </div>

        <div class="col">
          <input type="email" class="form-control" id="colFormLabel" name="email" placeholder="nome@exemplo.com" value="<?php echo !empty($result->email) ? $result->email : "" ?>" />
        </div>
      </div>
      <div class="tamanho">
        <div class="form-row">
          <div class="col">
            <input type="text" class="form-control" name="telefone2" placeholder="Telefone 02" value="<?php echo !empty($result->telefone2) ? $result->telefone2 : "" ?>" />
          </div>
          <div class="col">
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="tipo_telefone2">
              <option selected>Tipo Telefone 02</option>
              <?php if ($result->tipo_telefone2 != "Comercial") {
                echo "<option value='Comercial'>Comercial</option>";
              } ?>
              <?php if ($result->tipo_telefone2 != "Casa") {
                echo "<option value='Casa'>Casa</option>";
              } ?>
              <?php if ($result->tipo_telefone2 != "Celular") {
                echo "<option value='Celular'>Celular</option>";
              } ?>
              <?php if ($result->tipo_telefone2 != "Principal") {
                echo "<option value='Principal'>Principal</option>";
              } ?>
            </select>
            </select>
          </div>
        </div>
      </div>
      <br>
      <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
      <a type="button" class="btn btn-primary" href="http://localhost/TAI/Avaliacoes/Avaliacao_TAI/screens/ContatoList.php"><i class="fa-solid fa-circle-arrow-left"></i> Voltar</a>
  </div>
  </form>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://kit.fontawesome.com/de89dfee24.js" crossorigin="anonymous"></script>
</body>

</html>