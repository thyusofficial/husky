<?php
require_once '../../lib/Config/config.php';
?>

<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="../../styles/global.css">

  <title>Gestão de entregas expressas</title>
</head>

<body>
  <header class="header-top bg-dark">
    <div class="header-top-content container">
      <a class="navbar-brand" href="#">
        <img src="<?php echo BASE_URL; ?>/assets/images/logo.png" alt="Husky logo" loading="lazy">
      </a>
      <nav>
        <button class="btn btn-success" data-toggle="modal" data-target="#order-add-modal">Adicionar novo pedido</a>
      </nav>
    </div>
  </header>

  <div class="modal fade" id="order-add-modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="order-create-form">
            <h4 class="my-2">Dados do cliente</h4>
            <div class="form-row ">
              <div class="form-group col-md-6">
                <label for="nameInput">Nome</label>
                <input type="text" class="form-control" name="nameInput" id="nameInput">
              </div>
              <div class="form-group col-md-6">
                <label for="phoneInput">Telefone</label>
                <input type="text" class="form-control phone" name="phoneInput" id="phoneInput">
              </div>
            </div>
            <hr class="my-4">
            <h4 class="my-2">Dados do origem</h4>
            <div class="form-row ">
              <div class="form-group col-md-3">
                <label for="originCep">CEP</label>
                <input type="text" class="form-control cep" name="originCep" id="originCep">
              </div>
              <div class="form-group col-md-6">
                <label for="originStreet">Rua</label>
                <input type="text" class="form-control" name="originStreet" id="originStreet">
              </div>
              <div class="form-group col-md-3">
                <label for="originNeighborhood">Bairro</label>
                <input type="text" class="form-control" name="originNeighborhood" id="originNeighborhood">
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-md-3">
                <label for="originNumber">Número</label>
                <input type="text" class="form-control" name="originNumber" id="originNumber">
              </div>
              <div class="form-group col-md-3">
                <label for="originComplement">Complemento</label>
                <input type="text" class="form-control" name="originComplement" id="originComplement">
              </div>
              <div class="form-group col-md-6">
                <label for="originReference">Complemento</label>
                <input type="text" class="form-control" name="originReference" id="originReference">
              </div>
            </div>
            <hr class="my-4">
            <h4 class="my-2">Dados do destino</h4>
            <div class="form-row ">
              <div class="form-group col-md-3">
                <label for="destinationCep">CEP</label>
                <input type="text" class="form-control cep" name="destinationCep" id="destinationCep">
              </div>
              <div class="form-group col-md-6">
                <label for="destinationStreet">Rua</label>
                <input type="text" class="form-control" name="destinationStreet" id="destinationStreet">
              </div>
              <div class="form-group col-md-3">
                <label for="destinationNeighborhood">Bairro</label>
                <input type="text" class="form-control" name="destinationNeighborhood" id="destinationNeighborhood">
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-md-3">
                <label for="destinationNumber">Número</label>
                <input type="text" class="form-control" name="destinationNumber" id="destinationNumber">
              </div>
              <div class="form-group col-md-3">
                <label for="destinationComplement">Complemento</label>
                <input type="text" class="form-control" name="destinationComplement" id="destinationComplement">
              </div>
              <div class="form-group col-md-6">
                <label for="destinationReference">Referência</label>
                <input type="text" class="form-control" name="destinationReference" id="destinationReference" >
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" onclick="handleSubmitOrder()">Criar pedido</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>
  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
  <script src="../../assets/js/home.js"></script>


</body>

</html>