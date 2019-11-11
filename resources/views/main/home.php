<?php
// Je require mon header
    // https://www.php.net/manual/fr/function.dirname.php
    // J'utilise ici dirname, afin de n'avoir que des chemins absolut !
    require dirname(__DIR__).'/layout/header.php';
// Je require ma nav
    require dirname(__DIR__).'/layout/nav.php';
?>

<div>
    <h2> Bienvenue sur O'Quiz </h2>
    <p>

    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

    </p>
</div>

<div class="row">

    <?php $counter = 1; ?>
    <?php foreach ($quizCollection as $quiz): ?>

        <div class="col">
        <a href="<?= route('quiz', ['id' => $quiz->id]) ?>">
            <h3><?= $quiz->title ?></h3>
            </a>
            <h5><?= $quiz->description ?></h5>
            <p><?= $quiz->author->firstname . ' '. $quiz->author->lastname ?></p>

        </div>

        <?php if ($counter%3 == 0): ?>

            </div>
            <div class="row">

        <?php endif; ?>

        <?php $counter++; ?>

    <?php endforeach; ?>

</div>

<?php

    // Je require mon footer
    require dirname(__DIR__).'/layout/footer.php';

?>