<?php
if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success py-3">
        <?php echo $_SESSION['success'] ?>
        <?php $Session->remove("success") ?>
    </div>
<?php endif; ?>