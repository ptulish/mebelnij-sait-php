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

document.querySelectorAll('.nav-btn').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            const headerHeight = document.querySelector('header').offsetHeight; // Высота хедера
            const elementPosition = targetElement.getBoundingClientRect().top + window.scrollY;
            const offsetPosition = elementPosition - headerHeight;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
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

document.getElementById("contactForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Предотвращаем стандартное поведение формы (переход на другую страницу)

    // Собираем данные формы
    let formData = new FormData(this);

    // Отправляем данные с помощью fetch API
    fetch("./send_email.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.text()) // Получаем ответ от сервера (в формате текста)
        .then((data) => {
            // Отображаем сообщение об успехе или ошибке
            let notification = document.getElementById("notification");
            notification.style.display = "block";
            notification.style.color = data.includes("Ваше сообщение успешно отправлено") ? "green" : "red";
            notification.innerText = data;

            // Очищаем форму, если данные успешно отправлены
            if (data.includes("Ваше сообщение успешно отправлено")) {
                document.getElementById("contactForm").reset();
            }
        })
        .catch((error) => {
            // Показываем сообщение об ошибке
            let notification = document.getElementById("notification");
            notification.style.display = "block";
            notification.style.color = "red";
            notification.innerText = "Ошибка отправки: " + error.message;
        });
});