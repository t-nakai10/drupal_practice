<?php

namespace Drupal\hoge\Form;

use Drupal\Core\Batch\BatchBuilder;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

/**
 * ノード一括更新フォーム.
 */
class HogeBatchForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'hoge_batch_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Batch'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $nids = \Drupal::entityQuery('node')
      ->accessCheck(FALSE)
      ->execute();

    $batch_builder = (new BatchBuilder())
      ->setTitle('一括更新')
      ->setFinishCallback([$this, 'hogeAddMessage'])
      ->setInitMessage('バッチ処理中です')
      ->setProgressMessage('@current / @total を処理中です')
      ->setErrorMessage('エラーです');
    foreach ($nids as $key => $nid) {
      $batch_builder->addOperation([$this, 'hogeUpdateNode'], [$nid]);
    }
    batch_set($batch_builder->toArray());
  }

  /**
   * ノード更新.
   */
  public function hogeUpdateNode($nid, &$context) {
    $node = Node::load($nid);
    $node->set('title', 'ホゲ');
    $node->save();
  }

  /**
   * 完了後のメッセージ.
   */
  public static function hogeAddMessage(bool $success, array $results, array $operations) {
    if ($success) {
      \Drupal::messenger()->addStatus('成功しました');
    }
    else {
      \Drupal::messenger()->addError('失敗しました');
    }
  }

}
