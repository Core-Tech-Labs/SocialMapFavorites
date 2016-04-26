<?php

namespace CTL\SocialMapFavorites\Jobs;

use Core\Users\UsersOrigin;
use CTL\SocialMapFavorites\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class FavAUser extends Job implements ShouldQueue
{

    use InteractsWithQueue, SerializesModels;



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
