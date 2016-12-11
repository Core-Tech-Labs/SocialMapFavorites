<?php

class ActionableTraitTest extends TestCase{

  function test_favs_method(){
    $user = new User;
    $user->favs();

  }

  function test_favUsers_method(){
    $user = new User;

    $user->favUsers();
  }

  function test_CheckFavorited_method(){

  }


}