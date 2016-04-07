<?php
namespace CTL\SocialMapFavorites\Core\Users;

use App\User;

class UsersOrigin{



    public function save(User $user){
      $user->save();
    }

    /**
     * Find users ID
     *
     * @param  integer $id
     */
    public function findById($id){

        return User::findOrFail($id);
    }

    /**
     * Favoriting a Users
     * @param  integer $userIDToFav Favoritee ID
     * @param  Object    $user         User Model
     */
    public function favoriteUser($userIDToFav, User $user){
      return $user->favUsers()->attach($userIDToFav);
    }

    /**
     * Unfavoriting a User
     * @param  integer $userIDToUnFav Favoritee ID
     * @param  Object    $user          User Model
     */
    public function unfavoriteUser($userIDToUnFav, User $user){
      return $user->favUsers()->detach($userIDToUnFav);
    }
}