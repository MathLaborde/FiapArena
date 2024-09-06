document.addEventListener('DOMContentLoaded', function () {
  const thumbnails = document.querySelectorAll('.carousel-thumbnail');
  const displayImage = document.getElementById('display-image');
  const text = document.getElementById('text');
  const largeText = document.getElementById('image-large-text');
  const exploreButton = document.querySelector('.explore-button'); // Seleciona o botão

  thumbnails.forEach((thumbnail) => {
    thumbnail.addEventListener('click', function () {
      const src = `${thumbnail.getAttribute('data-img')}`;
      const dataText = thumbnail.getAttribute('data-text');
      const large = thumbnail.getAttribute('data-large-text');
      const href = thumbnail.getAttribute('data-href');

      // explore-button

      displayImage.src = src;
      text.textContent = dataText;
      largeText.textContent = large;
      exploreButton.href = href;

      // Adicionando a imagem como fundo da página
      document.body.style.backgroundImage = `url(${src})`;
      document.body.style.backgroundSize = 'cover';
      document.body.style.backgroundRepeat = 'no-repeat';
      document.body.style.backgroundPosition = 'center center';

      // Removendo a classe 'active' de todas as miniaturas
      thumbnails.forEach((img) => img.classList.remove('active'));

      // Adicionando a classe 'active' à miniatura clicada
      thumbnail.classList.add('active');
    });
  });

  thumbnails[0].click();
});
