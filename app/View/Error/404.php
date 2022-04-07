<?php ob_start(); ?>

    <h1>Not Found</h1>

<?php $content = ob_get_clean(); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Layout/public_layout.php'); ?>