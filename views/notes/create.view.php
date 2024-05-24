<?php partial('head') ?>
<?php partial('nav') ?>

<main class="p-8">
    <?php partial('banner', ['banner_title' => $banner_title]) ?>

    <form action="/notes" method="POST">
        <div class="border-b border-gray-900/10 pb-12 max-w-md">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                            <input type="text" name="title" id="title" value="<?= $_POST['title'] ?? '' ?>" autocomplete="title" class="block flex-1 border-0 bg-transparent p-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="My daily note...">
                        </div>
                        <?php if (isset($errors['title'])) : ?>
                            <span class="mt-2 text-red-600 text-sm"><?= $errors['title'] ?></span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                    <div class="mt-2">
                        <textarea id="body" name="body" rows="3" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['body'] ?? '' ?></textarea>
                        <?php if (isset($errors['body'])) : ?>
                            <span class="mt-2 text-red-600 text-sm"><?= $errors['body'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </div>
    </form>
</main>

<?php partial('footer') ?>