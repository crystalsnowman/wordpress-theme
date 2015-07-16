<li>
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
		<p class="thumbnail-box"><?php the_post_thumbnail( array( 75, 75 ) ); ?></p>
		<?php the_title(); ?>
		<p class="postinfo">
			<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></time>
		</p>

		<span class="postcat">
			<?php
				$category_name;
				foreach( get_the_category() as $categories ) {
					$category_name = $category_name . '<i class="fa fa-folder-open"></i> ' . $categories->cat_name. ', ';
				}
				echo rtrim( $category_name, ", " );
			?>
		</span>
	</a>
</li>