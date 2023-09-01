let slideIndex = 0;
const slides = document.querySelectorAll(".card");
const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");

function showSlides() {
    slides.forEach((slide, index) => {
        if (index >= slideIndex && index < slideIndex + 4) {
            slide.style.display = "block";
        } else {
            slide.style.display = "none";
        }
    });
}

function nextSlide() {
    slideIndex += 4;
    if (slideIndex >= slides.length) {
        slideIndex = slideIndex % slides.length;
    }
    showSlides();
}

function prevSlide() {
    slideIndex -= 4;
    if (slideIndex < 0) {
        slideIndex = slides.length - (slides.length % 4);
    }
    showSlides();
}

prevBtn.addEventListener("click", prevSlide);
nextBtn.addEventListener("click", nextSlide);

showSlides();