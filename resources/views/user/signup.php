<?php
// Je require mon header
    // https://www.php.net/manual/fr/function.dirname.php
    // J'utilise ici dirname, afin de n'avoir que des chemins absolut !
    require dirname(__DIR__).'/layout/header.php';
// Je require ma nav
    require dirname(__DIR__).'/layout/nav.php';
?>
<!-- Si j'ai des erreurs je les affiches -->
<?php if (!empty($errorList)) : ?>
    <!-- Bandeau de messages by bootstrap -->
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <!-- Je boucle sur chaque erreur -->
        <?php foreach ($errorList as $currentError) : ?>
            <?= $currentError ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div>
    <h2> S'inscrire sur O'Quiz </h2>
</div>

<div class="row">
<!-- Signup form -->
    <form action="" method="post">
    <?php
    /*
        Les 2 lignes ci-dessous font la même chose.
        PHP7 à mis en place l'opérateur ??
        https://www.php.net/manual/fr/language.operators.comparison.php#language.operators.comparison.coalesce
    */
    ?>
        <input type="text" name="firstname" value="<?= !empty($values['firstname']) ? $values['firstname'] : '' ?>" placeholder="Votre prénom" id="">
        <input type="text" name="lasttname" value="<?= !empty($values['lastname']) ? $values['lastname'] : '' ?>"  placeholder="Votre nom" id="">
        <input type="email" name="email" value="<?= !empty($values['email']) ? $values['email'] : '' ?>"  placeholder="Votre courriel" id="">
        <input type="password" name="password" placeholder="Votre mot de passe" id="">
        <input type="password" name="conf_password" placeholder="Confirmez votre mot de passe" id="">
        <input type="submit">
    </form>
</div>

<!-- // Ajout link signin -->
<p class="mt-3">
  <a href="<?= route('signin'); ?>"> Déjà un compte ? Connectez vous ! </a>
</p>


<?php

    // Je require mon footer
    require dirname(__DIR__).'/layout/footer.php';

?>