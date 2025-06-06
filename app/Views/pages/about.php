<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class=" text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / About</h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;">About</h1>
</div>

<hr class="text-info w-50 mx-auto">

<div class="container d-md-flex text-center mt-5 mb-5">

    <div class="container position-relative">
        <img class="img-fluid" height="470" width="600" src="/img/clean-clothes.jpg" alt="">
        <img src="/img/classify-clothes.jpg" alt="Gambar baru"
            class="position-absolute bottom-0 start-0 ukuran-img-about">
    </div>

    <div class="container text-start">

        <b class="text-info">2 Years of Experience</b>
        <p class="intro-home">Your Dry Cleaning and Laundry. Done.</p>
        <p>We are professionals in the laundry and dry cleaning business, which means we always stay up to date on the latest technologies, cleaning methods, and solutions for dealing with stains or delicate fabrics. Plus, we maintain the highest standards of business integrity by following local and national regulations and environmental safety rules. We are passionate about changing the way you think about laundry!</p>


        <div class="container">
            <ul class="list-unstyled">
                <li><i class="bi bi-check-circle-fill text-primary"></i> Eco-friendly cleaning processes</li>
                <li><i class="bi bi-check-circle-fill text-primary"></i> Fast turnaround time</li>
                <li><i class="bi bi-check-circle-fill text-primary"></i> Free pick-up and delivery service</li>
                <li><i class="bi bi-check-circle-fill text-primary"></i> Best Quality</li>
            </ul>
        </div>

    </div>

</div>

<hr class="text-info w-50 mx-auto">

<div class="container">
    <p class="text-info text-center"><b>Our Advantages</b></p>
    <p class="intro-home text-center">Why Choose Us</p>
    <div class="container my-5">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark " style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-lightbulb text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Persionalized Experience</h5>
                        <br>
                        <br>
                        <p class="card-text">
                            We take utmost care of your clothes, segregating based on the cloth type and giving you instant clothes to make a statement. </p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-tags text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Affordable Pricing</h5>
                        <br><br>
                        <p class="card-text">
                            Prices that suits your pocket is one of our USP. An option of choosing between 2 types of pricing is available. </p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-phone text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Convenience</h5>
                        <br><br>
                        <p class="card-text">

                            With just a tap of a button, your laundry gets done, giving your leisure time to spend with family and friends. </p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-award text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Quality</h5>
                        <br><br>
                        <p class="card-text">

                            We use the best in class products, to assure that your favorite clothes are always there for you to wear. </p>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-truck text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Express Delivery</h5>
                        <br>
                        <br>
                        <p class="card-text">
                            With our super express delivery, we would get your laundry done in less than 8 hours. </p>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4">
                <div class="card bg-transparent border-0 shadow-none text-dark" style="backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <i class="about-circle bi bi-bag-check text-info fs-3"></i>
                        &nbsp;
                        <h5 class="card-title mt-3 text">Instant Order Update</h5>
                        <br><br>
                        <p class="card-text">
                            Regular updates of your order, to help you keep a track of your laundry and plan accordingly. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<hr class="text-info w-50 mx-auto">

<?= $this->endSection(); ?>