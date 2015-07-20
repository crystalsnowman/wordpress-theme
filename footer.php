<!-- go to top -->
<div id="page-top">
	<p><a id="move-page-top"><i class="fa fa-chevron-circle-up"></i> Top</a></p>
</div><!-- #page-top -->

<footer class="color-main">
<div class="container">
	<small>Copyright &copy; <?php bloginfo( 'name' ); ?></small>
</div>
</footer>
<!-- wordpress footer setting -->
<?php wp_footer(); ?>
<!-- additional style -->
<style>
	.crayon-main::-webkit-scrollbar,.crayon-plain::-webkit-scrollbar { height:13px; width: 13px; }
	.crayon-main::-webkit-scrollbar-thumb,.crayon-plain::-webkit-scrollbar-thumb { border:1px solid #808080; }
</style>
<!-- External files -->
<!-- added javascript -->
<script>
jQuery(function(){
	//ボタン[id:page-top]を出現させるスクロールイベント
	jQuery(window).scroll(function(){
		var now = jQuery(window).scrollTop(); //最上部から現在位置までの距離を取得して、変数[now]に格納

		if ( now > 1000 ) {  //最上部から現在位置までの距離(now)が1000以上
			jQuery('#page-top').fadeIn('slow');  //[#page-top]をゆっくりフェードインする
		} else {  //それ以外だったらフェードアウトする
			jQuery('#page-top').fadeOut('slow');
		}
	});

	//ボタン(id:move-page-top)のクリックイベント
	jQuery('#move-page-top').click(function(){
		jQuery('html,body').animate({scrollTop:0},'fast');  //ページトップへ移動する
	});
});
</script>
</body>
</html>
