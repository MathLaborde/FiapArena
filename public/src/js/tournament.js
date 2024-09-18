// Script para rolagem de seção (âncora)
document.querySelector('.down-arrow').addEventListener('click', function () {
  const element = document.querySelector('.bottons');
  const yOffset = -100;
  const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

  window.scrollTo({
    top: y,
    behavior: 'smooth',
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const awardBox = document.getElementById('box-teamsaward');
  const rulesBox = document.getElementById('box-teamsrules');
  const participantsBox = document.getElementById('box-teams-createby');

  const showBox = (boxToShow) => {
    awardBox.classList.remove('show');
    rulesBox.classList.remove('show');
    participantsBox.classList.remove('show');
    boxToShow.classList.add('show');
  };

  document.getElementById('show-rules').addEventListener('click', () => {
    showBox(rulesBox);
  });

  document.getElementById('show-participants').addEventListener('click', () => {
    showBox(participantsBox);
  });

  document.getElementById('show-award').addEventListener('click', () => {
    showBox(awardBox);
  });


  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

  const success = urlParams.get('success');
  const errorMessage = urlParams.get('error');
  const id = urlParams.get('id');

  if (errorMessage) {
    Swal.fire({
      title: 'Erro!',
      text: errorMessage,
      icon: 'error',
      confirmButtonText: 'Okay',
    }).then((e) => {
      window.location.href = '/tournament?id=' + id;
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
      window.location.href = '/tournament?id=' + id;
    });
  }
});
