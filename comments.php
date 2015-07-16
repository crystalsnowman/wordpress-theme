<article id="comments">
<!-- registered comment -->
<?php if ( have_comments() ) : ?>
<h3>コメント</h3>
<ul>
	<?php wp_list_comments( 'avatar_size=0&max_depth=1&format=html5' ); ?>
</ul>
<?php endif; ?>

<!-- leave comment -->
<?php comment_form() ?>

</article>

