document.addEventListener("DOMContentLoaded", function() {
    let slideIndex = 0;
    const slides = document.querySelectorAll(".slider img");
    const totalSlides = slides.length;
    const intervalTime = 3000; // 2 seconds
    const slider = document.querySelector(".slider");
    const navCircles = document.querySelectorAll(".slider-nav a");
    let autoSlideInterval = setInterval(showSlides, intervalTime);

    function showSlides() {
        slideIndex++;
        if (slideIndex >= totalSlides) {
            slideIndex = 0;
        }
        updateSlider();
        updateNavCircles();
    }

    function updateSlider() {
        slider.scrollTo({
            left: slider.clientWidth * slideIndex,
            behavior: "smooth"
        });
    }

    function updateNavCircles() {
        navCircles.forEach((circle, index) => {
            if (index === slideIndex) {
                circle.classList.add("active");
            } else {
                circle.classList.remove("active");
            }
        });
    }

    function moveSlide(n) {
        clearInterval(autoSlideInterval); // Stop the automatic sliding
        slideIndex += n;
        if (slideIndex >= totalSlides) {
            slideIndex = 0;
        } else if (slideIndex < 0) {
            slideIndex = totalSlides - 1;
        }
        updateSlider();
        updateNavCircles();
        autoSlideInterval = setInterval(showSlides, intervalTime); // Restart the automatic sliding
    }

    updateNavCircles(); // Initial call to set the first circle as active

    // Make moveSlide available globally
    window.moveSlide = moveSlide;
});
