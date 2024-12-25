// document.addEventListener('DOMContentLoaded', () => {
//     const aboutUsBtn = document.querySelector('.nav-btn:nth-child(1)');
//     const section1 = document.getElementById('section1');
//
//     if (aboutUsBtn && section1) {
//         aboutUsBtn.addEventListener('click', () => {
//             section1.scrollIntoView({ behavior: 'smooth' });
//         });
//     }
// });
document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('main-header');
    const hero = document.getElementById('hero');

    // Вычисляем высоту hero-секции (в пикселях)
    const heroHeight = hero.offsetHeight;

    window.addEventListener('scroll', () => {
        // Если окно прокручено больше, чем высота геро-секции, то делаем header белым
        if (window.scrollY > heroHeight * 0.9) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const hero = document.getElementById('hero');

    // Массив путей к картинкам
    const images = [
        './assets/slideshow/Kitchen-1.jpg',
        './assets/slideshow/Kitchen-2.jpg',
        './assets/slideshow/Living-room-2.jpg',
        './assets/slideshow/Living-room-1.webp',
        './assets/slideshow/Office-1.jpg',
        './assets/slideshow/Office-2.jpg',
    ];

    let currentIndex = 0;

    // Устанавливаем первую картинку
    hero.style.backgroundImage = `url(${images[currentIndex]})`;

    // Функция переключения
    function changeBackground() {
        // Дублируем текущее изображение поверх
        const nextIndex = (currentIndex + 1) % images.length;
        const nextImage = images[nextIndex];

        // Анимация плавного перехода
        const img = new Image();
        img.src = nextImage;

        img.onload = () => {
            hero.style.backgroundImage = `url(${nextImage})`;
            currentIndex = nextIndex; // Присваиваем новый индекс
        };
    }

    // Вызываем смену картинки каждые 5 секунд (5000 мс)
    setInterval(changeBackground, 5000);
});

