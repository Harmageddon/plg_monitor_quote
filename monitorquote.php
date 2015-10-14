<?php
/**
 * @package     MonitorQuote
 * @subpackage  content
 *
 * @copyright   Copyright (C) 2015 Constantin Romankiewicz.
 * @license     Apache License 2.0; see LICENSE
 */
defined('_JEXEC') or die;

/**
 * This plugin provides a button and some syntax to quote comments.
 *
 * @author  Constantin Romankiewicz <constantin@zweiiconkram.de>
 * @since   1.0
 */
class PlgContentMonitorQuote extends JPlugin
{

	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 *
	 * @since  1.0
	 */
	protected $autoloadLanguage = true;

	/**
	 * Insert quotes into comment texts.
	 *
	 * @param   string   $context  The context of the content being passed to the plugin.
	 * @param   mixed    &$item    The item displayed.
	 * @param   mixed    $params   Additional parameters.
	 * @param   integer  $page     Optional page number.
	 *
	 * @return  null
	 */
	public function onContentPrepare($context, &$item, $params, $page = 0)
	{
		// Check if the component is installed and enabled.
		if (!JComponentHelper::isEnabled('com_monitor'))
		{
			return null;
		}

		$allowed_contexts = array('com_monitor.comment');

		if (!in_array($context, $allowed_contexts))
		{
			return null;
		}

		// Simple performance check to determine whether bot should process further
		if (strpos($item->text, 'quote') === false)
		{
			return null;
		}

		$regex = "/\{quote\=(.*?)\,(\d*)\.(\d*)\}(.*?)\{\/quote\}/";
		$source = '';
		$replacement = '<blockquote>$3</blockquote>';

		$item->text = preg_replace_callback($regex, 'PlgContentMonitorQuote::replace', $item->text);

	}

	public static function replace($match)
	{
		$url = JRoute::_('index.php?option=com_monitor&view=issue&id=' . (int) $match[2] . '#comment-' . (int) $match[3]);
		$displayData = array(
			'username' => $match[1],
			'url' => $url,
			'text' => $match[4],
		);

		return JLayoutHelper::render('quote', $displayData, __DIR__ . '/layouts');
	}
}
