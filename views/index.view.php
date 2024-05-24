<?php partial('head') ?>
<?php partial('nav') ?>

<main class="p-8">
    <?php partial('banner', ['banner_title' => $banner_title]) ?>

    <div class="mt-3">
        Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>. Welcome to the home page.
    </div>
</main>

<?php partial('footer') ?>