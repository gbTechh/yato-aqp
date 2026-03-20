document.addEventListener('DOMContentLoaded', function () {
  const header = document.querySelector('.main-header'); 
  const whatsappLabel = document.querySelector('.js-whatsapp-label');
  const siteFooter = document.querySelector('#site-footer');
 
  // Función para manejar el scroll del header
  window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if (header && currentScroll > 50) {
      header.classList.add('bg-white')
      header.querySelectorAll('nav').forEach(element => {
        element.style.color = '#000'
      });
    } else if (header) {
      header.classList.remove('bg-white')
      header.querySelectorAll('nav').forEach(element => {
        element.removeAttribute("style");
      });
    }

    lastScroll = currentScroll;
  });

  const toggleWhatsappLabelByFooter = () => {
    if (!whatsappLabel || !siteFooter) {
      return;
    }

    const footerTop = siteFooter.getBoundingClientRect().top;
    const isNearFooter = footerTop <= window.innerHeight + 120;

    whatsappLabel.classList.toggle('opacity-100', isNearFooter);
    whatsappLabel.classList.toggle('opacity-0', !isNearFooter);
  };

  window.addEventListener('scroll', toggleWhatsappLabelByFooter);
  window.addEventListener('resize', toggleWhatsappLabelByFooter);
  toggleWhatsappLabelByFooter();

})

