
let cardNumber = document.querySelector('input[name=card_number]');
let spanBrand = document.querySelector('span.brand');
// let value = document.querySelector('input[name=card_value]').value;


let buscaCep = document.querySelector('button.buscaCep');


      buscaCep.addEventListener("click", function (event) {
            event.preventDefault();

            var cep = document.querySelector("#cep");
            buscaCep.innerHTML = `<span class="spinner-grow  spinner-grow-sm" role="status" aria-hidden="true"></span>
  Buscando...`;

            axios
                  .post("/correios", {
                        cep: cep.value,
                  })
                  .then(function (response) {
                        console.log(response);
                        buscaCep.innerHTML = ' Buscar';
                        $("#uf").val(response.data[0].uf);
                        $("#cidade").val(response.data[0].city);
                        $("#rua").val(response.data[0].street);
                        $("#bairro").val(response.data[0].district);

                        //formatador monetario //
                        var sedex = response.data[1][0].price;
                        var txtsedex = sedex.toLocaleString("pt-BR", {
                              style: "currency",
                              currency: "BRL",
                        });
                        var pac = response.data[1][1].price;
                        var total = response.data[4];

                        var txtpac = pac.toLocaleString("pt-BR", {
                              style: "currency",
                              currency: "BRL",
                        });


                        $('#sedexval').val(sedex);
                        $('#pacval').val(pac);
                        $('#local').val(0);

                        (function () {
                              var radios = document.getElementsByName('correios');
                              console.log(radios);
                              for (var i = 0; i < radios.length; i++) {
                                    radios[i].onclick = function () {
                                           totalsum = parseFloat(this.value) + parseFloat(total);
                                          // document.querySelector('input[name=card_value]').value = totalsum;
                                          // $("#total").empty();
                                         
                                          var txttotal = totalsum.toLocaleString("pt-BR", {
                                                style: "currency",
                                                currency: "BRL",
                                          });
                                          $("#total").html("<strong>TOTAL:</strong>" + " " + txttotal);
                                    }
                              }
                        })();



                        $("#sedex").html(txtsedex);
                        $("#pac").html(txtpac);





                        $("#shipping").removeClass("d-none");

                       
                  })
                  .catch(function (error) {
                        console.log(error);
                  });
      });


cardNumber.addEventListener('keyup', function () {
      if (cardNumber.value.length >= 6) {
            PagSeguroDirectPayment.getBrand({
                  cardBin: cardNumber.value.substr(0, 6),
                  success: function (res) {
                        let imgFlag = `<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${res.brand.name}.png">`;
                        spanBrand.innerHTML = imgFlag;
                        document.querySelector('input[name=card_brand]').value = res.brand.name;
                        getInstallments(totalsum, res.brand.name);

                  },
                  error: function (err) {
                        // console.log(err);
                  },
                  complete: function (res) {
                        //      console.log('Complete', res);
                  },
            });
      }
});

let submitButton = document.querySelector('button.processCheckout');
let spinner = document.querySelector('div.spinner');
let spinnerEr = document.querySelector('div.spinner-er');
let spinnerBol = document.querySelector('div.spinnerBol');
let spinnerErBol = document.querySelector('div.spinner-erBol');
submitButton.addEventListener('click', function (event) {

      event.preventDefault();

      PagSeguroDirectPayment.createCardToken({
            cardNumber: document.querySelector('input[name=card_number]').value,
            brand: document.querySelector('input[name=card_brand]').value,
            cvv: document.querySelector('input[name=cvv]').value,
            expirationMonth: document.querySelector('input[name=expiration_month]').value,
            expirationYear: document.querySelector('input[name=expiration_year]').value,

            success: function (res) {
                  processPayment(res.card.token);
            },
            error: function (err) {
                 console.log(err);
            }


      });
});

