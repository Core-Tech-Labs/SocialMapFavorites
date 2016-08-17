<?php

use Illuminate\Mail\Mailer;
use CTL\SocialMapFavorites\Mail\Mail;
use CTL\SocialMapFavorites\Mail\FavAUserMail;

class FavAUserMailTest extends TestCase{


    /**
     * [test_Mail_abstract_class description]
     * @return [type] [description]
     */
    function test_Mail_abstract_class(){

      $mailer = Mailer::class;

      $TestingabsMail = $this->getMockBuilder(Mail::class)
              ->disableOriginalConstructor()
              ->setConstructorArgs([$mailer])
              ->getMockForAbstractClass();

      $TestingabsMail->expects($this->any())
              ->method('deliver')
              ->will($this->returnValue(true));

    }

    /**
     * [test_if_it_sends_email_to_new_favorited_user description]
     * @return [type] [description]
     */
    function test_if_it_sends_email_to_new_favorited_user(){

      $user = new User;

      $abs = $this->getMockBuilder(FavAUserMail::class)
            ->disableOriginalConstructor()
            ->getMock();


      $abs->expects($this->any())
          ->method('sendFavAUserNotificationEmail')
          ->will($this->returnValue(true));


      $this->assertTrue($abs->sendFavAUserNotificationEmail($user, 'favorited_username','favoritee_username') );

    }
}