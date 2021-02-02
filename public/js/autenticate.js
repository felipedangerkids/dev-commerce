let btnLogin = document.querySelector('button.btnLogin');
let btnRegister = document.querySelector('button.btnRegister');
let email = document.querySelectorAll('input[name=email]');
var nameInput = document.querySelector('input[name=name]');
let password = document.querySelectorAll('input[name=password]');
let password_confirmation = document.querySelector('input[name=password_confirmation]');



btnLogin.addEventListener('click', function (event) {

      event.preventDefault();
      btnLogin.innerHTML = `<span class="spinner-grow  spinner-grow-sm" role="status" aria-hidden="true"></span>
  Logando...`;
      axios.post('/login', {
            email: email[0].value,
            password: password[0].value
      })
            .then(function (response) {
                  btnRegister.innerHTML = ' Entrar';
                  Swal.fire({
                        icon: 'success',
                        title: 'Muito bom!',
                        text: "Logado com sucesso",

                  }).then(function () {
                        location.reload();
                  }).catch(swal.noop);
            })
            .catch(function (error) {
                  btnRegister.innerHTML = ' Entrar';
                        Swal.fire({
                              icon: 'error',
                              title: 'Oops!',
                              text: "Email ou senha incorretos verifique",

                        }).then(function () {
                              location.reload();
                        }).catch(swal.noop);
                 
            });

});
btnRegister.addEventListener('click', function (event) {

      event.preventDefault();
      btnRegister.innerHTML = `<span class="spinner-grow  spinner-grow-sm" role="status" aria-hidden="true"></span>
  Registrando...`;

      axios.post('/register', {
            name: nameInput.value,
            email: email[1].value,
            password: password[1].value,
            password_confirmation: password_confirmation.value
      })
            .then(function (response) {
                  btnRegister.innerHTML = ' Registrar';
                  Swal.fire({
                        icon: 'success',
                        title: 'Muito bom!',
                        text: "Registrado com sucesso",

                  }).then(function () {
                        location.reload();
                  }).catch(swal.noop);
            })
            .catch(function (error) {
                        Swal.fire({
                              icon: 'error',
                              title: 'Oops!',
                              text: "Verifique os dados e preencha novamente",

                        }).then(function () {
                              location.reload();
                        }).catch(swal.noop);
                 
            });

});