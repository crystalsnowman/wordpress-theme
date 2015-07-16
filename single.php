<?php get_header(); ?>

<div class="container">

<div class="outer-contents">
<div class="contents">
<!-- loop start - - - - - - - - - - - - - - - - - - - - - -->
<?php
	while ( have_posts() ) : the_post(); ?>

<!-- article - - - - - - - - - - - - - - - - - - - - -  -->
	<article <?php post_class( postArticle ); ?>>

<!-- title - - - - - - - - - - - - - - - - - - - - - -->
		<h1 class="entry-title"><?php the_title(); ?></h1>

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
				<?php echo get_the_date() ?>
				</time>
			<!-- update date -->
			<?php if ( get_the_date() != get_the_modified_date() ) : ?>
				<time class="updated" datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>">
<!--				&nbsp;更新:<?php echo get_the_modified_date() ?>-->
				&nbsp;<i class="fa fa-refresh"></i>
				<?php echo get_the_modified_date(); ?>
				</time>
			<?php endif; ?>
			</div><!-- .pub-upd-date -->

			<span class="postcom">
				<i class="fa fa-comment"></i>
				<a href="<?php comments_link(); ?>" rel="bookmark">
				<?php comments_number(
					'コメント無し',
					'コメント (1件)',
					'コメント (%件)' ); ?>
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
<!--					<i class="fa fa-user"></i>-->
					著者: <span class="fn"><?php bloginfo( 'name' ); ?></span>
				</span>
			</div><!-- .postauth -->
			</div><!-- .cat-auth -->
		</div><!-- .postinfo --> 
<!-- social bookmark - - - - - - - - - - - - - - - - - - - - - -->
		<aside class="social-bookmark">
			<!-- hatena -->
			<a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?> | <?php bloginfo('name'); ?>"  data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
			&nbsp;
			<!-- twitter -->
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_permalink(); ?>" data-via="snowman_crystal">Tweet</a>
		</aside><!-- .social-bookmark --> 
<!-- entry-content - - - - - - - - - - - - - - - - - - - - - -->
		<div class="cntnt entry-content">
			<?php the_content(); ?>
		</div><!-- .cntnt --> 

<!-- date - - - - - - - - - - - - - - - - - - - - - -->
		<div class="postinfo">
			<div class="pub-upd-date">
			<!-- post date -->
			<?php if ( get_the_date() == get_the_modified_date() ) : ?>
				<time class="published updated" datetime="<?php echo get_the_date( 'Y-m-d' ) ?>">
			<?php elseif ( get_the_date() != get_the_modified_date() ) : ?>
				<time class="published" datetime="<?php echo get_the_date( 'Y-m-d' ) ?>">
			<?php endif; ?>
				<i class="fa fa-clock-o"></i>
				<?php echo get_the_date() ?>
				</time>
			<!-- update date -->
			<?php if ( get_the_date() != get_the_modified_date() ) : ?>
				<time class="updated" datetime="<?php echo get_the_modified_date( 'Y-m-d' ) ?>">
				&nbsp;<i class="fa fa-refresh"></i>
				<?php echo get_the_modified_date(); ?>
				</time>
			<?php endif; ?>
			</div><!-- .pub-upd-date -->

		</div><!-- .postinfo --> 
		</br>
<!-- social bookmark - - - - - - - - - - - - - - - - - - - - - -->
		<aside class="social-bookmark">
			<!-- hatena -->
			<a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?> | <?php bloginfo('name'); ?>"  data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
			&nbsp;
			<!-- twitter -->
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_permalink(); ?>" data-via="snowman_crystal">Tweet</a>
		</aside><!-- .social-bookmark --> 

<!-- custom field link area - - - - - - - - - - - - - - - - - - - - - -->
		<?php if ( post_custom('c-f-link') && !post_custom( 'related_post_id' ) ): ?>
		<section class="custom-field-link">
			<p>※この記事を読まれた方は、ぜひ下記の記事も合わせて読んでみてください。</p>
			<ul>
				<?php echo post_custom( 'c-f-link' ); ?>
			</ul>
		</section><!-- .custom-field-link -->
		<?php endif; ?>


		<?php if ( post_custom( 'related_post_id' ) ):
			$rel_post_id = explode( "," , get_post_meta( $post->ID, 'related_post_id', true) );
			$args = array (
				'post__not_in'   => array( $post->ID ),
				'post__in'       => $rel_post_id,
				'orderby'        => 'post__in',
			);
			$my_query = new WP_Query( $args );
		?>
		<section class="custom-field-link">
			<p>※この記事を読まれた方は、ぜひ下記の記事も合わせて読んでみてください。</p>
			<?php if( $my_query->have_posts() ) : ?>
				<ul>
				<?php while( $my_query->have_posts() ) : $my_query->the_post(); ?>
					<?php get_template_part( 'related-posts' ); ?>
				<?php endwhile; ?>
				</ul>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</section><!-- .custom-field-link -->
		<?php endif; ?>

<!-- link - - - - - - - - - - - - - - - - - - - - - -->
		<nav class="pagenav">
			<span class="prev-art">
				<?php
				$previous_post = get_previous_post();
				$pre_post_title = $previous_post->post_title;
				if ( mb_strlen( $pre_post_title ) > 18 ) { $pre_post_title = mb_substr( $pre_post_title, 0, 18).'...'; }
				if ( !empty( $previous_post ) ): ?>
					<a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>" title="<?php echo $previous_post->post_title; ?>" rel="bookmark"><i class="fa fa-chevron-circle-left"></i> <?php echo $pre_post_title; ?></a>
				<?php endif; ?>
			</span>
			<span class="next-art">
				<?php
				$next_post = get_next_post();
				$next_post_title = $next_post->post_title;
				if ( mb_strlen( $next_post_title ) > 18 ) { $next_post_title = mb_substr( $next_post_title, 0, 18).'...'; }
				if ( !empty( $next_post ) ): ?>
					<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo $next_post->post_title; ?>" rel="bookmark"><?php echo $next_post_title; ?> <i class="fa fa-chevron-circle-right"></i></a>
				<?php endif; ?>
			</span>
		</nav><!-- .pagenav --> 

<!-- comments - - - - - - - - - - - - - - - - - - - - - -->
		<?php comments_template(); ?>

	</article>
<!-- loop end - - - - - - - - - - - - - - - - - - - - - -->
<?php endwhile; ?>

</div><!-- .contents -->
</div><!-- .outer-contents -->

<!-- side bar - - - - - - - - - - - - - - - - - - - - - -->
<?php get_sidebar(); ?>

</div> <!-- .container -->

<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<script src="//platform.twitter.com/widgets.js" id="twitter-wjs" async></script>
<!-- footer - - - - - - - - - - - - - - - - - - - - - -->
<?php get_footer(); ?>