<?php get_header();?>


<!--ここからメインコンテンツ-->
<div id="wrapper">
	<div id="mein">
		<h1><?php wp_title();?></h1>

        <div class = "category_description">
            <div id ="Breadcrumb">
                <?php if(function_exists("the_breadcrumb")){the_breadcrumb();} ?>
                /<?php wp_title();?>
            </div>
            作成日時：<?php the_time('Y/m/j');?>
            　タグ：<?php the_tags(' ',',');?>
        </div>

			 <?php if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<div id = "single">
						<?php the_content('');?>
					</div><!--single-->
				<?php endwhile;?>

			<?php else:?>
				<p>記事が見つかりませんでした</p>
			<?php endif?>
			<br>

        <div id="Relation_posts">
            <?php if(function_exists("relation_posts")){relation_posts();} ?>
        </div><!--/relation_posts-->

        <!--ここからページャー-->
        <div class="nav_below">
            <span class="leftnav"><?php previous_post_link('%link', '%title');?></span>
            <span class="rightnav"><?php next_post_link('%link', '%title');?></span>
        </div><!--/nav_below-->

        <div id="category_area">
            <h2>カテゴリー</h2>
            <?php dynamic_sidebar('widget-red');?>
            <?php dynamic_sidebar('widget-orange');?>
            <?php dynamic_sidebar('widget-brightyellow');?>
            <?php dynamic_sidebar('widget-remonyellow');?>
            <?php dynamic_sidebar('widget-olive');?>
            <?php dynamic_sidebar('widget-deepgreen');?>
            <?php dynamic_sidebar('widget-mintgreen');?>
            <?php dynamic_sidebar('widget-rightblue');?>
            <?php dynamic_sidebar('widget-blue');?>
    		<?php dynamic_sidebar('widget-parple');?>
            <?php dynamic_sidebar('widget-pink');?>
            <div id = "tags">
                <?php dynamic_sidebar('widget-magenta');?>
            </div>
        </div><!--/category_area-->



<?php get_footer();?>
