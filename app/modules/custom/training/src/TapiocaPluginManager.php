<?php

namespace Drupal\training;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * タピオカプラグインマネージャー.
 */
class TapiocaPluginManager extends DefaultPluginManager {

  /**
   * test.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/Tapioca', $namespaces, $module_handler, 'Drupal\training\TapiocaPluginInterface', 'Drupal\training\Annotation\Tapioca');

    $this->alterInfo('tapioca_plugin_info');
    $this->setCacheBackend($cache_backend, 'tapioca_plugin');
  }

}
