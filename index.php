<?php get_header(); ?>

<div class="container">

<div class="outer-contents">
<div class="contents">

<!-- category page title - - - - - - - - - - - - - - - - - - - - - -->
<?php if ( is_category() ) : ?>
	<?php
		$categoryPages = get_the_category();
		$categoryPage  = $categoryPages[0];
	?>
	<h1 class="archive-title">
	<i class="fa fa-folder-open color-main"></i>
	「<?php echo $categoryPage->name; ?>」に関する記事 : <?php echo $categoryPage->count; ?> 件
	</h1>
<?php endif; ?>

<!-- monthly page title - - - - - - - - - - - - - - - - - - - - - -->
<?php if ( is_month() ) : ?>
	<h1 class="archive-title">
	<i  class="fa fa-clock-o color-main"></i>
	<?php echo get_the_date( 'Y年n月' ); ?>に投稿した記事
	</h1>
<?php endif; ?>

<!-- search result page title - - - - - - - - - - - - - - - - - - - - - -->
<?php if ( is_search() ) : ?>
	<?php
		 $searchResults = new WP_Query("s=$s & showposts=-1");
		 $key = wp_specialchars($s, 1);
		 $count = $searchResults->post_count;
	?>
	<h1 class="archive-title">
	<i  class="fa fa fa-search color-main"></i>
	「<?php echo $key?>」で検索した結果：<?php echo $count ?> 件
	</h1>
<?php endif; ?>

<!-- loop start - - - - - - - - - - - - - - - - - - - - - -->
<?php if ( have_posts() ) : ?>
	<?php
	while ( have_posts() ) : the_post(); ?>

<!-- article list - - - - - - - - - - - - - - - - - - - - - -->
	<section <?php post_class( postArticle ); ?> >
<!-- title - - - - - - - - - - - - - - - - - - - - - -->
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" ><?php the_title(); ?></a></h1>

<!-- date, category, comment - - - - - - - - - - - - - - - - - - - - - -->
		<div class="postinfo">

			<div class="date-comme">
			<div class="pub-upd-date">
			<!-- post date -->
			<?php if ( get_the_date() == get_the_modified_date() ) : ?>
				<time class="published updated" datetime="<?php echo get_the_date( 'Y-m-d' ) ?>">
			<?php elseif ( get_the_date() != get_the_modified_date() ) : ?>
				<time class="published" datetime="<?php echo get_the_date( 'Y-m-d' ) ?>">
			<?php endif; ?>
				<i class="fa fa-clock-o"></i>
				<?php echo get_the_date(); ?>
			</time>
			<!-- update date -->
			<?php if ( get_the_date() != get_the_modified_date() ) : ?>
				<time class="updated" datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>">
<!--				&nbsp;更新:<?php echo get_the_modified_date() ?> -->
				&nbsp;<i class="fa fa-refresh"></i>
				<?php echo get_the_modified_date(); ?>
				</time>
			<?php endif; ?>
			</div><!-- .pub-upd-date -->

			<span class="postcom">
				<i class="fa fa-comment"></i>
<!-- pop up comment				<?php comments_popup_link( 'コメント無し', 'コメント (1件)', 'コメント (%件)' ); ?> -->
				<a href="<?php comments_link(); ?>" rel="bookmark">
					<?php comments_number( 'コメント無し', 'コメント (1件)', 'コメント (%件)' ); ?>
				</a>
			</span>
			</div><!-- .date-comme -->

			<div class="cat-auth">
			<span class="postcat">
				<i class="fa fa-folder-open"></i>
				<?php the_category( ', ' ); ?>
			</span>
			<div class="postauth">
			<span class="vcard author">
<!--				<i class="fa fa-user"></i>-->
				著者: <span class="fn"><?php bloginfo( 'name' ); ?></span>
			</span>
			</div><!-- .postauth -->
			</div><!-- .cat-auth -->
		</div><!-- .postinfo -->
<!-- content - - - - - - - - - - - - - - - - - - - - - -->
		<div class="cntnt">
			<div class="excerpt">
			<?php if ( has_post_thumbnail() ) : ?>
				<!-- eyecatch -->
				<p><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'medium' ); ?></a></p>
			<?php endif; ?>

				<!-- excerpt content -->
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
				<!-- more -->
				<p class="more"><a href="<?php the_permalink(); ?>" rel="bookmark">続きを読む <i class="fa fa-chevron-right"></i></a></p>
			</div><!-- .excerpt --> 
		</div><!-- .cntnt --> 
	</section>
<!-- loop end - - - - - - - - - - - - - - - - - - - - - -->
	<?php endwhile; ?>
<?php endif; ?>

</div><!-- .contents -->

<!-- pagination - - - - - - - - - - - - - - - - - - - - - -->
<?php
	$args = array (
		'prev_text'          => '<i class="fa fa-chevron-circle-left"></i> NEXT',
		'next_text'          => 'PREV <i class="fa fa-chevron-circle-right"></i>',
		'show_all'           => false,
		'mid_size'           => 1,
		'screen_reader_text' => 'A',
	);
?>
<div class="pagination-area">
	<?php the_posts_pagination( $args ); ?>
<!--	<?php 
		$pNav = get_the_posts_pagination( $args );
		$pNav = str_replace('<h2 class="screen-reader-text">A</h2>', '', $pNav);
		echo $pNav;
	?> -->
</div><!-- .pagination-area -->

</div><!-- .outer-contents>

<!-- side bar - - - - - - - - - - - - - - - - - - - - - -->
<?php get_sidebar(); ?>

</div> <!-- .container -->

<!-- footer - - - - - - - - - - - - - - - - - - - - - -->
<?php get_footer(); ?>