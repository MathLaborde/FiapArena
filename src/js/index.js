const usuarios = [
  {
    email: 'pedro@gmail.com',
    senha: '12345@aA',
  },
];

window.addEventListener('load', () => {
  const password = document.getElementById('passwordAcc');
  const cPassword = document.getElementById('cpasswordAcc');
  const passwordBox = document.getElementById('passwordBox');
  const passwordBox2 = document.getElementById('passwordBox2');
  const cMail = document.getElementById('cmailAcc');
  const emailBox = document.getElementById('emailBox');

  password.addEventListener('input', (e) => {
    e.preventDefault();

    const pass = e.target.value;
    const erros = validaSenha(pass);

    if (erros.length != 0) {
      const teste = erros.join(`</li><li style="font-size: 0.8rem">`);
      passwordBox.innerHTML = `<ul class="error"><li style="font-size: 0.8rem">${teste}</li></ul>`;
      return;
    }
    passwordBox.innerHTML = ``;
    return;
  });

  cPassword.addEventListener('input', (e) => {
    e.preventDefault();

    if (password.value !== cPassword.value) {
      passwordBox2.innerHTML = `<ul class="error"><li style="font-size: 0.8rem" >Para garantir a segurança, a senha de confirmação precisa ser igual à senha original.</li></ul>`;
    } else {
      passwordBox2.innerHTML = ``;
    }
  });

  cMail.addEventListener('input', (e) => {
    e.preventDefault();
    const email = document.getElementById('emailAcc').value;
    if (cMail.value !== email) {
      emailBox.innerHTML = `<ul class="error"><li style="font-size: 0.8rem" >Para garantir a segurança, o email de confirmação precisa ser igual ao email original.</li></ul>`;
    } else {
      emailBox.innerHTML = ``;
    }
  });
});
function changedPath(path) {
  const login = document.getElementById('login');
  const password = document.getElementById('passwordDiv');
  const account = document.getElementById('account');

  if (path === 'login') {
    login.style.display = 'block';
    account.style.display = 'none';
    password.style.display = 'none';
  } else if (path === 'account') {
    login.style.display = 'none';
    account.style.display = 'block';
    password.style.display = 'none';
  } else if (path === 'password') {
    login.style.display = 'none';
    account.style.display = 'none';
    password.style.display = 'block';
  }
}

function fazerLogin() {
  const password = document.getElementById('password').value;
  const email = document.getElementById('email').value;

  if (email === '') {
    Swal.fire({
      title: 'Campo de email vazio!',
      text: 'Favor preencher campo email!',
      icon: 'info',
    });
    return;
  }
  if (password === '') {
    Swal.fire({
      title: 'Campo de senha vazio!',
      text: 'Favor preencher campo senha!',
      icon: 'info',
    });
    return;
  }

  usuarios.forEach((user) => {
    if (user.senha === password && user.email === email) {
      Swal.fire({
        title: 'Sucesso!',
        text: 'Acesso Liberado!',
        icon: 'success',
      }).then((e) => {
        window.location.href = 'home.html';
      });
    } else {
      Swal.fire({
        title: 'Error!',
        text: 'Acesso Negado, confira email e senha!',
        icon: 'error',
      });
    }
  });
}

function enviarEmail() {
  if (document.getElementById('emailPass').value === '') {
    Swal.fire({
      title: 'Email vazio!',
      text: 'Favor preencher campo email!',
      icon: 'info',
    });
    return;
  }

  Swal.fire({
    title: 'Email encaminhado!',
    text: 'As instruções de recuperação foram encaminhadas por email!',
    icon: 'success',
  });
}

function enviarDados() {
  const user = document.getElementById('userAcc').value;
  const senha = document.getElementById('passwordAcc').value;
  const cSenha = document.getElementById('cpasswordAcc').value;
  const email = document.getElementById('emailAcc').value;
  const cmail = document.getElementById('cmailAcc').value;
  const termo = document.getElementById('termoAcc').checked;

  if (user === '') {
    Swal.fire({
      title: 'Usuario vazio!',
      text: 'Favor preencher campo usuario!',
      icon: 'info',
    });
    return;
  }

  if (email === '') {
    Swal.fire({
      title: 'Email vazio!',
      text: 'Favor preencher campo email!',
      icon: 'info',
    });
    return;
  }

  if (email !== cmail) {
    Swal.fire({
      title: 'Email e Email de Confirmação divergentes!',
      text: 'Favor conferir email e email de confirmação!',
      icon: 'info',
    });
    return;
  }

  if (senha === '') {
    Swal.fire({
      title: 'Senha vazia!',
      text: 'Favor preencher campo senha!',
      icon: 'info',
    });
    return;
  }

  if (senha !== cSenha) {
    Swal.fire({
      title: 'Senha e Senha de Confirmação divergentes!',
      text: 'Favor conferir senha e senha de confirmação!',
      icon: 'info',
    });
    return;
  }

  if (validaSenha(senha).length > 0) {
    Swal.fire({
      title: 'A senha não cumpre todos os requisitos!',
      text: 'Favor criar uma senha que condiza com as informações abaixo do campo senha',
      icon: 'info',
    });
    return;
  }

  if (!termo) {
    Swal.fire({
      title: 'Termo não aceito!',
      text: 'É necessario aceitar os termos e condições para continuar!',
      icon: 'info',
    });
    return;
  }

  usuarios.push({ user, senha, email });

  Swal.fire({
    title: 'Sucesso!',
    text: 'Usuario criado com sucesso!',
    icon: 'success',
  }).then((e) => {
    window.location.href = 'home.html';
  });
}

function validaSenha(pass) {
  const regexMaiuscula = /[A-Z]/;
  const regexMinuscula = /[a-z]/;
  const regexNumero = /[0-9]/;
  const regexEspecial = /[!@#$%^&*-+]/;

  const erros = [];

  if (pass.length < 8) {
    erros.push('A senha deve ter pelo menos 8 caracteres.');
  }

  if (!regexMaiuscula.test(pass)) {
    erros.push(`A senha deve conter pelo menos uma letra maiúscula.`);
  }

  if (!regexMinuscula.test(pass)) {
    erros.push(`A senha deve conter pelo menos uma letra minúscula.`);
  }

  if (!regexNumero.test(pass)) {
    erros.push(`A senha deve conter pelo menos um número.`);
  }

  if (!regexEspecial.test(pass)) {
    erros.push(
      `A senha deve conter pelo menos um dos caracteres especial abaixo: <br> !@#$%^&*-+`,
    );
  }

  return erros;
}
