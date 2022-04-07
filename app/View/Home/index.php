<?php ob_start(); ?>

    <section id="comparator">
        <h1>Comparator between <a href="">Montserrat</a> and <a href="">Poppins</a></h1>
        <div class="comparator__container">
            <div class="comparator__font front">
                <p>Almost before we knew it, we had left the ground.</p>
            </div>
            <div class="comparator__font back">
                <p>Almost before we knew it, we had left the ground.</p>
            </div>
        </div>
        <div class="comparator__button">
            <button class="comparator__button--left active">
                Montserrat
            </button>
            <button class="comparator__button--right">
                Poppins
            </button>
        </div>
    </section>

    <section id="form">
        <h2>Try it yourself!</h2>
        <form action="<?php echo($google_font['formAction']); ?>" method="post">
            <select name="font">
                <?php foreach ($google_font['items'] as $font) { ?>
                    <option value="<?php echo($font['family']); ?>"><?php echo($font['family']); ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Submit">
        </form>
    </section>    

    <script defer src="./index.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Layout/public_layout.php'); ?>