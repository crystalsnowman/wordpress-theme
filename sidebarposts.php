<li>
	<a href="<?php the_permalink(); ?>" rel="bookmark" target="_blank" title="<?php the_title(); ?>">
		<p class="thumbnail-box"><?php the_post_thumbnail( array( 75, 75 ) ); ?></p>
		<?php the_title(); ?>
		<p class="postinfo">
			<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></time>
		</p>
	</a>
</li>
