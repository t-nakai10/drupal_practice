<?php

namespace Drupal\training\Plugin\Tapioca;

use Drupal\training\TapiocaBase;

/**
 * test.
 *
 * @Tapioca(
 *  id = "tapioca_milk_tea",
 *  label = @Translation("Milk Tea"),
 *  description = @Translation("Milk Tea"),
 * )
 */
class TapiocaMilkTea extends TapiocaBase {

  /**
   * test.
   */
  public function getOrder() {
    return $this->pluginDefinition['label'];
  }

}
