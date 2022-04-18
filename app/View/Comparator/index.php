<?php 

$link1 = '<a href= "/font/' . strtolower($data['font1']) . '">' . $data['font1'] . '</a>';
$link2 = '<a href= "/font/' . strtolower($data['font2']) . '">' . $data['font2'] . '</a>';

?>

<section id="comparator">
    <h1>Comparator between <?php echo($link1) ?> and <?php echo($link2) ?></h1>
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
            <?php echo($data['font1']) ?>
        </button>
        <button class="comparator__button--right">
            <?php echo($data['font2']) ?>
        </button>
    </div>
</section>