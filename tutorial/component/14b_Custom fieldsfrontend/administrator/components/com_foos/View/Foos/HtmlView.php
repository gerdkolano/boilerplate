<?php

/**
 * @package     Joomla.Administrator
 * @subpackage  com_foos
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Foos\Administrator\View\Foos;

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\Toolbar;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\Component\Foos\Administrator\Helper\FooHelper;

/**
 * View class for a list of foos.
 *
 * @since  1.6
 */
class HtmlView extends BaseHtmlView
{

	/**
	 * An array of items
	 *
	 * @var  array
	 */
	protected $items;

	/**
	 * The sidebar markup
	 *
	 * @var  string
	 */
	protected $sidebar;

	/**
	 * Display the view.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise an Error object.
	 */
	public function display($tpl = null)
	{
		$this->items = $this->get('Items');

		$this->addToolbar();

		return parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   4.0
	 */
	protected function addToolbar()
	{
		FooHelper::addSubmenu('foos');
		$this->sidebar = \JHtmlSidebar::render();

		$canDo = ContentHelper::getActions('com_foos');

		// Get the toolbar object instance
		$toolbar = Toolbar::getInstance('toolbar');

		ToolbarHelper::title(Text::_('COM_FOOS_MANAGER_FOOS'), 'address foo');

		if ($canDo->get('core.create'))
		{
			$toolbar->addNew('foo.add');
		}
		
		if ($canDo->get('core.options'))
		{
			$toolbar->preferences('com_foos');
		}

		HTMLHelper::_('sidebar.setAction', 'index.php?option=com_foos');
	}
}