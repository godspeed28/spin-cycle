<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container d-flex flex-column bg-home" style="margin-top: 90px;">
    <?php $kata = "admin123";
    // dd(password_hash($kata, PASSWORD_DEFAULT)); 
    ?>
    <div class="intro-home">DO YOUR LAUNDRY SMARTLY!</div>
    <p>Your laundry gets delivered to you preferred experts in a click.</p>
    <a class="bg-info text-light p-3 fw-bold text-decoration-none" href="/Wash/">Order Now</a>
</div>
<br>
<hr class="text-info w-50 mx-auto">

<div class="container d-flex text-center mt-5 mb-5">

    <div class="container position-relative"><img height="470" width="600" src="/img/washing-machine.jpg" alt="">
        <p class="bg-info position-absolute z-2 fw-bold text-light" style="width: 140px;
    height: 140px;
    padding: 0px;
    margin-top:-160px;
    margin-left:495px;
    border-radius: 140px;"><span style="font-size: 50px;">2</span><br>years of experience</p>
    </div>
    <div class="container text-start">
        <b class="text-info">[2 Years of Experience]</b>
        <p class="intro-home">We are Passionate About Laundry</p>
        <p>We are professionals in the laundry and dry cleaning business, which means we always stay up to date on the latest technologies, cleaning methods, and solutions for dealing with stains or delicate fabrics. Plus, we maintain the highest standards of business integrity by following local and national regulations and environmental safety rules. We are passionate about changing the way you think about laundry!</p>

        <div class="container d-flex">
            <div class="container">
                <ul class="list-unstyled">
                    <li><i class="bi bi-check-circle-fill text-primary"></i> Eco-friendly cleaning processes</li>
                    <li><i class="bi bi-check-circle-fill text-primary"></i> Fast turnaround time</li>
                    <li><i class="bi bi-check-circle-fill text-primary"></i> Free pick-up and delivery service</li>
                    <li><i class="bi bi-check-circle-fill text-primary"></i> Best Quality</li>
                </ul>
            </div>
            <div style="margin-top:20px; width: 2px; height: 130px; background-color: #ccc;"></div>
            <div class="container text-center mt-5"><i class="bg-light rounded-circle p-3 bi bi-telephone-fill text-info"></i>
                <p class="text-secondary mt-4">Call for Quality Service</p>
                <p class="fw-bold text-dark" style="margin-top:-20px;">+62 812-3456-7890</p>
            </div>
        </div>
    </div>
</div>
<style>
    .flex-fill+.flex-fill {
        border-left: 1px solid rgba(0, 0, 0, 0.1);
    }
</style>
<div class="container text-dark text-center" style="max-width: 900px;">
    <div class="d-flex">
        <div class="flex-fill bg-light p-2 align-items-center">
            <div class="me-3 mt-2">
                <i class="bi bi-clock fs-1 text-info"></i>
            </div>
            <br>
            <div>
                <h5>Save Time</h5>
                <p>No more wasted time driving to your place, focus on what really matters while we handle the rest.</p>
            </div>
        </div>

        <div class="flex-fill bg-light p-2 align-items-center" style="border-start: 1px solid rgba(0,0,0,0.1);">
            <div class="me-3 mt-2">
                <i class="bi bi-wallet2 fs-1 text-info"></i>
            </div>
            <br>
            <div>
                <h5>Pay Online in Seconds</h5>
                <p>Manage your Press account and billing online from your smartphone or computer.</p>
            </div>
        </div>

        <div class="flex-fill bg-light p-2 align-items-center" style="border-start: 1px solid rgba(0,0,0,0.1);">
            <div class="me-3 mt-2">
                <i class="fas fa-leaf fs-1 mt-3 text-info"></i>
            </div>
            <br>
            <div>
                <h5>Eco-Friendly</h5>
                <p>We use safe and clean perc-free solvents, so you, and the Earth, can look good.</p>
            </div>
        </div>
    </div>
</div>
<hr class="text-info w-50 mx-auto">
<div class="container mt-5">
    <p class="text-center"><b class="text-info">[Our Services]</b>
    </p>
    <p class="intro-home text-center">Dry Cleaning & Laundry</p>
    <section class="py-1 mt-1 ">
        <div class="container">
            <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="three-cards">
                            <div class="card p-3">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/washing.png" class="mx-auto mt-5" alt="washing" />
                                <div class="card-body">
                                    <h5 class="card-title">Regular Wash & Fold</h5>
                                    <p class="card-text">Cuci dan lipat pakaian sehari-hari dengan proses higienis dan cepat.</p>
                                    <br>
                                    <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                                </div>
                            </div>
                            <div class="card p-3">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/laundry-bag.png" class="mx-auto mt-5" alt="laundry-bag" />
                                <div class="card-body">
                                    <h5 class="card-title">Express Laundry</h5>
                                    <p class="card-text">Layanan cepat, pakaian bersih dan rapi dalam 4–6 jam saja.</p>
                                    <br>
                                    <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                                </div>
                            </div>
                            <div class="card p-3">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/dryclean-short-cycle.png" class="mx-auto mt-5" alt="dryclean-short-cycle" />
                                <div class="card-body">
                                    <h5 class="card-title">Dry Cleaning</h5>
                                    <p class="card-text">Perawatan profesional untuk jas, gaun pesta, dan bahan khusus lainnya.</p><br>
                                    <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="three-cards">
                            <div class="card p-3">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/iron.png" class="mx-auto mt-5" alt="ironing" />
                                <div class="card-body">
                                    <h5 class="card-title">Ironing Only</h5>
                                    <p class="card-text">Setrika pakaian kamu biar makin rapi dan siap dipakai.</p><br>
                                    <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                                </div>
                            </div>
                            <div class="card p-3">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/washing.png" class="mx-auto mt-5" alt="washing" />
                                <div class="card-body">
                                    <h5 class="card-title">Regular Wash & Fold</h5>
                                    <p class="card-text">Cuci dan lipat pakaian sehari-hari dengan proses higienis dan cepat.</p><br>
                                    <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                                </div>
                            </div>
                            <div class="card p-3">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/laundry-bag.png" class="mx-auto mt-5" alt="laundry-bag" />
                                <div class="card-body">
                                    <h5 class="card-title">Express Laundry</h5>
                                    <p class="card-text">Layanan cepat, pakaian bersih dan rapi dalam 4–6 jam saja.</p>
                                    <br>
                                    <a href="" class="bg-info text-light p-2 fw-bold text-decoration-none">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="customIndicators" style="text-align:center; margin-top:20px;">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
            </div>
        </div>
    </section>
</div>

<hr class="text-info w-50 mx-auto">

<div class="container d-flex mt-5">
    <div class="container text-start" style="margin-left:100px;">
        <p><b class="text-info">Get Your Clothes Collected & Delivered</b></p>
        <p class="intro-home">How We Work</p>
        <p style="max-width: 500px;">
            Our Service is dedicated to making your life easier by providing pick up laundry service. Give yourself one less thing to worry about and try our residential wash and fold service that includes pick up and delivery.
        </p>
        <p style="max-width: 500px;">
            We have been in the laundry business for more than 12 years and would love to earn your business. Try us today and save $10 Off your first laundry service of 20 pounds or more.
        </p>
    </div>


    <div class="container">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum soluta est doloremque eveniet ex aliquam facere dolorem totam hic, maiores at quo quam itaque dolor. Voluptas quas est voluptatum beatae.
    </div>


</div>





<?= $this->endSection(); ?>