<?php include 'header.php';
?>

<link rel="stylesheet" href="assets/css/main.css">

<!-- Header -->

<div class="aboutheader">
    <img src="assets/images/car_bg1.jpg" alt="About Us" class="aboutusimg">
    <div class="aboutHeaderTitle">
        <h1>About Us</h1>
        <h4>Home / About Us</h4>
    </div>
</div>

<!-- About us Container -->

<div class="aboutusCont">
    <div class="aboutTitle">
        <a href="#mission" onclick="showSection('mission'); return false;">MISSION</a>
        <a href="#vision" onclick="showSection('vision'); return false;">VISION</a>
        <a href="#history" onclick="showSection('history'); return false;">HISTORY</a>
    </div>
    <div class="aboutDis">
        <section id="mission">
            <p>At Cras Auto, we are dedicated to providing top-notch automotive services. Our mission is to deliver exceptional customer satisfaction through our experienced team and innovative solutions.</p>
        </section>
        <section id="vision" style="display:none;">
            <p>We aim to be the leading automotive service provider, known for our commitment to quality, reliability, and customer-centric approach.</p>
        </section>
        <section id="history" style="display:none;">
            <p>With a rich history of excellence, we have been serving our customers with dedication and integrity. Our journey is marked by continuous growth and a passion for automotive excellence.</p>
        </section>
    </div>
</div>

<script>
function showSection(sectionId) {
    const sections = document.querySelectorAll('.aboutDis section');
    sections.forEach(section => {
        section.style.display = section.id === sectionId ? 'block' : 'none';
    });
}
</script>

<!-- Increment Numbers -->

<div class="aboutIncNum">
    <div class="incNumCard">
        <h2 class="num" data-val="20+">00+</h2>
        <p>Years of Experience</p>
    </div>
    <div class="incNumCard">
        <h2 class="num" data-val="100+">000+</h2>
        <p>Happy Customers</p>
    </div>
    <div class="incNumCard">
        <h2 class="num" data-val="500+">000+</h2>
        <p>CUSTOMER SATISFACTION</p>
    </div>
</div>

<!-- Testimonials -->

<div class="testi">
    <div class="testiCont1">
        <h2>SEE WHAT OUR SATISFIED CUSTOMER SAYS</h2>
        <div class="testiBtn">
            <button id="prevBtn" onclick="prevTesti()">
                <div class="Btn">
                    <i class="fas fa-chevron-left"></i>
                    <h4>PREV</h4>
                </div>
            </button>
            <button id="nextBtn" onclick="nextTesti()">
                <div class="Btn">
                    <h4>NEXT</h4>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </button>
        </div>
    </div>
    <div class="testiCont2">
        <div class="testiDis">
            <div class="dis1">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="109" height="81"
                        viewBox="0 0 109 81" fill="none">
                        <g opacity="0.7" clip-path="url(#clip0_219_7261)">
                            <path
                                d="M24.8606 80.2504C27.2135 76.6896 47.9194 44.6582 51.3233 31.1053C53.5194 22.3053 51.8096 15.5445 45.739 9.14449C36.0449 -1.09865 19.8567 -1.11431 11.0096 6.43079C1.59785 14.4622 -1.14726 29.8504 5.45666 39.2622C10.539 46.4935 15.2292 48.219 25.1586 51.4503C25.4253 56.5797 24.9861 77.0975 24.8606 80.2504Z"
                                fill="#FF3D24" />
                            <path
                                d="M81.2214 80.2504C83.5743 76.6896 104.28 44.6582 107.668 31.1053C109.88 22.3053 108.155 15.5445 102.084 9.14449C92.4057 -1.09865 76.2175 -1.11431 67.3704 6.43079C57.9586 14.4622 55.1978 29.8504 61.8174 39.2622C66.8841 46.4935 71.5743 48.219 81.5194 51.4503C81.7861 56.5797 81.3312 77.0975 81.2214 80.2504Z"
                                fill="#FF3D24" />
                        </g>
                        <defs>
                            <clipPath id="clip0_219_7261">
                                <rect width="108.235" height="80" fill="white"
                                    transform="translate(0.671997 0.966797)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <h2>Mr. Malaka Perera</h2>
                <h4>From Dankotuwa</h4>
            </div>
            <p>
                I was impressed by Cras Auto's professionalism and attention to detail. They understood my needs, provided clear guidance, and delivered exceptional results. I’ll definitely return for future services!
            </p>
        </div>

        <div class="cusPic">
            <img src="assets/images/testimaonial.png" alt="Customer 1" class="cusImg">
            <img src="assets/images/testimaonial-img-bg.png" alt="Customer 1" class="aboutBackground">
        </div>
    </div>
</div>


<!-- Our Team -->

<div class="ourTeam">
    <div class="teamHeading">
        <h1>Our Team</h1>
        <p>Behind every great service is a dedicated team. Meet the people who make Cras Auto your go-to choice for all automotive needs.</p>
    </div>

    <div class="teamContainer">
        <div class="sliderWrapper">
            <div class="imgList">
                <div class="teamCard">
                    <div class="teamImg">
                        <img src="assets/images/member_1 .jpg" alt="Team Member 1" class="teamImg">
                    </div>
                    <div class="teamDis">
                        <h2>Malaka Perera</h2>
                        <h4>Founder Of Cras Auto</h4>
                    </div>
                </div>

                <div class="teamCard">
                    <div class="teamImg">
                        <img src="assets/images/member_1 .jpg" alt="Team Member 1" class="teamImg">
                    </div>
                    <div class="teamDis">
                        <h2>Malaka Perera</h2>
                        <h4>Founder Of Cras Auto</h4>
                    </div>
                </div>

                <div class="teamCard">
                    <div class="teamImg">
                        <img src="assets/images/member_1 .jpg" alt="Team Member 1" class="teamImg">
                    </div>
                    <div class="teamDis">
                        <h2>Malaka Perera</h2>
                        <h4>Founder Of Cras Auto</h4>
                    </div>
                </div>

                <div class="teamCard">
                    <div class="teamImg">
                        <img src="assets/images/member_1 .jpg" alt="Team Member 1" class="teamImg">
                    </div>
                    <div class="teamDis">
                        <h2>Malaka Perera</h2>
                        <h4>Founder Of Cras Auto</h4>
                    </div>
                </div>

                <div class="teamCard">
                    <div class="teamImg">
                        <img src="assets/images/member_1 .jpg" alt="Team Member 1" class="teamImg">
                    </div>
                    <div class="teamDis">
                        <h2>Malaka Perera</h2>
                        <h4>Founder Of Cras Auto</h4>
                    </div>
                </div>

                <div class="teamCard">
                    <div class="teamImg">
                        <img src="assets/images/member_1 .jpg" alt="Team Member 1" class="teamImg">
                    </div>
                    <div class="teamDis">
                        <h2>Malaka Perera</h2>
                        <h4>Founder Of Cras Auto</h4>
                    </div>
                </div>

                <div class="teamCard">
                    <div class="teamImg">
                        <img src="assets/images/member_1 .jpg" alt="Team Member 1" class="teamImg">
                    </div>
                    <div class="teamDis">
                        <h2>Malaka Perera</h2>
                        <h4>Founder Of Cras Auto</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Get in touch -->

<div class="getTouchCont">
    <div class="ruler"></div>
    <div class="touchDis">
        <h1>Get in Touch with our experts</h1>
        <p>Our experts are here to assist you with any questions or concerns. Contact us today to experience professional, reliable service tailored to your needs.</p>
        <button onclick="window.location.href='tel:+1234567890'">
            <i class="fa-solid fa-phone"></i> GET IN TOUCH WITH US
        </button>
    </div>
</div>


<?php
include 'footer.php';
?>

<script src="assets/js/script.js"></script>