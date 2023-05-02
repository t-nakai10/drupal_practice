<?php

namespace Drupal\hoge\Controller;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;

/**
 * hoge コントローラー.
 */
class HogeController extends ControllerBase {

  /**
   * レンダリング配列を返却.
   */
  public function content() {
    return [
      '#markup' => $this->t('Hello, World!'),
    ];
  }

  /**
   * カスタムのルートアクセスチェック.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public function access(AccountInterface $account) {
    $is_logged_id = $account->isAuthenticated();
    return AccessResult::allowedIf($is_logged_id);
  }

}
