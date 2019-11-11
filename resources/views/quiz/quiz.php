<?php
// Je require mon header
    // https://www.php.net/manual/fr/function.dirname.php
    // J'utilise ici dirname, afin de n'avoir que des chemins absolut !
    require dirname(__DIR__).'/layout/header.php';
// Je require ma nav
    require dirname(__DIR__).'/layout/nav.php';
?>


<div>
    <h2><?= $quizModel->title ?>
        <span><?= $quizModel->question->count(); ?> questions</span>
    </h2>
</div>

<div>
    <h4>
        <?= $quizModel->description ?>
    </h4>

    <p>
        <?= $quizModel->tag->implode('name', ' - ') ?>
    </p>
</div>

<div>
    <p>by <?= $quizModel->author->firstname . ' ' . $quizModel->author->lastname ?></p>
</div>

<div class="row">

    <?php $counter = 1; ?>
    <?php foreach ($quizModel->question as $currentQuestion): ?>

        <div class="col question">

            <span class="level <?= $currentQuestion->level->getCssClass() ?>">
                <?= $currentQuestion->level->name ?>
            </span>

            <div class="question__question">
                <?= $currentQuestion->question ?>
            </div>
            <div>
                <ul>
                    <?php foreach ($currentQuestion->answer as $index => $currentAnswer): ?>

                        <li>
                            <?= ($index + 1) . ' - ' . $currentAnswer->description ?>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <?php if ($counter%3 == 0): ?>

            </div>
            <div class="row">

        <?php endif; ?>

        <?php $counter++; ?>

    <?php endforeach; ?>

<!--

    <div class="col question">
        <span class="level level--medium">Confirmé</span>
        <div class="question__question">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
        </div>
        <div>
            <ul>
                <li>1. Lorem ipsum </li>
                <li>2. Lorem ipsum </li>
                <li>3. Lorem ipsum </li>
                <li>d. La réponse D </li>
            </ul>
        </div>
    </div>

    <div class="col question">
        <span class="level level--expert">Expert</span>
        <div class="question__question">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
        </div>
        <div>
            <ul>
                <li>1. Lorem ipsum </li>
                <li>2. Lorem ipsum </li>
                <li>3. Lorem ipsum </li>
                <li>d. La réponse D </li>
            </ul>
        </div>
    </div>

</div>

<div class="row">

    <div class="col question">

        <span class="level level--beginner">Débutant</span>

        <div class="question__question">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
        </div>
        <div>
            <ul>
                <li>1. Lorem ipsum </li>
                <li>2. Lorem ipsum </li>
                <li>3. Lorem ipsum </li>
                <li>d. La réponse D </li>
            </ul>
        </div>
    </div>

    <div class="col question">
        <span class="level level--medium">Confirmé</span>
        <div class="question__question">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
        </div>
        <div>
            <ul>
                <li>1. Lorem ipsum </li>
                <li>2. Lorem ipsum </li>
                <li>3. Lorem ipsum </li>
                <li>d. La réponse D </li>
            </ul>
        </div>
    </div>

    <div class="col question">
        <span class="level level--expert">Expert</span>
        <div class="question__question">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
        </div>
        <div>
            <ul>
                <li>1. Lorem ipsum </li>
                <li>2. Lorem ipsum </li>
                <li>3. Lorem ipsum </li>
                <li>d. La réponse D </li>
            </ul>
        </div>
    </div> -->

</div>
<?php

// Je require mon footer
require dirname(__DIR__).'/layout/footer.php';

?>