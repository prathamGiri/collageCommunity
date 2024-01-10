let slideIndex = [[0,0],[1,0],[2,0],[3,0]];

const slides0 = document.querySelectorAll("[card-index='"+0+"']");
const slides1 = document.querySelectorAll("[card-index='"+1+"']");
const slides2 = document.querySelectorAll("[card-index='"+2+"']");
const slides3 = document.querySelectorAll("[card-index='"+3+"']");
const slidesList = [slides0, slides1, slides2, slides3];
const prevBtn = document.querySelectorAll(".prev-btn");
const nextBtn = document.querySelectorAll(".next-btn");

var textSlider = function () {
    $('.text').each(function () {
        var wrapper = $(this).closest('.text-wrapper');
        var text = $(this);

        console.log("Text width:", text.outerWidth());
        console.log("Wrapper width:", wrapper.outerWidth());

        if (text.outerWidth() > wrapper.outerWidth()) {
            text.addClass('slide');
        }
    });
}

function showSlides(ind) {
    slidesList[ind].forEach((slide, index) => {
        if (index >= slideIndex[ind][1] && index < slideIndex[ind][1] + 4) {
            slide.style.display = "block";
            textSlider()
        } else {
            slide.style.display = "none";
        }
    });
}

function nextSlide(ind) {
    if (slideIndex[ind][1]+4 >= slidesList[ind].length) {
        return;
    }
    slideIndex[ind][1] += 1;
    showSlides(ind);
}

function prevSlide(ind) {
    if (slideIndex[ind][1]-1 < 0) {
        return;
    }
    slideIndex[ind][1] -= 1;
    showSlides(ind);
}

prevBtn.forEach((prevbtn) => {
    prevbtn.addEventListener("click", (e) => {
        let ind = e.target.getAttribute('index');
        prevSlide(ind);
    });
})
nextBtn.forEach((nextbtn) => {
    nextbtn.addEventListener("click", (e) => {
        let ind = e.target.getAttribute('index');
        nextSlide(ind);
    });
})

showSlides(0);
showSlides(1);
showSlides(2);
showSlides(3);

$(document).ready(function () {
    slider()
});
