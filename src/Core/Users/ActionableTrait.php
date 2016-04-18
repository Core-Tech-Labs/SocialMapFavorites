<?php
namespace CTL\SocialMapFavorites\Core\Users;


trait ActionableTrait{

  /**
   * Eloquent Model that Belongs to itself
   */
  public function favUsers(){

      return $this->belongsToMany(static::class, 'favs', 'favoritee_id', 'favorited_id' )->withTimestamps();
  }

  /**
   * Eloquent Model belongs to itself
   */
  public function favs(){

      return $this->belongsToMany(static::class, 'favs', 'favorited_id', 'favoritee_id')->withTimestamps();
  }

  /**
   * Checks who ever the Authenticated User favorited.
   */
  public function CheckFavorited(){

    $fvId = \Auth::user()->favUsers()->lists('favorited_id')->toArray();
    return in_array($this->id, $fvId);
  }

}