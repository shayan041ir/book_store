// Slider functionality
let slides = document.querySelectorAll('.carousel-item');
let currentSlide = 0;


document.querySelector('.carousel-control-next').addEventListener('click', () => {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('active');
});

document.querySelector('.carousel-control-prev').addEventListener('click', () => {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    slides[currentSlide].classList.add('active');
});

// Search functionality
document.querySelector('#search').addEventListener('input', (e) => {
    let query = e.target.value.toLowerCase();
    let books = document.querySelectorAll('.book');
    books.forEach((book) => {
        book.style.display = book.textContent.toLowerCase().includes(query) ? 'block' : 'none';
    });
});

// Filter functionality
document.querySelector('#filter').addEventListener('change', (e) => {
    let filter = e.target.value;
    let books = document.querySelectorAll('.book');
    books.forEach((book) => {
        if (filter === "" || book.classList.contains(filter)) {
            book.style.display = 'block';
        } else {
            book.style.display = 'none';
        }
    });
});
