<?php

namespace CTL\SocialMapFavorites\Commands;

use Core\Users\UsersOrigin;
use CTL\SocialMapFavorites\Commands\Command;


class FavAUserCommand extends Command
{

    public $userID;

    public $userIDToFav;

    /**
     * Create a new command instance.
     *
     */
    public function __construct($userID, $userIDToFav)
    {
        $this->userID = $userID;
        $this->userIDToFav = $userIDToFav;
    }

    /**
     * Execute the command.
     *
     */
    public function handle(UsersOrigin $UsersOrigin)
    {
        $fav = $UsersOrigin->findById($this->userID);
        $UsersOrigin->favoriteUser($this->userIDToFav, $fav);
    }


}
