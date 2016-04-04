<?php

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

abstract class TestCase extends PHPUnit_Framework_TestCase{



  public function databaseSetup(){

    $this->setUpDatabase();
    $this->migrateTables();
  }

  protected function setUpDatabase(){

    $db = new DB;

    $db->addConnection(['driver' => 'sqlite', 'database' => ':memory:']);
    $db->connection();

    $db->setEventDispatcher(new Dispatcher(new Container));

    $db->setAsGlobal();
    $db->bootEloquent();
  }

  protected function migrateTables(){
    DB::schema()->create('favs', function($table){
      $table->increments('id');
      $table->string('favoritee_id');
      $table->string('favorited_id');
      $table->timestamps();
    });

  }

  protected function makeUser(){

    $user = new User;
    $user->id = 1;
    $user->save();

    return $user;
  }

}

class User extends Model{

  use CTL\SocialMapFavorites\Core\Users\ActionableTrait;
}