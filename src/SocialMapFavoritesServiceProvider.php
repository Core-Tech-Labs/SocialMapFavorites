<?php
namespace CTL\SocialMapFavorites;

use Illuminate\Support\ServiceProvider;

class SocialMapFavoritesServiceProvider extends ServiceProvider {

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
      $this->loadupCommands();
      $this->loadupMigrations()

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
   * Setting up migration files
   */
  protected function loadupMigrations(){
    $this->publishes([
        __DIR__.'/database' => database_path('migrations'),
    ], 'fav_migration');
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
