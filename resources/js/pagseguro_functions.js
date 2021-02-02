
function processPayment(token) {

      let data = {
            card_token: token,
            hash: PagSeguroDirectPayment.getSenderHash(),
            shipping: $("input[name=correios]:checked").val(),
            metodo: $("input[name=correios]:checked").attr('id'),
            installment: document.querySelector('select.select_installments').value,
            card_name: document.querySelector('input[name=card_name]').value,
            birth_date: document.querySelector('input[name=birth_date]').value,
            card_cpf: document.querySelector('input[name=card_cpf]').value,
            cep: document.querySelector('input[name=cep]').value,
            uf: document.querySelector('input[name=uf]').value,
            cidade: document.querySelector('input[name=cidade]').value,
            rua: document.querySelector('input[name=rua]').value,
            bairro: document.querySelector('input[name=bairro]').value,
            complemento: document.querySelector('input[name=complemento]').value,
            numero: document.querySelector('input[name=numero]').value,
            dd: document.querySelector('input[name=dd]').value,
            telefone: document.querySelector('input[name=telefone]').value,
            // _token: csrf
      };
      var token = csrf;

      let submitButton = document.querySelector('button.processCheckout');
      let spinner = document.querySelector('div.spinner');
      let spinnerEr = document.querySelector('div.spinner-er');


      $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      if (numero.value == "") {
            console.log('nulo');
      }

      $.ajax({
            type: 'POST',
            url: urlProccess,
            data: data,
            dataType: 'json',
            beforeSend: function () {
                  submitButton.classList = 'd-none';
                  spinner.classList.remove('d-none');
            },
            success: function (res) {
                  Swal.fire({
                        icon: 'success',
                        title: 'Muito bom!',
                        text: "Pedido realizado com sucesso!",

                  }).then(function () {
                        window.location.href = `${urlThanks}?order=${res.data.order}`;
                  }).catch(swal.noop);


            }, error: function (err) {
                  spinner.classList = 'd-none';
                  spinnerEr.classList.remove('d-none');

                  if (numero.value == "") {
                        return Swal.fire({
                              icon: 'error',
                              title: 'Oops',
                              text: 'Coloque o numero para continuar',

                        }).then(function () {
                              location.reload();
                        }).catch(swal.noop);
                  }
                  if (dd.value == "") {
                        return Swal.fire({
                              icon: 'error',
                              title: 'Oops',
                              text: 'Coloque o dd para continuar',

                        }).then(function () {
                              location.reload();
                        }).catch(swal.noop);
                  }
                  if (telefone.value == "") {
                        return Swal.fire({
                              icon: 'error',
                              title: 'Oops',
                              text: 'Coloque o telefone para continuar',

                        }).then(function () {
                              location.reload();
                        }).catch(swal.noop);
                  } else {
                        return Swal.fire({
                              icon: 'error',
                              title: 'Oops',
                              text: 'Revise os dados de pagamento para continuar',

                        }).then(function () {
                              location.reload();
                        }).catch(swal.noop);
                  }
            }
      });


}
let submitButtonBoleto = document.querySelector('button.processCheckoutBoleto');

submitButtonBoleto.addEventListener('click', function (event) {

      event.preventDefault();
      let data = {
            hash: PagSeguroDirectPayment.getSenderHash(),
            shipping: $("input[name=correios]:checked").val(),
            metodo: $("input[name=correios]:checked").attr('id'),
            // card_name: document.querySelector('input[name=boleto_name]').value,
            card_cpf: document.querySelector('input[name=cpf]').value,
            // birth_date: document.querySelector('input[name=birth_date]').value,
            cep: document.querySelector('input[name=cep]').value,
            uf: document.querySelector('input[name=uf]').value,
            cidade: document.querySelector('input[name=cidade]').value,
            rua: document.querySelector('input[name=rua]').value,
            bairro: document.querySelector('input[name=bairro]').value,
            complemento: document.querySelector('input[name=complemento]').value,
            numero: document.querySelector('input[name=numero]').value,
            dd: document.querySelector('input[name=dd]').value,
            telefone: document.querySelector('input[name=telefone]').value,
            // _token: csrf
      };

      $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      $.ajax({
            type: 'POST',
            url: urlProccessBoleto,
            data: data,
            beforeSend: function () {
                  submitButtonBoleto.classList = 'd-none';
                  spinnerBol.classList.remove('d-none');
            },
            success: function (res) {


                  return Swal.fire({
                        icon: 'success',
                        title: 'Muito bom!',
                        text: 'Boleto gerado com sucesso!',

                  }).then(function () {
                        window.open(res.data.link, "_newtab");
                        window.location.href = `${urlThanks}?order=${res.data.order}`;
                  }).catch(swal.noop);
            },
            error: function (err) {
                  spinnerBol.classList = 'd-none';
                  spinnerErBol.classList.remove('d-none');
                  if (numero.value == "") {
                        return Swal.fire({
                              icon: 'error',
                              title: 'Oops',
                              text: 'Coloque o numero para continuar',

                        }).then(function () {
                              location.reload();
                        }).catch(swal.noop);
                  }
                  if (dd.value == "") {
                        return Swal.fire({
                              icon: 'error',
                              title: 'Oops',
                              text: 'Coloque o dd para continuar',

                        }).then(function () {
                              location.reload();
                        }).catch(swal.noop);
                  }
                  if (telefone.value == "") {
                        return Swal.fire({
                              icon: 'error',
                              title: 'Oops',
                              text: 'Coloque o telefone para continuar',

                        }).then(function () {
                              location.reload();
                        }).catch(swal.noop);
                  } else {
                        return Swal.fire({
                              icon: 'error',
                              title: 'Oops',
                              text: 'Revise os dados de pagamento para continuar',

                        }).then(function () {
                              location.reload();
                        }).catch(swal.noop);
                  }


            }
      });

});

function getInstallments(amount, brand) {
      PagSeguroDirectPayment.getInstallments({
            amount: amount,
            brand: brand,
            maxInstallmentNoInterest: 0,
            success: function (res) {
                  let selectInstallments = drawSelectInstallments(res.installments[brand]);
                  document.querySelector('div.installments').innerHTML = selectInstallments;
            },
            error: function (err) {
                  console.log(err);
            },
            complete: function (res) {

            }
      });
}
function drawSelectInstallments(installments) {
      let select = '<label>Opções de Parcelamento:</label>';

      select += '<select class="form-control select_installments">';

      for (let l of installments) {
            select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total
                  fica ${l.totalAmount}</option>`;
      }


      select += '</select>';

      return select;
}
function showErrorMessages(message) {
      return Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: `${message}`,

      }).then(function () {
            location.reload();
      }).catch(swal.noop);

}

function errorsMapPagseguroJS(code) {
      switch (code) {
            case "10000":
                  return 'Bandeira do cartão inválida!';
                  break;

            case "10001":
                  return 'Número do Cartão com tamanho inválido!';
                  break;

            case "10002":
            case "30405":
                  return 'Data com formato inválido!';
                  break;

            case "10003":
                  return 'Código de segurança inválido';
                  break;

            case "10004":
                  return 'Código de segurança é obrigatório!';
                  break;

            case "10006":
                  return 'Tamanho do código de segurança inválido!';
                  break;

            default:
                  return 'Houve um erro na validação do seu cartão de crédito!';
      }
}