<?php
namespace CTL\SocialMapFavorites;

use Illuminate\Support\ServiceProvider;

class SocialMapFavoritesServiceProvider extends ServiceProvider{

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
      $this->loadupCommands();
  }

  /**
   * Setting up Favorite Command Handlers && ActionableTrait
   */
  protected function loadupCommands(){
    $this->publishes([
        __DIR__.'/Commands/FavAUserCommand' => base_path('app/Commands'),
    ]);

    $this->publishes([
        __DIR__.'/Commands/unFavAUserCommand' => base_path('app/Commands'),
    ]);

    $this->publishes([
        __DIR__.'/Core/Users/' => base_path('Core/Users/'),
    ]);

  }

  /**
   * Register any application services.
   *
   */
  public function register()
  {
    //
  }


}
