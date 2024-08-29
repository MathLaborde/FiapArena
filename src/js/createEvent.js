// #region Configuração do Quill Editor

const toolbarOptions = [
  [{ size: ['small', false, 'large', 'huge'] }],
  [{ header: [1, 2, 3, 4, 5, 6, false] }],
  ['bold', 'italic', 'underline', 'strike'],
  [{ color: [] }, { background: [] }],
  ['link', 'blockquote'],
  [{ list: 'ordered' }, { list: 'bullet' }, { list: 'check' }],
  [{ align: [] }, { indent: '-1' }, { indent: '+1' }],
  [{ font: [] }],
];

const rulesQuill = new Quill('#tournament-rules', {
  modules: {
    toolbar: toolbarOptions,
  },
  theme: 'snow',
  placeholder: 'As regras são...',
});

const awardQuill = new Quill('#tournament-award', {
  modules: {
    toolbar: toolbarOptions,
  },
  theme: 'snow',
  placeholder: 'A premiação é...',
});

// #endregion

// #region Função de abrir menu hamburguer
function toggleMenu() {
  const menu = document.querySelector('.menu');
  const bars = document.querySelectorAll('.menu-hamburger .bar');

  menu.classList.toggle('show-menu');

  bars[0].classList.toggle('rotate1');
  bars[1].classList.toggle('rotate2');
  bars[2].classList.toggle('rotate3');
}

// #endregion

// #region Validações
const form = document.getElementById('tournament');

form.addEventListener('submit', (e) => {
  e.preventDefault();

  const rules = escapeScriptTags(rulesQuill.container.textContent);
  const award = escapeScriptTags(awardQuill.container.textContent);

  const name = escapeScriptTags(form.querySelector('#tournament-name').value);
  const description = escapeScriptTags(
    form.querySelector('#tournament-description').value,
  );

  const imgInput = form.querySelector('#tournament-img');
  const file = imgInput.files;

  const img = file?.length > 0 ? file[0] : null;

  const shortImgInput = form.querySelector('#tournament-img');
  const shortFile = shortImgInput.files;

  const shortImg = shortFile?.length > 0 ? shortFile[0] : null;

  const maxSize = 10 * 1024 * 1024;

  // #region Validation
  // if (name.length <= 0) {
  //   Swal.fire({
  //     title: 'Nome não preenchido!',
  //     text: 'Por favor, preencha o nome do torneio.',
  //     icon: 'error',
  //     confirmButtonText: 'Okay',
  //   });
  //   return;
  // }

  // if (description.length <= 0) {
  //   Swal.fire({
  //     title: 'Descrição não preenchida!',
  //     text: 'Por favor, preencha a descrição do torneio.',
  //     icon: 'error',
  //     confirmButtonText: 'Okay',
  //   });
  //   return;
  // }

  // if (!img) {
  //   Swal.fire({
  //     title: 'Imagem não inserida!',
  //     text: 'Por favor, inserir uma imagem.',
  //     icon: 'error',
  //     confirmButtonText: 'Okay',
  //   });
  //   return;
  // }

  // if (!img.type.startsWith('image/')) {
  //   Swal.fire({
  //     title: 'Formato de imagem inválido!',
  //     text: 'Por favor, utilize uma imagem do tipo PNG, JPEG ou JPG.',
  //     icon: 'error',
  //     confirmButtonText: 'Okay',
  //   });
  //   imgInput.value = '';

  //   return;
  // }

  // if (img.size > maxSize) {
  //   Swal.fire({
  //     title: 'Aquivo muito grande!',
  //     text: 'Por favor, insira uma imagem de no máximo 10 mb.',
  //     icon: 'error',
  //     confirmButtonText: 'Okay',
  //   });

  //   imgInput.value = '';

  //   return;
  // }

  // if (!shortImg) {
  //   Swal.fire({
  //     title: 'Imagem não inserida!',
  //     text: 'Por favor, inserir uma imagem.',
  //     icon: 'error',
  //     confirmButtonText: 'Okay',
  //   });
  //   return;
  // }

  // if (!shortImg.type.startsWith('image/')) {
  //   Swal.fire({
  //     title: 'Formato de imagem inválido!',
  //     text: 'Por favor, utilize uma imagem do tipo PNG, JPEG ou JPG.',
  //     icon: 'error',
  //     confirmButtonText: 'Okay',
  //   });
  //   imgInput.value = '';

  //   return;
  // }

  // if (shortImg.size > maxSize) {
  //   Swal.fire({
  //     title: 'Aquivo muito grande!',
  //     text: 'Por favor, insira uma imagem de no máximo 10 mb.',
  //     icon: 'error',
  //     confirmButtonText: 'Okay',
  //   });

  //   imgInput.value = '';

  //   return;
  // }

  // if (rules.length <= 0) {
  //   Swal.fire({
  //     title: 'Regras não preenchidas!',
  //     text: 'Por favor, preencha as regras do torneio.',
  //     icon: 'error',
  //     confirmButtonText: 'Okay',
  //   });
  //   return;
  // }

  // if (award.length <= 0) {
  //   Swal.fire({
  //     title: 'Premiação não preenchidas!',
  //     text: 'Por favor, preencha a premiação do torneio.',
  //     icon: 'error',
  //     confirmButtonText: 'Okay',
  //   });
  //   return;
  // }
  // #endregion Validation

  const rulesInput = document.createElement('input');
  rulesInput.type = 'hidden';
  rulesInput.name = 'rules';
  rulesInput.value = rules;

  form.appendChild(rulesInput);

  const awardInput = document.createElement('input');
  awardInput.type = 'hidden';
  awardInput.name = 'award';
  awardInput.value = award;

  form.appendChild(awardInput);

  form.submit();
});

// #endregion

function escapeScriptTags(input) {
  return input.replace(/>/g, '&amp;').replace(/</g, '&lt;');
}

document.addEventListener('DOMContentLoaded', function () {
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
      window.location.href = 'createEvent.php';
    });

    return;
  }

  if (success) {
    Swal.fire({
      title: 'Sucesso!',
      text: 'Torneio criado com sucesso.',
      icon: 'success',
      confirmButtonText: 'Okay',
    }).then((e) => {
      window.location.href = 'Tournament.html';
    });
  }
});
