<?php 
if (isset($_SESSION['errors'])):
    foreach ($_SESSION['errors'] as $error): ?>
        <div class="alert alert-danger py-3">
            <?php echo $error; ?>
            <?php $Session->remove("errors") ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>