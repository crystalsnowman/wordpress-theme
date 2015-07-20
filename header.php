<!DOCTYPE html>
<!-- header - - - - - - - - - - - - - - - - - - - - - -->
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="author" content="CrystalSnowman" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- title -->
<?php if ( is_home() && is_paged() ) : ?>
	<title><?php bloginfo('name'); ?> [<?php echo get_query_var('paged'); ?> page]</title>
<?php elseif ( is_category() && is_paged() ) : ?>
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?> [<?php echo get_query_var('paged'); ?> page]</title>
<?php elseif ( is_month() && is_paged() ) : ?>
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?> [<?php echo get_query_var('paged'); ?> page]</title>
<?php else : ?>
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php endif; ?>
<!-- description -->
<?php if ( is_category() && !is_paged() ) : ?>
	<meta name="description" content="「<?php single_cat_title(); ?>」カテゴリの投稿を集めたページです。主にIT関連と書評が中心です。">
<?php elseif ( is_category() && is_paged() ) : ?>
	<meta name="description" content="「<?php single_cat_title(); ?>」カテゴリの投稿を集めたページです。<?php echo get_query_var('paged'); ?>ページ目です。主にIT関連と書評が中心です。">
<?php elseif ( is_month() && !is_paged() ) : ?>
	<meta name="description" content="<?php echo get_the_date( 'Y年n月' ); ?>の投稿を集めたページです。2015年2月から投稿を始めました。">
<?php elseif ( is_month() && is_paged() ) : ?>
	<meta name="description" content="<?php echo get_the_date( 'Y年n月' ); ?>の投稿を集めたページです。<?php echo get_query_var('paged'); ?>ページ目です。2015年2月から投稿を始めました。">
<?php elseif ( is_page(35) ) : ?>
	<meta name="description" content="お問い合わせのページです。何かありましたらご連絡ください。">
<?php elseif ( is_page(26) ) : ?>
	<meta name="description" content="このサイトと著者についての紹介ページです。">
<?php elseif ( is_single() ) : ?>
	<meta name="description" content="<?php echo mb_substr(preg_replace("(\r\n|\r|\n|^ +)", "", strip_tags(apply_filters('the_content', $post->post_content))), 0, 120); ?>">
<?php elseif ( is_search() ) : ?>
	<meta name="description" content="「<?php echo $s ?>」についての記事の検索結果ページです。このブログによってあなたの時間が節約できますように。">
<?php elseif ( is_home() && is_paged() ) : ?>
	<meta name="description" content="<?php bloginfo('name'); ?>の<?php echo get_query_var('paged'); ?>ページ目です。このブログによってあなたの時間が節約できますように。">
<?php elseif ( is_home() ) : ?>
	<meta name="description" content="さくらVPSとWordPressで、ITや書評についてのブログをはじめました。このブログによってあなたの時間が節約できますように。">
<?php else : ?>
	<meta name="description" content="さくらVPSとWordPressで、ITや書評についてのブログをはじめました。このブログによってあなたの時間が節約できますように。">
<?php endif; ?>
<!-- External files -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" >
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/vnd.microsoft.icon" />
	<link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/vnd.microsoft.icon" />
<?php wp_enqueue_script( 'jquery' ); ?>
<!-- wordpress header setting -->
<?php wp_head(); ?>
<!-- additional style -->
<!-- added javascript -->
<!-- <?php comments_popup_script(); ?> -->
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5Q7G7Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5Q7G7Q');</script>
<!-- End Google Tag Manager -->


<header class="color-main">
<!-- site info - - - - - - - - - - - - - - - - - - - - - -->
<div class="siteinfo color-siteinfo">
<div class="container">
	<div class="title_area">
		<h1><a class= "color-site-title" href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<p><?php bloginfo( 'description' ); ?></p>
	</div><!-- .title_area -->
	<nav class="search_area">
		<?php get_search_form(); ?>
	</nav><!-- .search_area -->
</div><!-- .container -->
</div><!-- .siteinfo -->

<!-- header image - - - - - - - - - - - - - - - - - - - - - -->
<?php if ( is_home() && !is_paged() || is_page() ) : ?>
	<?php if ( get_header_image() ) : ?>
<img src="<?php header_image(); ?>"
		width="<?php echo get_custom_header()->width; ?>"
		height="<?php echo get_custom_header()->height; ?>"
		alt="crystalsnowman header image" />
	<?php endif; ?>
<?php endif; ?>

<!-- main menu nav - - - - - - - - - - - - - - - - - - - - - -->
<nav class="mainMenuNav">
<div class="container">
<!--	<?php wp_nav_menu( 'theme_location=navigation' ); ?> -->
	<?php wp_nav_menu( array( 'theme_location' => 'header-navi', ) ); ?>
</div><!-- .container -->
</nav>

</header>