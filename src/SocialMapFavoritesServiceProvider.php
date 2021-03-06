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
        __DIR__.'/Jobs/FavAUser.php' => base_path('app/Jobs'),
    ]);

    $this->publishes([
        __DIR__.'/Jobs/unFavAUser.php' => base_path('app/Jobs'),
    ]);

    $this->publishes([
        __DIR__.'/Core/Users/' => base_path('Core/Users/'),
    ]);

    $this->publishes([
        __DIR__.'/Mail/' => base_path('Core/Users/Mail')
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
