<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class=" text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / Contact</h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;">Contact</h1>

</div>

<hr class="text-info w-50 mx-auto">

<div class="container mt-5">
    <p class="text-center"><b class="text-info">[Get in Touch With Us]</b></p>
    <p class="intro-home text-center">Contact Information</p>
    <div class="container my-5">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="card bg-transparent border-0 shadow-none text-dark " style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-geo-alt text-info fs-3"></i>
                        <h4 class="card-title mt-3">Post Address</h4>
                        <p class="card-text">
                            Semarang Tengah, Semarang City 50136.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-telephone-fill text-info fs-3"></i>
                        <h4 class="card-title mt-3">Contact Phone</h4>
                        <p class="card-text">
                            <?= $tel ?></p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-envelope text-info fs-3"></i>
                        <h4 class="card-title mt-3">E-mail Address</h4>
                        <p class="card-text">info@spincycle.com</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-3">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-clock text-info fs-3"></i>
                        <h4 class="card-title mt-3">Opening Hours</h4>
                        <p class="card-text">Mon-Fri 08:00 AM - 05:00 PM <br>
                            Sat-Sun 10:00 AM - 5:00 PM</p>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

<hr class="text-info w-50 mx-auto">

<div class="container mt-5">
    <div class="container bg-light p-5 pindah-bawah" style="max-width: 500px;">
        <p class="intro-home">Get in Touch. We are Here to Help. </p>
        We look forward to helping you create and maintain a clean, healthy environment that is as enjoyable as it is functional.
        <form id="formSaya">
            <div class="mb-3 mt-3">
                <input type="text" class="form-control rounded-0" id="nama" placeholder="Your name">
            </div>
            <div class="mb-3 w-100 d-flex flex-wrap gap-3">
                <input type="email" class="form-control rounded-0" style="flex: 1 1 45%;" placeholder="E-mail" required>
                <input type="tel" class="form-control rounded-0" style="flex: 1 1 45%;" placeholder="Phone" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control rounded-0" placeholder="Your message" rows="4" id="cek"></textarea>
            </div>
            <button type="submit" class="bg-info fw-bold p-2 border-0 text-light">Send Message</button>
        </form>

    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3960.2327909451096!2d110.4083611!3d-6.9818333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sid!4v1744366896748!5m2!1sen!2sid" width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<hr class="text-info w-50 mx-auto">



<?= $this->endSection(); ?>