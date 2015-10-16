/**
 * Created by constantin on 15.10.15.
 */
console.log("Hi!");

MonitorQuote = new Object();

/**
 * Inserts quote icons in every comment.
 */
MonitorQuote.addQuoteLinks = function () {
	jQuery('.comment-content').each(function () {
		var icons = jQuery(this).find('.comment-icons');

		if (!icons) {
			icons = jQuery('<div class="comment-icons pull-right"></div>');
			jQuery(this).prepend(icons);
		}

		var quoteLink = jQuery('<a href="#comment-form" title="' + Joomla.JText.PLG_CONTENT_MONITORQUOTE_QUOTE_THIS + '"></a>');
		var quoteIcon = jQuery('<span class="icon-quote"></span>');
		quoteLink.append(quoteIcon);
		quoteLink.click(MonitorQuote.quoteComment);

		icons.append(quoteLink);

	});
};

/**
 * Creates a new comment quoting this comment.
 */
MonitorQuote.quoteComment = function () {
	var form = jQuery('#comment-form').find('form');

	if (form.length > 1) {
		form = form.first();
	}

	var area = form.find('textarea[name=text]');
	var comment = jQuery(this).parent().parent().parent();
	var text = comment.find('.comment-text');

	var quote = '{quote='
		+ comment.data('author') + ','
		+ comment.data('issue') + '.'
		+ comment.data('comment') + '}'
		+ text.text().trim()
		+ '{/quote}';

	area.val(area.val() + quote);
};

MonitorQuote.addQuoteLinks();
