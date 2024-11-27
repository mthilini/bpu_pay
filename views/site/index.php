<?php
$this->title = 'BPU Finance System';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="container-fluid">

    <div class="row">

        <section id="home" class="carousel">
            <div class="slides">
                <div class="slide">
                    <img src="assets/slides/slide1.jpg" alt="Slide 1">
                    <div class="slide-content">
                        <h3>Welcome to University</h3>
                        <p>Discover our commitment to excellence in education and the success of every student.</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="assets/slides/slide2.jpg" alt="Slide 2">
                    <div class="slide-content">
                        <h3>Explore Our Programs</h3>
                        <p>We offer a wide range of programs designed to prepare students for future challenges.</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="assets/slides/slide3.jpg" alt="Slide 3">
                    <div class="slide-content">
                        <h3>Join Our Community</h3>
                        <p>Become a part of a vibrant community focused on learning and personal growth.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        let currentIndex = 0;
        const slides = document.querySelectorAll(".slide");
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach((slide, idx) => {
                slide.classList.remove("active");
                if (idx === index) {
                    slide.classList.add("active");
                }
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlide();
        }

        function updateSlide() {
            const offset = -currentIndex * 100;
            document.querySelector(
                ".slides"
            ).style.transform = `translateX(${offset}%)`;
            showSlide(currentIndex);
        }
        setInterval(nextSlide, 5000);

        updateSlide();
    });
</script>