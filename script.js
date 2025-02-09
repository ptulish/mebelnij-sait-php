//сделать хедер белым или прозрачным в зависимости от прокрутки
document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('main-header');
    const hero = document.getElementById('hero1');

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

//сделать слайдшоу на главной странице
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
    hero.style.backgroundAttachment = 'fixed';

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
            hero.style.backgroundAttachment = 'fixed';
            currentIndex = nextIndex; // Присваиваем новый индекс
        };
    }

    // Вызываем смену картинки каждые 5 секунд (5000 мс)
    setInterval(changeBackground, 5000);
});

//функция для переключения карусели
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

const carousels = document.querySelectorAll('.carousel-images');
// Создание массива путей к изображениям
const imagePathsOffice = Array.from({ length: 23 }, (_, index) => `./assets/office-photos/g-office-${index}.jpg`);
const imagePathsKitchen = Array.from({ length: 9 }, (_, index) => `assets/kitchen-photos/g-kitchen-${index}.jpeg`);
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
function scrollCarouselLeft(selectionID) {
    carousels[selectionID].scrollBy({
        left: -carousels[selectionID].offsetWidth / 2, // Прокрутка на половину ширины видимой области
        behavior: 'smooth' // Для анимированной прокрутки
    });
}

// Прокрутка вправо
function scrollCarouselRight(selectionID) {
    carousels[selectionID].scrollBy({
        left: carousels[selectionID].offsetWidth / 2,
        behavior: 'smooth'
    });
}
// Добавляем обработчики событий для каждой карусели
document.querySelectorAll('.carousel').forEach((carousel) => {
    const leftButton = carousel.querySelector('.carousel-button.left');
    const rightButton = carousel.querySelector('.carousel-button.right');
    const imagesContainer = carousel.querySelector('.carousel-images');

    leftButton.addEventListener('click', () => scrollCarouselLeft(imagesContainer));
    rightButton.addEventListener('click', () => scrollCarouselRight(imagesContainer));
});
//прокрутка до секции что бы не вылезал хедер
document.querySelectorAll('.nav-btn' || '.btn-outline-primary').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            const headerHeight = document.querySelector('header').offsetHeight + 18; // Высота хедера
            const elementPosition = targetElement.getBoundingClientRect().top + window.scrollY;
            const offsetPosition = elementPosition - headerHeight;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'auto'
            });
        }
    });
});


// Получаем элементы
const burgerMenu = document.getElementById('burger-menu');
const navMenu = document.getElementById('nav-menu');

// Обработчик клика по бургер-меню
burgerMenu.addEventListener('click', () => {
    navMenu.classList.toggle('visible'); // Показывает/скрывает меню
    navMenu.classList.toggle('hidden'); // Меняет класс с hidden на visible
});

function showNotification(message, isError = false) {

    const notification = document.getElementById('notification');
    notification.textContent = message;
    notification.classList.toggle('error', isError);
    notification.style.display = 'block';

    setTimeout(() => {
        notification.style.display = 'none';
    }, 10000);
}

document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'success') {
        showNotification('Your message is sent. We will contact You soon.');
        urlParams.delete('status');
        window.history.replaceState({}, document.title, window.location.pathname);
    } else if (status === 'error') {
        showNotification('Произошла ошибка при отправке сообщения.', true);
        urlParams.delete('status');
        window.history.replaceState({}, document.title, window.location.pathname);

    }
});

document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-btn');

    function setActiveLink() {
        let index = sections.length;

        while (--index && window.scrollY + 100 < sections[index].offsetTop) {}

        navLinks.forEach((link) => link.classList.remove('active'));
        navLinks[index].classList.add('active');
    }

    setActiveLink();
    window.addEventListener('scroll', setActiveLink);
});