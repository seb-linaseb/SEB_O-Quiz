<?php
require dirname(__DIR__).'/layout/header.php';
require dirname(__DIR__).'/layout/nav.php';
?>

<h3><?= $currentUser->firstname. ' ' . $currentUser->lastname ?></h3>
<h4><?=$currentUser->email?></h4>

<?php
require dirname(__DIR__).'/layout/footer.php';
?>