<?php
namespace CTL\SocialMapFavorites\Mail;


class FavAUserMail extends Mail{


  /**
   * Sending Email to User Being Favorited
   * @param  [type] $user      User Object (User Being Favorited)
   * @param  [type] $userFaved User Being Favorited
   * @param  [type] $faveeUser User Favoriting
   * @return [type]            [description]
   */
  public function sendFavAUserNotificationEmail($user, $userFaved, $faveeUser){

      $subject = 'You Subject Here';
      $view = 'folder.extension'; // point to where your email templates are stored
      $data = ['favorited_username' => $userFaved, 'favoritee_username' => $faveeUser];

      return $this->deliver($user, $subject, $view, $data);
  }


}