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
    <form action="/comparator" method="get" enctype="multipart/form-data">
        <select name="font1" id="font1">
            <?php foreach ($data['google_font'] as $font) { ?>
                <option value="<?php echo($font['family']); ?>"><?php echo($font['family']); ?></option>
            <?php } ?>
        </select>
        <select name="font2" id="font2">
            <?php foreach ($data['google_font'] as $font) { ?>
                <option value="<?php echo($font['family']); ?>"><?php echo($font['family']); ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Submit">
    </form>       
</section>    

<script>
    const font1 = document.getElementById('font1');
    const font1Child = font1.children;

    const font2 = document.getElementById('font2');
    const font2Child = font2.children;

    onload = function() {
        if( font1Child[0].selected == true ) {
            for(let i = 0; i < font2Child.length; i++) {

                if(font2Child[i].value == font1Child[0].value) {
                    font2Child[i].style.display = 'none';
                    font2Child[i + 1].selected = true;
                }
                if(font2Child[i+1].value == font1Child[1].value) {
                    font1Child[1].style.display = 'none';
                }
            }
        }
    }

    font1.addEventListener('change', function() {
        for(let i = 0; i < font2Child.length; i++){
            
            if( font2Child[i].style.display == 'none' ) {
                font2Child[i].style.display = 'block';
            }
            if(font1.value == font2Child[i].value) {
                font2Child[i].style.display = 'none';
            }
        }
    });

    font2.addEventListener('change', function() {
        for(let i = 0; i < font2Child.length; i++){
            
            if( font1Child[i].style.display == 'none' ) {
                font1Child[i].style.display = 'block';
            }
            if(font2.value == font1Child[i].value) {
                font1Child[i].style.display = 'none';
            }
        }
    });
</script>