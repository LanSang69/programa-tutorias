//Lógica para tener un navbar fijo en la parte superior
//Este solo se aplica al cubrir la parte del header

document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('nav');
    const navbarOffsetTop = navbar.offsetTop;
    const navbarHeight = navbar.offsetHeight;
    const main = document.querySelector('main');

    window.addEventListener('scroll', function() {
      if (window.scrollY >= navbarOffsetTop) {
        navbar.classList.add('fixed-nav');
        main.style.paddingTop = navbarHeight + 'px';
      } else {
        navbar.classList.remove('fixed-nav');
        main.style.paddingTop = '0px';
      }
    });
  });
  