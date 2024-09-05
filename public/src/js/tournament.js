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
});
