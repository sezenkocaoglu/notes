<?php require(__DIR__.'/../partials/head.php'); ?>
<?php require(__DIR__.'/../partials/header.php'); ?>
<main>
    <div class="row justify-content-center">
        <div class="col-6">
            <?php if(isset($success)): ?>
                <p class="text-success"> <?= $success ?> </p>
            <?php endif; ?>
            <div class="card p-3">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="title">
                    </div>
                    <?php if(isset($errors['title'])): ?>
                        <p class="text-danger small"> <?= $errors['title'] ?> </p>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="body" class="form-label">Start writing the content of your note</label>
                        <textarea class="form-control" name="body" id="body" rows="3">
                            <?php $_POST['body'] ?? '' ?>
                        </textarea>
                    </div>
                    <?php if(isset($errors['body'])): ?>
                        <p class="text-danger small"> <?= $errors['body'] ?> </p>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require(__DIR__.'/../partials/footer.php'); ?>