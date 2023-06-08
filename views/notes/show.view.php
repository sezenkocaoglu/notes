<?php require(__DIR__.'/../partials/head.php'); ?>
<?php require(__DIR__.'/../partials/header.php'); ?>
<main>
    <div class="row justify-content-center">
        <div class="col-6">
            <?php if(isset($success)): ?>
                <p class="text-success"> <?= $success ?> </p>
            <?php endif; ?>
            <div class="card p-3">
                <p class="card-body">
                    <?= htmlspecialchars($note['body']) ?>
                </p>
            </div>
            <div class="p-2">
                <button type="button" class="btn btn-warning">
                    <a href="/note/edit?id=<?= $note['id'] ?>" class="text-decoration-none text-white">
                        Edit note
                    </a>
                </button>
                <button type="submit" class="btn btn-danger">
                    <a href="/note/delete?id=<?= $note['id'] ?>" class="text-decoration-none text-white">
                        Delete note
                    </a>
                </button>
            </div>
        </div>
    </div>
</main>

<?php require(__DIR__.'/../partials/footer.php'); ?>