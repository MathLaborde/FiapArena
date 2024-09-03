document.addEventListener('DOMContentLoaded', function () {
  const nomeInput = document.getElementById('name');
  const courseInput = document.getElementById('course');

  const profileName = localStorage.getItem('profileName');
  const profileCourse = localStorage.getItem('profileCourse');

  nomeInput.value = profileName ? profileName : 'Pedro Gonsalves ';
  courseInput.value = profileCourse ? profileCourse : 'Sistema da Informação ';

  nomeInput.addEventListener('focusout', () => {
    const nome = escapeScriptTags(nomeInput.value);

    Swal.fire({
      title: 'Mudar nome.',
      text: `Deseja mudar seu nome para ${nome}`,
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Sim',
      cancelButtonText: 'Não',
    }).then((e) => {
      if (e.isConfirmed) {
        localStorage.removeItem('profileName');
        localStorage.setItem('profileName', nome);
      }
    });
  });

  courseInput.addEventListener('focusout', () => {
    const course = escapeScriptTags(courseInput.value);

    Swal.fire({
      title: 'Mudar curso.',
      text: `Deseja mudar seu curso para ${course}`,
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Sim',
      cancelButtonText: 'Não',
    }).then((e) => {
      if (e.isConfirmed) {
        localStorage.removeItem('profileCourse');
        localStorage.setItem('profileCourse', course);
      }
    });
  });
});

function submitForm() {
  const currentPassword = document.getElementById('current-password').value;
  const newPassword = document.getElementById('new-password').value;

  const error = validaSenha(newPassword);

  if (currentPassword !== usuarios[0].senha) {
    Swal.fire({
      title: 'Senha Invalida.',
      text: 'Senha não condiz com a senha atual.',
      icon: 'error',
      confirmButtonText: 'Okay',
    });

    return;
  }

  if (error) {
    Swal.fire({
      title: 'Senha inválida.',
      text: error,
      icon: 'error',
      confirmButtonText: 'Okay',
    });

    return;
  }

  Swal.fire({
    title: 'Alterar senha.',
    text: 'Deseja alterar a sua senha?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Sim',
    cancelButtonText: 'Não',
  }).then((e) => {
    if (e.isConfirmed) {
      Swal.fire({
        title: 'Senha alterada com sucesso.',
        text: 'Você alterou sua senha.',
        icon: 'success',
        confirmButtonText: 'Okay',
      });
    }
  });
}

function toggleMenu() {
  const menu = document.querySelector('.menu');
  const bars = document.querySelectorAll('.menu-hamburger .bar');

  menu.classList.toggle('show-menu');

  bars[0].classList.toggle('rotate1');
  bars[1].classList.toggle('rotate2');
  bars[2].classList.toggle('rotate3');
}

function escapeScriptTags(input) {
  return input.replace(/>/g, '&amp;').replace(/</g, '&lt;');
}

function validaSenha(pass) {
  const regexMaiuscula = /[A-Z]/;
  const regexMinuscula = /[a-z]/;
  const regexNumero = /[0-9]/;
  const regexEspecial = /[!@#$%^&*-+]/;

  if (pass.length < 8) {
    return 'A senha deve ter pelo menos 8 caracteres.';
  }

  if (!regexMaiuscula.test(pass)) {
    return `A senha deve conter pelo menos uma letra maiúscula.`;
  }

  if (!regexMinuscula.test(pass)) {
    return `A senha deve conter pelo menos uma letra minúscula.`;
  }

  if (!regexNumero.test(pass)) {
    return `A senha deve conter pelo menos um número.`;
  }

  if (!regexEspecial.test(pass)) {
    `A senha deve conter pelo menos um dos caracteres especial abaixo: <br> !@#$%^&*-+`;
    return;
  }

  return null;
}
