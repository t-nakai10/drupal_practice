<?php

namespace Drupal\training;

use Drupal\Core\Plugin\PluginBase;

/**
 * タピオカベース.
 */
class TapiocaBase extends PluginBase implements TapiocaPluginInterface {

  /**
   * test.
   */
  public function getOrder() {
    return $this->pluginDefinition['order'];
  }

}
