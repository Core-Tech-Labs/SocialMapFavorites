<?php

use CTL\SocialMapFavorites\Jobs\FavAUser;
use CTL\SocialMapFavorites\Jobs\unFavAUser;

class unFavAUserTest extends TestCase{

  function test_favoritee_user_created(){
      $model = $this->makeUser();

      $this->assertEquals(1, $model->id);
  }


  function test_if_it_deletes_the_favoritee_id(){
      $user = new User;

      $unFavAUserCommand = new unFavAUser($user->userID, $user->userIDToUnFav);

      $user->favUsers()->detach($user->userIDToUnFav);
    }
}