# Social Map Favorites

[![Latest Stable Version](https://poser.pugx.org/ctl/socialmapfavorites/v/stable?format=flat-square)](https://packagist.org/packages/ctl/socialmapfavorites)
[![Software License](https://img.shields.io/badge/License-EPL-green.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/Core-Tech-Labs/SocialMapFavorites.svg?branch=master)](https://travis-ci.org/Core-Tech-Labs/SocialMapFavorites)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Core-Tech-Labs/SocialMapFavorites/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Core-Tech-Labs/SocialMapFavorites/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Core-Tech-Labs/SocialMapFavorites/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Core-Tech-Labs/SocialMapFavorites/?branch=master)
[![Total Downloads](https://poser.pugx.org/ctl/socialmapfavorites/downloads?format=flat-square)](https://packagist.org/packages/ctl/socialmapfavorites)
[![Latest Unstable Version](https://poser.pugx.org/ctl/socialmapfavorites/v/unstable?format=flat-square)](https://packagist.org/packages/ctl/socialmapfavorites)

**A PHP Package for Favoriting and Unfavoriting Authenticated Users**

Currently only supported for Laravel 5.1

### IMPORTANT: THIS PACKAGE IS CURRENTLY IN DEVELOPEMNT.

## Install

Via Composer

``` bash
$ composer require ctl/socialmapfavorites
```

## Installation


``` bash
$ php artisan vendor:publish
```

Navigate to `App/Commands/FavAUserCommand`. Replace `use CTL\SocialMapFavorites\Commands\Command;` with `use App\Commands\Command;`

Repeat above with `unFavAUserCommand`

Navigage to `App\Users`. Add `ActionableTrait` like so....

``` php
<?php
namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, ActionableTrait;

    /**
     * The database table used by the model.
```

Finally, run....
``` bash
$ php artisan make:migrate CreateFavoritesTable
```

To create a favs table

Your Migration should look like

``` php
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favs', function(Blueprint $table){
            $table->increments('id');
            $table->integer('favoritee_id')->index();
            $table->integer('favorited_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favs', function(Blueprint $table){
            Schema::drop('favs');
        });
    }
}
```
### Extended Installation

Within blade files..

``` php
    @if (!$VariableName->checkFavorited() )
        <div class="btn-group">
          {!! Form::open(['action'=>'ControllerName@store']) !!}
          {!! Form::hidden('userIDToFav', $VariableName->id) !!}

            <button type="submit" class="btn btn-success">Add Fav</button>
          {!! Form::close() !!}
        </div>
    @else
        {!! Form::open(['method' => 'DELETE', 'action' => ['ControllerName@destroy', $VariableName->id] ]) !!}
        {!! Form::hidden('userIDToUnFav', $VariableName->id) !!}
      <div class="btn-group">
        <button type="submit" class="btn btn-primary FavLabel"><span>Favorited</span></button>
        {!! Form::close() !!}
      </div>
    @endif
```

Within your controller

``` php

    /**
     * Favorite A User
     *
     */
    public function store(Request $request)
    {
        $base = array_add($request, 'userID', Auth::id() );
        $this->dispatchFrom(FavAUserCommand::class, $base);
    }

    /**
     * UnFavorite a user
     *
     */
    public function destroy(Request $request)
    {
        $base = array_add($request, 'userID', Auth::id() );
        $this->dispatchFrom(UnFavAUserCommand::class, $base);
    }

```


## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/Core-Tech-Labs/SocialMapFavorites/blob/master/CONTRIBUTING.md) for details.

## License

Eclipse Public License (EPL v1.0). Please see [License](LICENSE.md) for more information.
