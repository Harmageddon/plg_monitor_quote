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
 * @var  array  $displayData
 */
?>
<blockquote>
	<?php echo $displayData['text']; ?>
	<footer itemscope itemtype="http://schema.org/Comment">
		<a href="<?php echo $displayData['url']; ?>"
			title="<?php echo JText::_('PLG_CONTENT_MONITORQUOTE_VIEW_COMMENT'); ?>">
			<?php echo JText::sprintf('PLG_CONTENT_MONITORQUOTE_WRITTEN_BY', '<span itemprop="author">' . $displayData['username'] . '</span>'); ?>
		</a>
	</footer>
</blockquote>


