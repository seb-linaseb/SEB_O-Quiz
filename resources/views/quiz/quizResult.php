<?php
// Je require mon header
    // https://www.php.net/manual/fr/function.dirname.php
    // J'utilise ici dirname, afin de n'avoir que des chemins absolut !
    require dirname(__DIR__).'/layout/header.php';
// Je require ma nav
    require dirname(__DIR__).'/layout/nav.php';
?>

<div>
  <p>BRAVO !</p>
  <p>Ton score final est de : <?= $score ?></p>
</div>

<?php

// Je require mon footer
require dirname(__DIR__).'/layout/footer.php';

?>