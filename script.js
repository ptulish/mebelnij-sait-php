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

function toggleCarousel(sectionId) {
    // Получаем все карусели
    const carousels = document.querySelectorAll('.carousel');

    // Перебираем карусели и скрываем их, если они неактивны
    carousels.forEach((carousel, index) => {
        if (index === sectionId - 1) {
            carousel.classList.toggle('active'); // Переключение активности
        } else {
            carousel.classList.remove('active'); // Убираем лишнюю открытую карусель
        }
    });
}

const carousel = document.querySelector('.carousel-images');
// Создание массива путей к изображениям
const imagePathsOffice = Array.from({ length: 23 }, (_, index) => `./assets/office-photos/g-office-${index}.jpg`);
const imagePathsKitchen = Array.from({ length: 1 }, (_, index) => `assets/kitchen-photos/g-kitchen-${index}.jpeg`);
const imagePathsHome = Array.from({ length: 25 }, (_, index) => `assets/living-photos/g-living-${index}.jpeg`);



// Функция для случайной сортировки массива
const shuffleArray = (array) => array.sort(() => Math.random() - 0.5);

// Перемешиваем массив путей
const shuffledImagesOffice = shuffleArray(imagePathsOffice);
const shuffledImagesKitchen = shuffleArray(imagePathsKitchen);
const shuffledImagesHome = shuffleArray(imagePathsHome);


// Генерация HTML-кода для случайно упорядоченных изображений
const carouselImagesContainerOffice = document.querySelector('.officeGal');
carouselImagesContainerOffice.innerHTML = shuffledImagesOffice
    .map((src) => `<div class="image-container"><img src="${src}" alt="Office Photo"></div>`)
    .join('');

const carouselImagesContainerKitchen = document.querySelector('.kitchenGal');
carouselImagesContainerKitchen.innerHTML = shuffledImagesKitchen
    .map((src) => `<div class="image-container"><img src="${src}" alt="Kitchen Photo"></div>`)
    .join('');

const carouselImagesContainerHome = document.querySelector('.homeGal');
carouselImagesContainerHome.innerHTML = shuffledImagesHome
    .map((src) => `<div class="image-container"><img src="${src}" alt="Living room Photo"></div>`)
    .join('');

// Прокрутка влево
function scrollCarouselLeft() {
    carousel.scrollBy({
        left: -carousel.offsetWidth / 2, // Прокрутка на половину ширины видимой области
        behavior: 'smooth' // Для анимированной прокрутки
    });
}

// Прокрутка вправо
function scrollCarouselRight() {
    carousel.scrollBy({
        left: carousel.offsetWidth / 2,
        behavior: 'smooth'
    });
}