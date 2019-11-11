<?php
// Je require mon header
    // https://www.php.net/manual/fr/function.dirname.php
    // J'utilise ici dirname, afin de n'avoir que des chemins absolut !
    require dirname(__DIR__).'/layout/header.php';
// Je require ma nav
    require dirname(__DIR__).'/layout/nav.php';
?>

<div>
    <h2> Se connecter sur O'Quiz </h2>

<!-- Affichage des messages d'erreurs au remplissage du formulaire -->
<?php if (!empty($errorList)) : ?>
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
<?php foreach ($errorList as $currentError) : ?>
    <?= $currentError ?><br>
<?php endforeach; ?>

</div>
<?php endif; ?>
</div>

<div class="row">

<!-- Signin form -->
    <form action="" method="post">
        <input type="email" name="email" value="<?= $values['email'] ?? '' ?>" placeholder="Votre courriel" id="">
        <input type="password" name="password" placeholder="Votre mot de passe" id="">
        <input type="submit">
    </form>
</div>

<!-- // Ajout link signup -->
<p class="mt-3">
  <a href="<?= route('signup'); ?>"> Pas encore de compte ? Inscrivez vous ! </a>
</p>

<?php

    // Je require mon footer
    require dirname(__DIR__).'/layout/footer.php';

?>