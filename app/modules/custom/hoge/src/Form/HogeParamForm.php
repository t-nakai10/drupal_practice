<?php

namespace Drupal\hoge\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * ルーティングから渡される値のチェック.
 */
class HogeParamForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'hoge_param_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, AccountInterface $user = NULL) {
    // フォームの場合デフォルトの値は必須.
    dpm($user->getAccountName());
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
