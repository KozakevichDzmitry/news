<?php

function render_sidebar($cb = NULL)
{
?>
	<?php if (is_active_sidebar('main-sidebar')) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php if ($cb != NULL) : ?>
				<?php $cb(); ?>
			<?php endif; ?>
			<?php dynamic_sidebar('main-sidebar'); ?>
		</div>
	<?php endif; ?>
<?php
}
