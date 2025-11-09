// show menu
const navMenu = document.getElementById('nav-menu'), navToggle = document.getElementById('nav-toggle'), navClose = document.getElementById('nav-close')

    // menu show
if(navToggle){
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu')
    })
}

    // menu hidden
if(navClose){
    navClose.addEventListener('click', () =>{
        navMenu.classList.remove('show-menu')
    })
}

// remove menu mobile
const navLink = document.querySelectorAll('.nav__link')

const linkAction = () =>{
    const navMenu = document.getElementById('nav-menu')
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

// swiper home
const swiperHome = new Swiper('.home__swiper', {
  loop: true,
  slidesPerView: 'auto',
  grabCursor: true,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  autoplay: {
      delay: 3000,
      disableOnInteraction: false,
  }
})

// change background
const bgHeader = ()=>{
    const header = document.getElementById('header')
    this.scrollY >= 50 ? header.classList.add('bg-header') : header.classList.remove('bg-header')
}
window.addEventListener('scroll', bgHeader)

// show scroll up
const scrollUp = () => {
    const scrollUp = document.getElementById('scroll-up')
    this.scrollY >= 350 ? scrollUp.classList.add('show-scroll') : scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)

// scroll section active link
const sections = document.querySelectorAll('section[id]')

const scrollActive = () => {
  const scrollY = window.scrollY

  sections.forEach(current => {
    const sectionHeight = current.offsetHeight
    const sectionTop = current.offsetTop - 58
    const sectionId = current.getAttribute('id')
    const sectionClass = document.querySelector(`.nav__menu a[href*='${sectionId}']`)

    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
      sectionClass.classList.add('active-link')
    } else {
      sectionClass.classList.remove('active-link')
    }
  })
}
window.addEventListener('scroll', scrollActive)

// dark light theme
const themeButton = document.getElementById('theme-button')
const darkTheme = 'dark-theme'
const iconTheme = 'ri-sun-fill'

 //previously selected topic
const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')

 //obtain the current theme that the interface
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'ri-moon-fill' : 'ri-sun-fill'

 //validate if the user
if (selectedTheme) {
    document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
    themeButton.classList[selectedIcon === 'ri-moon-fill' ? 'add' : 'remove'](iconTheme)
}

 //active / deactive the theme manually
themeButton.addEventListener('click', () => {
    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)

    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrent())

})

// scrollreveal animation
const sr= ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2000,
    delay: 300,
    // reset: true,
})

let fiterItem = document.querySelector('.items-link');
let fileteImage = document.querySelectorAll('.project-img');

window.addEventListener('load', () => {
    // Menyembunyikan semua gambar yang tidak sesuai kategori aktif
    let activeItem = document.querySelector('.item-link.menu-active');
    if (activeItem) {
        let activeFilter = activeItem.getAttribute('data-name');
        fileteImage.forEach((image) => {
            let imageFilter = image.getAttribute('data-name');
            if (imageFilter === activeFilter) {
                image.style.display = 'block';
            } else {
                image.style.display = 'none';
            }
        });
    }

    // Tambahkan juga event klik seperti sebelumnya
    fiterItem.addEventListener('click', (selectedItem) => {
        if (selectedItem.target.classList.contains('item-link')) {
            document.querySelector('.menu-active').classList.remove('menu-active');
            selectedItem.target.classList.add('menu-active');

            let filterName = selectedItem.target.getAttribute('data-name');
            fileteImage.forEach((image) => {
                let filterImage = image.getAttribute('data-name');
                if (filterImage === filterName || filterName === 'all') {
                    image.style.display = 'block';
                } else {
                    image.style.display = 'none';
                }
            });
        }
    });
});


const modal = document.getElementById('myModal');
const closeBtn = document.querySelector('.modal .close');
const lihatBtns = document.querySelectorAll('.btn');

lihatBtns.forEach(btn => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    const card = btn.closest('.project-img');
    const title = card.querySelector('h4').innerText;
    const imgSrc = card.querySelector('img').getAttribute('src');

    modal.querySelector('.modal-title').innerText = title;
    modal.querySelector('.modal-img').setAttribute('src', imgSrc);
    modal.querySelector('.modal-description p').innerText =
      'Deskripsi detail tentang ' + title + ' akan muncul di sini.';

    modal.style.display = 'flex';
  });
});

closeBtn.addEventListener('click', () => {
  modal.style.display = 'none';
});

window.addEventListener('click', (e) => {
  if (e.target === modal) {
    modal.style.display = 'none';
  }
});




sr.reveal(`.home__container, .quiz__container, .footer__container`)
sr.reveal(`.home__title`, {delay: 600})
sr.reveal(`.home__description`, {delay: 900})
sr.reveal(`.home__data`, {delay: 1200})
sr.reveal(`.bahasa__card, .gallery__card`, {interval: 100})