<?php

class ActionableTest extends TestCase{

    function test_it_stores_the_favoritee_id_from_user_model(){

      $model = $this->makeUser();

      $this->assertEquals(
        $model->getFavoriteeId()
      );

    }
}