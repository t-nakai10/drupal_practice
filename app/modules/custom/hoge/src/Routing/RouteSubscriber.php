<?php

namespace Drupal\hoge\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * 既存のルートを変更する.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('user.login')) {
      $route->setPath('/login');
    }
    if ($route = $collection->get('user.logout')) {
      $route->setRequirement('_access', 'FALSE');
    }
  }

}
