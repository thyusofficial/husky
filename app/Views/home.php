<?php require_once '../Template/header.php'; ?>

<div class="content container">
  <h2 class="my-4">
    Lista de pedidos cadastrados
  </h2>
  <table id="orders-table" class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome do cliente</th>
        <th scope="col">Endereço de origem</th>
        <th scope="col">Endereço de destino</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>

  <div class="modal fade" id="order-modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="order-form">
            <h4 class="my-2">Dados do cliente</h4>
            <input hidden type="text" name="orderId" id="orderId">
            <div class="form-row ">
              <div class="form-group col-md-6">
                <label for="nameInput">Nome</label>
                <input type="text" class="form-control" name="nameInput" id="nameInput">
              </div>
              <div class="form-group col-md-6">
                <label for="phoneInput">Telefone</label>
                <input name="phoneInput" type="text" class="form-control phone" id="phoneInput">
              </div>
            </div>
            <hr class="my-4">
            <h4 class="my-2">Dados do origem</h4>
            <div class="form-row ">
              <div class="form-group col-md-3">
                <label for="originCepUpdate">CEP</label>
                <input name="originCep" type="text" class="form-control cep" id="originCepUpdate">
              </div>
              <div class="form-group col-md-6">
                <label for="originStreetUpdate">Rua</label>
                <input name="originStreet" type="text" class="form-control" id="originStreetUpdate">
              </div>
              <div class="form-group col-md-3">
                <label for="originNeighborhoodUpdate">Bairro</label>
                <input name="originNeighborhood" type="text" class="form-control" id="originNeighborhoodUpdate">
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-md-3">
                <label for="originNumberUpdate">Número</label>
                <input name="originNumber" type="text" class="form-control" id="originNumberUpdate">
              </div>
              <div class="form-group col-md-3">
                <label for="originComplementUpdate">Complemento</label>
                <input name="originComplement" type="text" class="form-control" id="originComplementUpdate">
              </div>
              <div class="form-group col-md-6">
                <label for="originReferenceUpdate">Complemento</label>
                <input name="originReference" type="text" class="form-control" id="originReferenceUpdate">
              </div>
            </div>
            <hr class="my-4">
            <h4 class="my-2">Dados do destino</h4>
            <div class="form-row ">
              <div class="form-group col-md-3">
                <label for="destinationCepUpdate">CEP</label>
                <input name="destinationCep" type="text" class="form-control cep destinationCep" id="destinationCepUpdate">
              </div>
              <div class="form-group col-md-6">
                <label for="destinationStreetUpdate">Rua</label>
                <input name="destinationStreet" type="text" class="form-control" id="destinationStreetUpdate">
              </div>
              <div class="form-group col-md-3">
                <label for="destinationNeighborhoodUpdate">Bairro</label>
                <input name="destinationNeighborhood" type="text" class="form-control" id="destinationNeighborhoodUpdate">
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-md-3">
                <label for="destinationNumberUpdate">Número</label>
                <input name="destinationNumber" type="text" class="form-control" id="destinationNumberUpdate">
              </div>
              <div class="form-group col-md-3">
                <label for="destinationComplementUpdate">Complemento</label>
                <input name="destinationComplement" type="text" class="form-control" id="destinationComplementUpdate">
              </div>
              <div class="form-group col-md-6">
                <label for="destinationReferenceUpdate">Referência</label>
                <input name="destinationReference" type="text" class="form-control" id="destinationReferenceUpdate">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" onclick="handleOrderUpdate()">Salvar alterações</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
