<nav class="blogmenu">
<ul>
<!--	<?php dynamic_sidebar(); ?> -->

	<!-- about author -->
	<li class="widget widget_text">
		<h2 class="widgettitle">著者紹介 : CrystalSnowman</h2>
		<div class="textwidget">

			<div align="center" style="margin-bottom:20px;">
				<img width="80%" height="auto"  src="/wp-content/uploads/2015/02/20150220_171817394_iOS-800x600-e1424457474801-300x239.jpg"
					class="attachment-medium wp-post-image" alt="crystal snowman image">
			</div>

			<p>
				さくらVPSでサーバを構築してWordPressでブログをはじめました。技術的なことや読んだ本の感想などを記事にしたいと思います。
				<br/><br/>
				私の得た知識や失敗談によって、あなたの貴重な時間が節約できますように。
			</p>
			<p>twitterでもつぶやいています。よかったら見てみてください。</p>

			<aside class="twtr_link">
				<a href="https://twitter.com/snowman_crystal" title="@snowman_crystal" target="_blank">@snowman_crystal</a>
			</aside>
		</div>
	</li>

	<!-- recent posts -->
	<?php
		$lat_args = array (
			'posts_per_page' => 5,
		);
		$lat_query = new WP_Query( $lat_args );
	?>
	<li class="widget widget_text">
		<h2 class="widgettitle">最近の記事</h2>
		<div class="textwidget">
			<ul>
			<?php while ( $lat_query->have_posts() ) : $lat_query->the_post(); ?>
				<?php get_template_part( 'sidebarposts' ); ?>
			<?php endwhile; ?>
			</ul>
			<?php wp_reset_postdata(); ?>
		</div>
	</li>

	<!-- popular posts -->
	<?php
		$pop_args = array (
			'post__in' => array ( 162, 723, 354, 344, 272 ),
			'orderby'  => 'post__in',
		);
		$pop_query = new WP_Query( $pop_args );
	?>
	<li class="widget widget_text">
		<h2 class="widgettitle">アクセスが多かった記事</h2>
		<div class="textwidget">
			<ul>
			<?php while ( $pop_query->have_posts() ) : $pop_query->the_post(); ?>
				<?php get_template_part( 'sidebarposts' ); ?>
			<?php endwhile; ?>
			</ul>
			<?php wp_reset_postdata(); ?>
		</div>
	</li>

	<!-- category archives -->
	<?php
		$cat_args = array (
			'title_li'    => '',
			'show_count'  => true,
		);
	?>
	<li class="widget widget_categories">
		<h2 class="widgettitle">カテゴリー</h2>
		<ul>
			<?php wp_list_categories( $cat_args ); ?>
		</ul>
	</li>

	<!-- monthly archives -->
	<?php
		$mon_args = array (
			'type'        => 'monthly',
			'show_post_count'  => 1,
		);
	?>
	<li class="widget widget_archive">
		<h2 class="widgettitle">月別アーカイブ</h2>
		<ul>
			<?php wp_get_archives( $mon_args ); ?>
		</ul>
	</li>

<!-- RSS Feed
	<li class="widget">
	  <ul>
	    <li><a href="<?php esc_url( bloginfo( 'rss2_url' ) ); ?>"><i class="fa fa-rss-square"></i> RSS</a></li>
	  </ul>
	</li>
-->

</ul>
</nav>