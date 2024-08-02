// script para rolagem de seção (ancora)

document.querySelector('.down-arrow').addEventListener('click', function () {
  const element = document.querySelector('.bottons');
  const yOffset = -100;
  const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

  window.scrollTo({
    top: y,
    behavior: 'smooth',
  });
});

// fim da rolagem de seção (ancora)

const btn1 = document.querySelector('.btn1');
const btn2 = document.querySelector('.btn2');
const btn3 = document.querySelector('.btn3');

const content = document.querySelector('.teams-content');
const award = document.querySelector('.teams-award');
const rules = document.querySelector('.teams-rules');

// Função para esconder todas as divs de conteúdo
function hideAll() {
  [content, award, rules].forEach((div) => {
    div.classList.remove('show');
  });
}

// Função para mostrar a div selecionada
function showContent(divToShow) {
  hideAll(); // Esconde todas as divs
  divToShow.classList.add('show'); // Mostra a div desejada
}

// Função para atualizar a classe ativa dos botões
function setActiveButton(buttonToActivate) {
  [btn1, btn2, btn3].forEach((btn) => btn.classList.remove('active'));
  buttonToActivate.classList.add('active');
}

// Adiciona eventos de clique para cada botão
btn1.addEventListener('click', () => {
  showContent(rules);
  setActiveButton(btn1);
});
btn2.addEventListener('click', () => {
  showContent(content);
  setActiveButton(btn2);
});
btn3.addEventListener('click', () => {
  showContent(award);
  setActiveButton(btn3);
});

// Simula um clique no botão btn2 quando a página é carregada
window.addEventListener('load', () => {
  showContent(content); // Mostra o conteúdo do botão 2 por padrão
  setActiveButton(btn2); // Define o botão 2 como ativo
});

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

const chat = document.getElementById('chat');

const chatBnt = document.getElementById('enviar-chat');

chatBnt.addEventListener('click', (e) => {
  e.preventDefault();

  if (chat.length <= 0) {
    return;
  }

  const message = escapeScriptTags(chat.value);
});
