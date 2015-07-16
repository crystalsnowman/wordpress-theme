<?php get_header(); ?>

<div class="container">

<!-- loop start - - - - - - - - - - - - - - - - - - - - - -->
<?php if ( have_posts() ) : ?>
	<?php
	while ( have_posts() ) : the_post(); ?>

<!-- article - - - - - - - - - - - - - - - - - - - - - -->
	<article <?php post_class(); ?>>

<!-- title - - - - - - - - - - - - - - - - - - - - - -->
		<h1><?php the_title(); ?></h1>

<!-- date - - - - - - - - - - - - - - - - - - - - - -->
		<!-- 問い合わせページは表示しない -->
		<?php if ( !is_page(35) ) : ?>
		<div class="postinfo">
			<time datetime="<?php echo get_the_date( 'Y-m-d' ) ?>">
				<i class="fa fa-clock-o"></i>
				<?php echo get_the_date(); ?>
			</time>
			<!-- update date -->
			<?php if ( get_the_date('Y-m-d') != get_the_modified_date('Y-m-d') ) : ?>
				<time datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>">
				&nbsp;更新:<?php echo get_the_modified_date() ?>
				</time>
			<?php endif; ?>
		</div>
		<?php endif; ?>
<!-- content - - - - - - - - - - - - - - - - - - - - - -->
		<div class="cntnt">
			<?php the_content(); ?>
		</div>

	</article>
<!-- loop end - - - - - - - - - - - - - - - - - - - - - -->
	<?php endwhile; ?>
<?php endif; ?>


</div> <!-- container -->

<!-- footer - - - - - - - - - - - - - - - - - - - - - -->
<?php get_footer(); ?>