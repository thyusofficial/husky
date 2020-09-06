$(function () {
  $('.phone').inputmask('(99) 99999-9999');
  $('.cep').inputmask('99999-999');

  $("#originCep").blur(function () {
    const originCep = $(this).val().replace(/\D/g, '');

    if (originCep.length == 0) {
      $("#originStreet").val("");
      $("#originNeighborhood").val("");
    }

    $.ajax({
      url: "https://viacep.com.br/ws/" + originCep + "/json",
      type: 'GET',
      crossDomain: true,
      dataType: 'jsonp',
      success: function (data) {
        $("#originStreet").val(data.logradouro);
        $("#originNeighborhood").val(data.bairro);
        $("#originNumber").focus();

      }
    });

  });

  $("#destinationCep").blur(function () {
    const destinationCep = $(this).val().replace(/\D/g, '');

    if (destinationCep.length == 0) {
      $("#destinationStreet").val("");
      $("#destinationNeighborhood").val("");
    }

    $.ajax({
      url: "https://viacep.com.br/ws/" + destinationCep + "/json",
      type: 'GET',
      crossDomain: true,
      dataType: 'jsonp',
      success: function (data) {
        $("#destinationStreet").val(data.logradouro);
        $("#destinationNeighborhood").val(data.bairro);
        $("#destinationNumber").focus();

      }
    });

  });

  $("#originCepUpdate").blur(function () {
    const originCep = $(this).val().replace(/\D/g, '');

    if (originCep.length == 0) {
      $("#originStreetUpdate").val("");
      $("#originNeighborhoodUpdate").val("");
    }

    $.ajax({
      url: "https://viacep.com.br/ws/" + originCep + "/json",
      type: 'GET',
      crossDomain: true,
      dataType: 'jsonp',
      success: function (data) {
        $("#originStreetUpdate").val(data.logradouro);
        $("#originNeighborhoodUpdate").val(data.bairro);
        $("#originNumberUpdate").val('').focus();
        $("#originComplementUpdate").val('');
        $("#originReferenceUpdate").val('');

      }
    });

  });

  $("#destinationCepUpdate").blur(function () {
    const destinationCep = $(this).val().replace(/\D/g, '');

    if (destinationCep.length == 0) {
      $("#destinationStreetUpdate").val("");
      $("#destinationNeighborhoodUpdate").val("");
    }

    $.ajax({
      url: "https://viacep.com.br/ws/" + destinationCep + "/json",
      type: 'GET',
      crossDomain: true,
      dataType: 'jsonp',
      success: function (data) {
        $("#destinationStreetUpdate").val(data.logradouro);
        $("#destinationNeighborhoodUpdate").val(data.bairro);
        $("#destinationNumberUpdate").val('').focus();
        $("#destinationComplementUpdate").val('');
        $("#destinationReferenceUpdate").val('');

      }
    });

  });

  $("#order-create-form").submit(function (event) {
    event.preventDefault();
    const order = {};
    $.each($(this).serializeArray(), function () {
      order[this.name] = this.value;
    });

    $.ajax({
      type: "POST",
      url: "../Controllers/HomeController.php?action=store",
      dataType: "JSON",
      data: { order },
      success: function (response) {

        response === true
          ? Toast.fire({
            icon: 'success',
            title: 'Pedido cadastrado com succeso'
          })
          :
          Toast.fire({
            icon: 'error',
            title: 'Erro ao cadastrar pedido, verifique os dados'
          })

        getOrders();
        $('#order-add-modal').modal('hide');
        $('#order-create-form').trigger("reset");
      }
    })
  });

  $("#order-form").submit(function (event) {
    event.preventDefault();
    const order = {};
    $.each($(this).serializeArray(), function () {
      order[this.name] = this.value;
    });

    $.ajax({
      type: "POST",
      url: "../Controllers/HomeController.php?action=update",
      dataType: "JSON",
      data: { order },
      success: function (response) {

        response === true
          ? Toast.fire({
            icon: 'success',
            title: 'Pedido editado com succeso'
          })
          :
          Toast.fire({
            icon: 'error',
            title: 'Erro ao editar pedido, verifique os dados'
          })

        getOrders();
        $('#order-modal').modal('hide');
        $('#order-form').trigger("reset");
      }
    })
  });

  getOrders();
});

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

function handleDetailModal(orderId) {
  $.ajax({
    type: "POST",
    url: "../Controllers/HomeController.php?action=show",
    dataType: "JSON",
    data: { orderId },
    success: function (response) {
      $('#order-modal .modal-title').text('Entrega #' + response.id);

      $('#order-modal #order-form #orderId').val(response.id);

      $('#order-modal #order-form #nameInput').val(response.client_name);
      $('#order-modal #order-form #phoneInput').val(response.phone);

      $('#order-modal #order-form #originCepUpdate').val(response.origin_cep);
      $('#order-modal #order-form #originStreetUpdate').val(response.origin_street);
      $('#order-modal #order-form #originNeighborhoodUpdate').val(response.origin_neighborhood);
      $('#order-modal #order-form #originNumberUpdate').val(response.origin_number);
      $('#order-modal #order-form #originComplementUpdate').val(response.origin_complement);
      $('#order-modal #order-form #originReferenceUpdate').val(response.origin_reference);

      $('#order-modal #order-form #destinationCepUpdate').val(response.destination_cep);
      $('#order-modal #order-form #destinationStreetUpdate').val(response.destination_street);
      $('#order-modal #order-form #destinationNeighborhoodUpdate').val(response.destination_neighborhood);
      $('#order-modal #order-form #destinationNumberUpdate').val(response.destination_number);
      $('#order-modal #order-form #destinationComplementUpdate').val(response.destination_complement);
      $('#order-modal #order-form #destinationReferenceUpdate').val(response.destination_reference);

      $('#order-modal').modal('show');
    }
  })
}

function handleDelete(orderId) {
  Swal.fire({
    title: 'Você quer mesmo excluir o pedido?',
    text: "Não será possível reverter a ação!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, excluir pedido!'
  }).then((result) => {
    if (result.value) {

      $.ajax({
        type: "POST",
        url: "../Controllers/HomeController.php?action=delete",
        dataType: "JSON",
        data: { orderId },
        success: function (response) {
          response === true
            ? Toast.fire({
              icon: 'success',
              title: 'Pedido excluído com sucesso!'
            })
            :
            Toast.fire({
              icon: 'error',
              title: 'Erro ao excluir pedido, verifique os dados'
            })
          getOrders();
        }
      })

    }
  })
}

function getOrders() {
  $('#orders-table tbody').empty();
  $.ajax({
    type: "GET",
    url: "../Controllers/HomeController.php?action=index",
    dataType: "JSON",
    success: function (response) {
      if (response.length === 0) {
        $('#orders-table').addClass('d-none');
        $('#empty-orders').removeClass('d-none');
      } else {
        $('#orders-table').removeClass('d-none');
        $('#empty-orders').addClass('d-none');
        response.map(o => {
          let order = `<tr>
      <td>
        ${o.id}
      </td>
      <td>
        ${o.client_name}
      </td>
      <td>
        ${o.origin_street}, ${o.origin_number}
      </td>
      <td>
        ${o.destination_street}, ${o.destination_number}
      </td>
      <td>
        <button class="btn" onclick="handleDetailModal(${o.id})">
          <img class="img-fluid icon-btn" src="../../assets/images/edit.png" />
        </button>
        <button class="btn" onclick="handleDelete(${o.id})">
          <img class="img-fluid icon-btn" src="../../assets/images/delete.png" />
        </button>
      </td>
      </tr>`

          $('#orders-table tbody').append(order)
        })
      }
    }
  })
}






