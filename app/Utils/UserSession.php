<?php

namespace App\Utils;

use App\Models\User;

abstract class UserSession {

    // Constante contenant l'index du tableau de session
    const SESSION_INDEX_NAME = 'connectedUser';

    // Constante contenant l'id du role admin en BDD
    const ROLE_ADMIN = 1;

    /**
     * Méthode permettant de connecter un utilisateur
     *
     * @param \App\Models\User $user
     */
    public static function connect(User $user): bool
    {
        // J'assigne l'id de l'user en session
        $_SESSION[self::SESSION_INDEX_NAME] = $user->id;

        return true;
    }

    /**
     * Méthode permettant de déconnecter un utilisateur
     */
    public static function disconnect(): bool
    {
        // Je supprime la variable en session
        unset($_SESSION[self::SESSION_INDEX_NAME]);

        return true;
    }

    /**
     * Méthode permettant de savoir si le visiteur est connecté à un compte
     *
     * @return bool
     */
    public static function isConnected() : bool
    {
        // Je test l'existence de la variable en session
        return !empty($_SESSION[self::SESSION_INDEX_NAME]);
    }

    /**
     * Méthode permettant de récupérer le Model de l'utilisateur connecté
     *
     * @return \App\Models\User ou NULL
     *
     * Ici le ? permet de dire soit NULL soit un objet de la classe User
     */
    public static function getUser(): ?User
    {
        // Je vérifie si je suis connecté
        if (self::isConnected()) {

            return User::findOrFail($_SESSION[self::SESSION_INDEX_NAME]);
        }

        return null;
    }

    /**
     * Méthode permettant de récuperer l'id du role de l'utilisateur connecté
     *
     * @return int
     */
    public static function getRoleId(): int
    {
        if (self::isConnected()) {

            return self::getUser()->status;
        }

        return 0;
    }

    /**
     * Méthode permettant de savoir si l'utilisateur connecté est admin
     *
     * @return bool
     */
    public static function isAdmin() : bool
    {
        // Je compare l'id du role de l'utilisateur avec l'id du role admin
        // si ils sont pareil => return true
        // si ils sont différents => return false
        // return (self::getRoleId() == self::ROLE_ADMIN);

        // Revient au même que au dessus
        return self::getRoleId() == self::ROLE_ADMIN ? true : false;
    }
}