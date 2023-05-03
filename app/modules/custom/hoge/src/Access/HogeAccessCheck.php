<?php

namespace Drupal\hoge\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;

/**
 * カスタムアクセスチェック.
 */
class HogeAccessCheck implements AccessInterface {

  /**
   * カスタムアクセスチェック.
   */
  public function access() {
    return AccessResult::allowed();
  }

}
