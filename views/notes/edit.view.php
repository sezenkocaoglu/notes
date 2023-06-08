<?php require(__DIR__.'/../partials/head.php'); ?>
<?php require(__DIR__.'/../partials/header.php'); ?>
<main>
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="title" value="<?= $note['title'] ?>">
                </div>
                <?php if(isset($errors['title'])): ?>
                    <p class="text-danger small"> <?= $errors['title'] ?> </p>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="body" class="form-label">Content</label>
                    <textarea class="form-control" name="body" id="body" rows="3">
                        <?= $note['body'] ?>
                    </textarea>
                </div>
                <?php if(isset($errors['body'])): ?>
                    <p class="text-danger small"> <?= $errors['body'] ?> </p>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</main>

<?php require(__DIR__.'/../partials/footer.php'); ?>