<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\Standards\ConfigurationFactory;
use BaseCodeOy\Standards\Presets\Standard;

$config = ConfigurationFactory::createFromPreset(new Standard());
$config->getFinder()->in(__DIR__);
$config->setRules([
    'mb_str_functions' => false, // The `mb_str` functions mess up encoding in some cases...
]);

return $config;
