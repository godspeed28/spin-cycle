<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    .custom-border {
        border: 1px solid black;
    }
</style>

<div class="text-start d-flex flex-column bg-page">
    <h5 class="align-self-start" style="margin-left:150px;"><a href="/" class="hover-menu text-decoration-none text-info">Home</a> / Order Status</h5>
    <br>
    <h1 class="align-self-start fw-bold" style="margin-left:150px;">Order Status</h1>
</div>

<hr class="text-info w-50 mx-auto">

<?= $this->endSection(); ?>