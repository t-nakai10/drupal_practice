<?php

namespace Drupal\hoge\Controller;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\node\NodeInterface;

/**
 * hoge コントローラー.
 */
class HogeController extends ControllerBase {

  /**
   * レンダリング配列を返却.
   */
  public function content(NodeInterface $node) {
    $title = $node->getTitle();
    $body = $node->body->value;
    return [
      '#type' => 'markup',
      '#markup' => "<h1>$title</h1><div>$body</div>",
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
