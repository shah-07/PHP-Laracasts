<?php require("partials/head.php") ?>
<?php require("partials/nav.php") ?>
<?php require("partials/banner.php") ?>



<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <ul>
      <?php foreach ($notes as $note) : ?>
        <li>
          <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
            <?= $note['body'] ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
    <a type="button" class="mt-6 underline" href="/notes/create">Creat A Note</a>
  </div>
</main>



<?= require("partials/footer.php") ?>