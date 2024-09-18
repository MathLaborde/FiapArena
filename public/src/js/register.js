
window.addEventListener('load', () => {

  // Mesangens do backend

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

  const success = urlParams.get('success');
  const errorMessage = urlParams.get('error');

  if (errorMessage) {
    Swal.fire({
      title: 'Erro!',
      text: errorMessage,
      icon: 'error',
      confirmButtonText: 'Okay',
    }).then((e) => {
      window.location.href = '/login/register';
    });

    return;
  }

  if (success) {
    Swal.fire({
      title: 'Sucesso!',
      text: success,
      icon: 'success',
      confirmButtonText: 'Okay',
    }).then((e) => {
      window.location.href = '/';
    });
  }

  // Fim Mensagens do backend


  // Eventos de validações do frontend
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
    const email = escapeScriptTags(document.getElementById('emailAcc').value);
    if (cMail.value !== email) {
      emailBox.innerHTML = `<ul class="error"><li style="font-size: 0.8rem" >Para garantir a segurança, o email de confirmação precisa ser igual ao email original.</li></ul>`;
    } else {
      emailBox.innerHTML = ``;
    }
  });

  // Fim Eventos de validações do frontend


  const form = document.getElementById('register');

  form.addEventListener('submit', (e) => {

    e.preventDefault();

    const user = escapeScriptTags(document.getElementById('userAcc').value);
    const senha = escapeScriptTags(document.getElementById('passwordAcc').value);
    const cSenha = escapeScriptTags(
      document.getElementById('cpasswordAcc').value,
    );
    const email = escapeScriptTags(document.getElementById('emailAcc').value);
    const cmail = escapeScriptTags(document.getElementById('cmailAcc').value);

    if (user === '') {
      Swal.fire('Usuario vazio!', 'Favor preencher campo usuario!', 'info');
      return;
    }

    if (email === '') {
      Swal.fire('Email vazio!', 'Favor preencher campo email!', 'info',);
      return;
    }

    if (email !== cmail) {
      Swal.fire('Email e Email de Confirmação divergentes!', 'Favor conferir email e email de confirmação!', 'info',);
      return;
    }

    if (senha === '') {
      Swal.fire('Senha vazia!', 'Favor preencher campo senha!', 'info');
      return;
    }

    if (senha !== cSenha) {
      Swal.fire('Senha e Senha de Confirmação divergentes!', 'Favor conferir senha e senha de confirmação!', 'info',);
      return;
    }

    if (validaSenha(senha).length > 0) {
      Swal.fire('A senha não cumpre todos os requisitos!', 'Favor criar uma senha que condiza com as informações abaixo do campo senha', 'info',);
      return;
    }


    Swal.fire({
      title: 'Termos e Condições!',
      html: /*Html*/ `
        <div class="term">
          <h1 class="term-title">1. Introdução</h1>
          <p class="term-p">Bem-vindo à nossa plataforma de torneios de games da FIAP. Ao criar uma conta e utilizar nossos
            serviços, você concorda com os presentes Termos e Condições, que estabelecem as regras de uso da plataforma e o
            tratamento de seus dados pessoais em conformidade com a Lei Geral de Proteção de Dados (LGPD) - Lei nº 13.709/2018.
          </p>
          <h1 class="term-title">2. Dados Coletados</h1>
          <p class="term-p">
            Ao utilizar nossa plataforma, coletamos os seguintes dados pessoais:
          <ul class="term-list">
            <li>Nome completo;</li>
            <li>Endereço de e-mail;</li>
            <li>Senha (armazenada de forma criptografada);</li>
            <li>Curso.</li>
          </ul>
          </p>
          <h1 class="term-title">3. Finalidade do Tratamento de Dados</h1>
          <p class="term-p">
            Os dados são coletados com a finalidade de:
          </p>          
            <ul class="term-list">
              <li>Permitir a criação e o acesso à sua conta;</li>
              <li>Identificar os participantes nos torneios;</li>
              <li>Facilitar a comunicação entre os membros da comunidade acadêmica;</li>
              <li>Garantir a segurança das operações na plataforma, incluindo autenticação por dois fatores (2FA) via e-mail.</li>
            </ul>
          
          <h1 class="term-title">4. Direitos dos Titulares de Dados</h1>
          <p class="term-p">Em conformidade com a LGPD, você possui os seguintes direitos em relação aos seus dados pessoais:</p>
          <h2 class="term-sub-title">4.1 Confirmação e Acesso</h2>
          <p class="term-p">
            Você tem o direito de solicitar a confirmação da existência de tratamento dos seus dados e acessar os dados pessoais
            que mantemos sobre você.
          </p>
          <h2 class="term-sub-title">4.2 Correção de Dados</h2>
          <p class="term-p">Você pode solicitar a correção de dados pessoais incompletos, inexatos ou desatualizados.</p>
          <h2 class="term-sub-title">4.3 Anonimização, Bloqueio ou Eliminação de Dados</h2>
          <p class="term-p">
            Você tem o direito de solicitar a anonimização, bloqueio ou eliminação de dados considerados desnecessários,
            excessivos ou tratados de maneira inadequada.
          </p>
          <h2 class="term-sub-title">4.4 Portabilidade de Dados</h2>
          <p class="term-p">
            Você pode solicitar a portabilidade dos seus dados para outro controlador ou fornecedor de serviços, respeitadas as
            regulamentações da autoridade competente.
          </p>
          <h2 class="term-sub-title">4.5 Eliminação de Dados</h2>
          <p class="term-p">
            Você pode solicitar a eliminação dos dados pessoais tratados com o seu consentimento, exceto quando o armazenamento
            dos dados for exigido por lei.
          </p>
          <h2 class="term-sub-title">4.6 Revogação do Consentimento</h2>
          <p class="term-p">
            Você pode, a qualquer momento, revogar o consentimento anteriormente concedido para o tratamento dos seus dados
            pessoais.
          </p>
          <h2 class="term-sub-title">4.7 Oposição ao Tratamento</h2>
          <p class="term-p">
            Caso discorde de como tratamos os seus dados, você pode se opor ao tratamento em determinadas situações, conforme
            estabelecido pela LGPD.
          </p>
          <h2 class="term-sub-title">4.8 Informação sobre Compartilhamento de Dados</h2>
          <p class="term-p">Você tem o direito de ser informado sobre as entidades com as quais compartilhamos os seus dados pessoais.</p>
          <h2 class="term-sub-title">4.9 Reclamação à Autoridade Nacional</h2>
          <p class="term-p">
            Caso sinta que seus direitos não estão sendo respeitados, você pode registrar uma reclamação junto à Autoridade
            Nacional de Proteção de Dados (ANPD).
          </p>
          <h1 class="term-title">5. Compartilhamento de Dados</h1>
          <p class="term-p">
            Os seus dados pessoais podem ser compartilhados com parceiros da faculdade exclusivamente para a realização e
            organização dos torneios, sempre em conformidade com a LGPD. Não comercializamos seus dados pessoais com terceiros.
          </p>
          <h1 class="term-title">6. Segurança dos Dados</h1>
          <p class="term-p">
            Nós adotamos medidas de segurança técnicas e administrativas para proteger os seus dados pessoais de acessos não
            autorizados, perdas, destruição ou vazamentos.
          </p>
          <h1 class="term-title">7. Alterações nos Termos e Condições</h1>
          <p class="term-p">
            Reservamo-nos o direito de modificar estes Termos e Condições a qualquer momento, com aviso prévio aos usuários da
            plataforma. Recomendamos que você reveja os Termos periodicamente para estar ciente de quaisquer atualizações.
          </p>
          <h1 class="term-title">8. Como Solicitar Informações sobre seus Dados</h1>
          <p class="term-p">
            Para exercer qualquer um dos direitos acima, você pode entrar em contato com nosso suporte enviando uma solicitação
            via e-mail. Todas as solicitações serão analisadas e respondidas dentro do prazo legal.
            <a href="mailto:rm557797@fiap.com.br">rm557797@fiap.com.br</a>
          </p>
          

          <h1 class="term-title">9. Legislação Aplicável</h1>
          <p class="term-p">
            Estes Termos e Condições são regidos pela legislação brasileira, em especial pela Lei Geral de Proteção de Dados
            Pessoais (LGPD).
          </p>
          <h1 class="term-title">10. Contato</h1>
          <p class="term-p">
            Em caso de dúvidas sobre estes Termos e Condições ou sobre o tratamento de dados pessoais, entre em contato conosco
            através do e-mail: <a href="mailto:rm557797@fiap.com.br">rm557797@fiap.com.br</a>
            .
          </p>
        </div>
      `,
      icon: 'info',
      confirmButtonText: 'Aceito os termos',
      showCancelButton: true,
      denyIcon: 'times',
      cancelButtonText: 'Não, eu não aceito',
      confirmButtonColor: '#3085d6',
    }).then(e => {
      if (e.isConfirmed) {
        form.submit();
      }
    });
  });

});

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

function escapeScriptTags(input) {
  return input.replace(/>/g, '&amp;').replace(/</g, '&lt;');
}



