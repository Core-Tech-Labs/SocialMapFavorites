<?php

use CTL\SocialMapFavorites\Commands\FavAUserCommand;
use CTL\SocialMapFavorites\Commands\UnFavAUserCommand;

class ActionableTest extends TestCase{

  function test_favoritee_user_created(){
      $model = $this->makeUser();

      $this->assertEquals(1, $model->id);
  }

    function test_if_it_stores_the_favoritee_id(){
      $user = new User;

      $FavAUserCommand = new FavAUserCommand($user->userID, $user->userIDToFav);

      $user->favUsers()->attach($user->userIDToFav);

    }

    function test_if_it_deletes_the_favoritee_id(){
      $user = new User;

      $UnFavAUserCommand = new unFavAUserCommand($user->userID, $user->userIDToUnFav);

      $user->favUsers()->detach($user->userIDToUnFav);
    }
}