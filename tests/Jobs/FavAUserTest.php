<?php

use CTL\SocialMapFavorites\Jobs\FavAUser;

class FavAUserTest extends TestCase{

  function test_favoritee_user_created(){
      $model = $this->makeUser();

      $this->assertEquals(1, $model->id);
  }

    function test_if_it_stores_the_favoritee_id(){
      $user = new User;

      $FavAUserCommand = new FavAUser($user->userID, $user->userIDToFav);

      $user->favUsers()->attach($user->userIDToFav);

    }
}