window.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('login');

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

  const errorMessage = urlParams.get('error');
  const success = urlParams.get('success');

  if (errorMessage) {
    Swal.fire({
      title: 'Erro!',
      text: errorMessage,
      icon: 'error',
      confirmButtonText: 'Okay',
    }).then((e) => {
      window.location.href = '/';
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
    return;
  }

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const password = escapeScriptTags(document.getElementById('password').value);
    const email = escapeScriptTags(document.getElementById('email').value);

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

    form.submit();
  });
});

function escapeScriptTags(input) {
  return input.replace(/>/g, '&amp;').replace(/</g, '&lt;');
}
