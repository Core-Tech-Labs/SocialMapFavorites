<?php

namespace CTL\SocialMapFavorites\Commands;

use Core\Users\UsersOrigin;
use CTL\SocialMapFavorites\Commands\Command;

class UnFavAUserCommand extends Command
{

    public $userID;

    public $userIDToUnFav;


    /**
     * Create a new command instance.
     *
     */
    public function __construct($userID, $userIDToUnFav)
    {
        $this->userID = $userID;
        $this->userIDToUnFav = $userIDToUnFav;
    }

    /**
     * Execute the command.
     *
     */
    public function handle(UsersOrigin $UsersOrigin)
    {
        $unFav = $UsersOrigin->findById($this->userID);
        $UsersOrigin->unfavoriteUser($this->userIDToUnFav, $unFav);
    }
}
