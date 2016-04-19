<?php

namespace CTL\SocialMapFavorites\test\ServiceProvider;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use CTL\SocialMapFavorites\SocialMapFavoritesServiceProvider;


abstract class ServiceProviderAbstractTestClass extends AbstractPackageTestCase{

  protected function getServiceProviderClass($app){

    return SocialMapFavoritesServiceProvider::class;
  }
}

class ServiceProviderTest extends ServiceProviderAbstractTestClass{

  use ServiceProviderTrait;
}