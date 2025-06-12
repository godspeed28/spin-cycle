<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / <a class="text-decoration-none hover-menu text-info" href="/Pages/services">Services</a> / <?= $item ?></h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;"><?= $item ?></h1>

</div>

<hr class="text-info w-50 mx-auto">

<div class="container">
    <p class="text-info text-start"><b>[ What we offer ]</b></p>
    <p class="intro-home"><?= $item ?></p>
    <p style="border-left: 4px solid #0dcaf0; padding-left: 10px;">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae ad eaque nostrum a doloribus praesentium saepe, maxime harum minima ut. Deleniti quae provident consequuntur voluptatem, rem assumenda eos maxime iusto.
    </p>
    <p class="intro-home fs-2">Wash and Fold Laundry Service
        Delivered to Your Home</p>
    Get the very best in wash and fold or fluff and fold laundry service from the dry cleaning and laundry experts. We offer one-day or same-day laundry service with a 100% satisfaction guarantee to customers in our service areas, combining the excellence of our premium dry cleaning with the ultimate convenience in laundry service and delivery. Enjoy free home pickup and delivery for your wash and fold laundry items, or use a safe and secure 24-hour drop box located at our stores and lockers to drop off your fluff and fold laundry whenever it’s convenient for you. Our Laundry Clients include:
</div>
<hr class="text-info w-50 mx-auto">
<div class="container d-md-flex">
    <div class="container">
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Eco-friendly cleaning processes</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Fast turnaround time</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Free pick-up and delivery service</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Best Quality</li>
        </ul>
    </div>

    <hr class="text-info w-50 mx-auto  d-md-none">

    <div class="container">
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-primary"></i> Eco-friendly cleaning processes</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Fast turnaround time</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Free pick-up and delivery service</li>
            <li><i class="bi bi-check-circle-fill text-primary"></i> Best Quality</li>
        </ul>
    </div>

</div>
<div class="container">
    <p class="intro-home fs-2">How Wash and Fold Works</p>
    <p>What is Wash and Fold? Sometimes referred to as laundry service or fluff and fold, Mulberrys wash and fold is our top-notch laundry service. When your garments don’t need our dry cleaning services, wash and fold is your best solution to clean clothes. Your clothes will last longer and stay brighter</p>

    <p class="mb-4">Simply use one of our many convenient drop-off or pickup services, tell us any specific instructions for particular pieces of clothing, and we’ll take it from there! We use state-of-the-art equipment and the best craftsmanship in the industry. Those factors coupled with our toxin-free detergents and crystal clear water will leave your wardrobe with an unmatched clean. Each piece of clothing is hand-finished by our pressers and inspected for perfection—guaranteed or we’ll redo services free of charge.</p>
    <a class="bg-info text-light p-2 fw-bold text-decoration-none" href="/Wash">Get Service Now</a>

</div>

<hr class="text-info w-50 mx-auto">


<?= $this->endSection(); ?>