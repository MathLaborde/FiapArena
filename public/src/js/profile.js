document.addEventListener('DOMContentLoaded', function () {
  const nomeInput = document.getElementById('name');
  const courseInput = document.getElementById('course');

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
      }
    });
  });
});

function submitForm() {
  const currentPassword = document.getElementById('current-password').value;
  const newPassword = document.getElementById('new-password').value;

  Swal.fire({
    title: 'Alterar senha.',
    text: 'Deseja alterar a sua senha?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Sim',
    cancelButtonText: 'Não',
  }).then((e) => {
    if (e.isConfirmed) {
      const error = validaSenha(newPassword);

      if (error) {
        Swal.fire({
          title: 'Senha inválida.',
          text: error,
          icon: 'error',
          confirmButtonText: 'Okay',
        });

        return;
      }
    }
  });
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

document
  .getElementById('edit-banner-profile')
  .addEventListener('change', function () {
    Swal.fire({
      title: 'Baner.',
      text: 'Deseja alterar o baner do perfil?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Sim',
      cancelButtonText: 'Não',
    }).then((e) => {
      if (e.isConfirmed) {
        const formData = new FormData();
        formData.append('banner', this.files[0]);

        this.files[0] = null;
        fetch('/profile/banner/edit', {
          method: 'POST',
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              Swal.fire({
                title: 'Sucesso!',
                text: 'Banner alterada com sucesso.',
                icon: 'success',
                confirmButtonText: 'Okay',
              }).then((e) => location.reload());
            } else {
              Swal.fire({
                title: 'Error!',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'Okay',
              }).then((e) => location.reload());
            }
          });
      }
    });
  });

document
  .getElementById('edit-photo-profile')
  .addEventListener('change', function () {
    Swal.fire({
      title: 'Foto de Perfil.',
      text: 'Deseja alterar a sua foto de perfil?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Sim',
      cancelButtonText: 'Não',
    }).then((e) => {
      if (e.isConfirmed) {
        const formData = new FormData();
        formData.append('image', this.files[0]);

        this.files[0] = null;
        fetch('/profile/photo/edit', {
          method: 'POST',
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              Swal.fire({
                title: 'Sucesso!',
                text: 'Foto de Perfil alterada com sucesso.',
                icon: 'success',
                confirmButtonText: 'Okay',
              }).then((e) => location.reload());
            } else {
              Swal.fire({
                title: 'Error!',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'Okay',
              }).then((e) => location.reload());
            }
          });
      }
    });
  });
