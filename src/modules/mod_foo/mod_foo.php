<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_foo
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use FooNamespace\Module\Foo\Site\Helper\FooHelper;

$test  = FooHelper::getText();

$url = $params->get('domain');

require ModuleHelper::getLayoutPath('mod_foo', $params->get('layout', 'default'));
