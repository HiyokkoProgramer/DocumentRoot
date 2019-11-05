<?php
/*Template Name: top用固定ページ*/
?>

<?php get_header();?>

<!--ここからメインコンテンツ-->
<div id="wrapper">
	<div id="mein">
		<div id="page">
			<?php
			$args1 = array(
  		'post_type' => 'development_and_tool', /* カスタム投稿名が「development_and_tool」の場合 */
  		'posts_per_page' => 3, /* 表示する数 */
			);

			$args2 = array(
  		'post_type' => 'market_analysis', /* カスタム投稿名が「market_analysis」の場合 */
  		'posts_per_page' => 3, /* 表示する数 */
			);

			$args3 = array(
  		'post_type' => 'web_and_aplication', /* カスタム投稿名が「web_and_aplication」の場合 */
  		'posts_per_page' => 3, /* 表示する数 */
			);

			$args5 = array(
  		'post_type' => 'infrastructure', /* カスタム投稿名が「infrastructure」の場合 */
  		'posts_per_page' => 3, /* 表示する数 */
			);
			?>

			<?php $my_query1 = new WP_Query( $args1 ); ?>
			<?php $my_query2 = new WP_Query( $args2 ); ?>
			<?php $my_query3 = new WP_Query( $args3 ); ?>
			<?php $my_query5 = new WP_Query( $args5 ); ?>

			 <div id = "top1">
                <h2>開発について</h2>
                <div id  ="top1_img">
			<img src ="data:image/jpg;base64,<?php echo base64_encode(file_get_contents('/home/www/wp/wordpress/wp-content/themes/Memo1.1/images/tool.png'));?>">
		</div>
                 <ul class ="top">
				<?php while ( $my_query1->have_posts() ) : $my_query1->the_post(); ?>
					<!-- ▽ ループ開始 ▽ -->
  				    <li class ="title">
    				    	<h4 class='magenta'>
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
					</h4>
  				    </li>
					<!-- △ ループ終了 △ -->
					<?php endwhile; ?>
			    </ul>
			    <?php wp_reset_postdata(); ?>
             </div><!--top1-->

		    <div id = "top2">
			    <h2>マーケティング</h2>
                <div id ="top2_img"></div>
                <ul class ="top">
				<?php while ( $my_query2->have_posts() ) : $my_query2->the_post(); ?>
					<!-- ▽ ループ開始 ▽ -->
					<li class ="title">
					<h4 class='remonyellow'>
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
					</h4>
					</li>
					<!-- △ ループ終了 △ -->
				<?php endwhile; ?>
			    </ul>
			    <?php wp_reset_postdata(); ?>
		    </div><!--top2-->

			<div id = "top3">
				<h2>アプリケーション</h2>
                <div id ="top3_img"></div>
			    <ul class ="top">
				<?php while ( $my_query3->have_posts() ) : $my_query3->the_post(); ?>
					<!-- ▽ ループ開始 ▽ -->
					<li class ="title">
						<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
					</li>
					<!-- △ ループ終了 △ -->
				<?php endwhile; ?>
			    </ul>
			    <?php wp_reset_postdata(); ?>
		    </div><!--top3-->


		    <div id = "top5">
			    <h2>インフラ</h2>
                <div id ="top5_img"></div>
                <ul class ="top">
				<?php while ( $my_query5->have_posts() ) : $my_query5->the_post(); ?>
					<!-- ▽ ループ開始 ▽ -->
					<li class ="title">
						<h4 class='rightblue'><a href="<?php the_permalink();?>"><?php the_title();?></h4>
					</li>
					<!-- △ ループ終了 △ -->
				<?php endwhile; ?>
			    </ul>
			    <?php wp_reset_postdata(); ?>
		    </div><!--top5-->

		</div><!--page-->
<?php get_footer();?>
