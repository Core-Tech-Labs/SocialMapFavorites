<?php

class ActionableTest extends TestCase{

  function test_favoritee_user_created(){
      $model = $this->makeUser();

      $this->assertEquals(1,
        $model->id
      );
  }

    function test_it_stores_the_favoritee_id_from_user_model(){



    }
}