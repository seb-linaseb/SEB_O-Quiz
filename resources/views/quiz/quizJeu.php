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

<form action="<?= route('results') ?>" method="POST">

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
            <div class="question__choices">

                <?php foreach ($currentQuestion->answer as $index => $currentAnswer): ?>
                  <div>
                    <input type="radio" name="<?= $currentQuestion->id ?>" id="exampleRadios1" value="<?= $currentAnswer->id ?>">
                    <label for="exampleRadios1">
                      <?= ($index + 1) . ' - ' . $currentAnswer->description ?>
                    </label> 
                  </div>                
                <?php endforeach; ?>

            </div>
        </div>

        <?php if ($counter%3 == 0): ?>

            </div>
            <div class="row">

        <?php endif; ?>

        <?php $counter++; ?>

    <?php endforeach; ?>

<!--
                <div class="row">

                    <div class="col question">

                        <span class="level level--beginner">Débutant</span>

                        <div class="question__question">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
                        </div>

                        <div class="question__choices">

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label for="exampleRadios1">
                                        Lorem ipsum 
                                </label> 
                            </div>

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label for="exampleRadios2">
                                        Lorem ipsum 
                                </label> 
                             </div>

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios3" value="option2">
                                <label for="exampleRadios3">
                                        Lorem ipsum 
                                </label> 
                             </div>
                        </div>
                    </div>

                    <div class="col question">
                        <span class="level level--medium">Confirmé</span>
                        <div class="question__question"> 
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
                        </div>
                        <div class="question__choices">

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label for="exampleRadios1">
                                        Lorem ipsum 
                                </label> 
                            </div>

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label for="exampleRadios2">
                                        Lorem ipsum 
                                </label> 
                                </div>

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios3" value="option2">
                                <label for="exampleRadios3">
                                        Lorem ipsum 
                                </label> 
                            </div>
                        </div>
                    </div>

                    <div class="col question">
                        <span class="level level--expert">Expert</span>
                        <div class="question__question">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
                        </div>
                        <div class="question__choices">

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label for="exampleRadios1">
                                        Lorem ipsum 
                                </label> 
                            </div>

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label for="exampleRadios2">
                                        Lorem ipsum 
                                </label> 
                                </div>

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios3" value="option2">
                                <label for="exampleRadios3">
                                        Lorem ipsum 
                                </label> 
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row">

                    <div class="col question">

                        <span class="level level--beginner">Débutant</span>

                        <div class="question__question">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
                        </div>
                        <div class="question__choices">

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label for="exampleRadios1">
                                        Lorem ipsum 
                                </label> 
                            </div>

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label for="exampleRadios2">
                                        Lorem ipsum 
                                </label> 
                                </div>

                            <div>
                                <input type="radio" name="exampleRadios" id="exampleRadios3" value="option2">
                                <label for="exampleRadios3">
                                        Lorem ipsum 
                                </label> 
                            </div>
                        </div>
                        <div class="question__info"> 
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
                                <a href="#">Wikipedia</a>
                        </div>
                    </div>

                    <div class="col question">

                            <span class="level level--beginner">Débutant</span>
    
                            <div class="question__question">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
                            </div>
                            <div class="question__choices">
    
                                <div>
                                    <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label for="exampleRadios1">
                                            Lorem ipsum 
                                    </label> 
                                </div>
    
                                <div>
                                    <input type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label for="exampleRadios2">
                                            Lorem ipsum 
                                    </label> 
                                </div>
    
                                <div>
                                    <input type="radio" name="exampleRadios" id="exampleRadios3" value="option2">
                                    <label for="exampleRadios3">
                                            Lorem ipsum 
                                    </label> 
                                </div>
                            </div>

                            <div class="question__info"> 
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr. ?
                                    <a href="#">Wikipedia</a>
                            </div>
                        </div>
-->                    
                </div>
                <div>
                    <input class="btn" type="submit" value="OK"/>
                </div>
            </form>

<?php

// Je require mon footer
require dirname(__DIR__).'/layout/footer.php';

?>