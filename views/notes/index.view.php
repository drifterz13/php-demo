<?php partial('head') ?>
<?php partial('nav') ?>

<main class="p-8">
    <?php partial('banner', ['banner_title' => $banner_title]) ?>

    <ul class="mt-4">
        <?php foreach ($notes as $note) :  ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-600 hover:underline">
                    <?= htmlspecialchars($note['title']) ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>

    <div class="mt-4">
        <a href="/note/create" class="text-blue-600 hover:underline">Create note</a>
    </div>
</main>

<?php partial('footer') ?>