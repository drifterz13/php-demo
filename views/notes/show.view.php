<?php partial('head') ?>
<?php partial('nav') ?>

<main class="p-8">
    <?php partial('banner', ['banner_title' => $banner_title]) ?>

    <section class="my-4">
        <p><?= htmlspecialchars($note['body']) ?></p>
    </section>

    <div class="flex flex-col">
        <a href="/note/edit?id=<?= $note['id'] ?>" class="text-blue-600 hover:underline">Edit note</a>
        <a href="/notes" class="text-blue-600 hover:underline">Back to notes</a>
    </div>

    <hr>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="text-red-600">Delete</button>
    </form>
</main>

<?php partial('footer') ?>