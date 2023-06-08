<?php require(__DIR__.'/../partials/head.php'); ?>
<?php require(__DIR__.'/../partials/header.php'); ?>
<main>
    <div class="row justify-content-center">
        <div class="col-6">
            <?php if(isset($_GET['success'])): ?>
                <p class="text-warning"> <?= $_GET['success'] ?> </p>
            <?php endif; ?>
            <ul class="list-group">
                <?php if(empty($notes)): ?>
                    <div class="card py-5 px-3 text-center">
                        <div class="card-text">
                            No note yet, start creating one.
                        </div>
                        <div class="py-3">
                            <a href="/notes/create"><i class="text-primary fs-1 fa-solid fa-pen-to-square"></i></a>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach($notes as $note): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>
                                    <?= htmlspecialchars($note['title']) ?>
                                </span>
                                <span class="d-flex">
                                    <span class="d-flex align-items-center">
                                        <a href="/note?id=<?= $note['id'] ?>" class="text-decoration-none">
                                            <i class="fa-solid fa-eye px-2 text-primary"></i>
                                        </a>
                                    </span>
                                    <span class="d-flex align-items-center">
                                        <a href="/note/edit?id=<?= $note['id'] ?>" class="text-decoration-none">
                                            <i class="fa-solid fa-pen px-2 text-warning"></i>
                                        </a>
                                    </span>
                                    <span class="d-flex align-items-center">
                                        <a href="/note/delete?id=<?= $note['id'] ?>" class="text-decoration-none">
                                            <i class="fa-solid fa-trash text-danger"></i>
                                        </a>
                                    </span>
                                </span>
                            </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</main>

<?php require(__DIR__.'/../partials/footer.php'); ?>