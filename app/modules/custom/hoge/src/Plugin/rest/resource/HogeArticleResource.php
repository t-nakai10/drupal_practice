<?php

namespace Drupal\hoge\Plugin\rest\resource;

use Drupal\node\Entity\Node;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * タグ名を返す.
 *
 * @RestResource(
 *   id = "hoge_tag_resource",
 *   label = "記事コンテンツタイプ用のリソースを返却",
 *   uri_paths = {
 *     "canonical" = "/json/node/{nid}"
 *   }
 * )
 */
class HogeArticleResource extends ResourceBase {

  /**
   * {@inheritdoc}
   */
  public function get($nid): ResourceResponse {
    // 色々チェックは飛ばす.
    $node = Node::load($nid);
    return new ResourceResponse([
      'message' => 'OK',
      'tag' => $node->field_tags->referencedEntities()[0]->getName(),
    ]);

  }

}
