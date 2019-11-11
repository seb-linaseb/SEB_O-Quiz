<nav>

<ul>
    <li>
        <a href="<?= route('home') ?>">
        <h1>O'Quiz</h1>
        </a>
    </li>
</ul>

<ul>
    <li>
        <a href="<?= route('home') ?>">
            <i></i>
            Accueil
        </a>
    </li>


    <li>
    <?php if ($isConnected): ?>
        <a href="account">
    <?php else: ?>
        <a href="signin">
    <?php endif; ?>
            <i></i>
            Mon compte
        </a>
    </li>

    <li>
        <a href="<?= route('list_tag') ?>">
            <i></i>
            Liste des sujets
        </a>
    </li>


<?php if ($isConnected): ?>

    <?php if ($isAdmin): ?>
        <li>
            <a href="<?= route('#') ?>">
                <i></i>
                Admin
            </a>
        </li>

    <?php endif; ?>

        <li>
            <a href="<?= route('loggout') ?>">
                <i></i>
                Déconnexion de l'utilisateur <?= $currentUser->firstname ?>

            </a>
        </li>

    <?php else: ?>

        <li>
            <a href="<?= route('signin') ?>">
                <i></i>
                Se connecter
            </a>
        </li>

    <?php endif; ?>



</ul>
</nav>