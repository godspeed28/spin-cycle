<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>About Page</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero incidunt molestias error, odit,
                voluptatibus
                perferendis doloremque maxime animi mollitia dolorem qui ratione fugit, rerum officiis minus voluptatum
                corporis
                enim nesciunt.</p>
            <?php foreach ($test as $value) {
                echo $value . ' ';
            }
            // dd($test); //var_dump lalu die
            // d($test); //var_dump
            ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>