<?php

namespace Drupal\training\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * タピオカアノテーションオブジェクト.
 *
 * @Annotation
 */
class Tapioca extends Plugin {
  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The plugin label.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

  /**
   * The plugin description.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $description;

}
