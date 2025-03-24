<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact Page</h1>
            <?php foreach ($contact as $kontak => $value) {
                echo ucfirst($kontak) . " : " . "$value" . "<br>";
            } ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>