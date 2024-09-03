function toggleMenu() {
  const menu = document.querySelector('.menu');
  const bars = document.querySelectorAll('.menu-hamburger .bar');

  menu.classList.toggle('show-menu');

  bars[0].classList.toggle('rotate1');
  bars[1].classList.toggle('rotate2');
  bars[2].classList.toggle('rotate3');
}
