function escapeScriptTags(input) {
  return input.replace(/>/g, '&amp;').replace(/</g, '&lt;');
}

window.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('forget-form');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    if (escapeScriptTags(document.getElementById('emailPass').value) === '') {
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
    }).then(e => {
      window.location.href = "/";
    });
  })

});