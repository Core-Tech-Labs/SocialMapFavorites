<?php

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as DB;

abstract class TestCase extends PHPUnit_Framework_TestCase{



  public function setUp(){

    $this->setUpDatabase();
    $this->migrateTables();
  }

  protected function setUpDatabase(){

    $db = new DB;

    $db->addConnection([
        'driver' => 'sqlite',
        'database' => ':memory:',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
    ]);


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

    DB::schema()->create('users', function($table){
      $table->increments('id');
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