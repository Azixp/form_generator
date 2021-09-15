<div class="d-flex justify-content-center flex-wrap">
    <?php foreach ($forms as $form) : ?>
        <div class="card m-3" style="width: 23rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Form <?= $form->getForm_id() ?></h5>
                <a href="/?action=show&form=<?= $form->getForm_id() ?>" class="btn btn-primary">Show Form</a>
                <a href="/?action=delete&form=<?= $form->getForm_id() ?>" class="btn btn-danger">Delete Form</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= (isset($_GET['deleteStatus']) && $_GET['deleteStatus'] === '1') ? '<div class="alert alert-success text-center">The From has been deleted !</div>' : '' ?>