<?php get_header('');?>

<!--ここからメインコンテンツ-->
<div id="wrapper">
	<div id="mein">
		<h1><?php echo get_queried_object()->name; ?>に関する記事一覧</h1>
        <div class = "category_description">
            <div id ="Breadcrumb">
                <?php if(function_exists("the_breadcrumb")){the_breadcrumb();} ?>
            </div>
            <?php echo tag_description();?>
        </div>

		<div id="contents">
			 <?php
             $tag_id =get_queried_object_id();
             $args = [
                    'tag_id' => $tag_id,
                    'offset'           => 0,
                    'order'            => 'DESC',
                    'post_type'        => 'any',
                    'post_status' => 'publish',
                    'posts_per_page' => -1
             ];

            $my_posts = get_posts( $args );
            foreach ( $my_posts as $post ):
                setup_postdata( $post );?>
                    <div class="post">
                        <h5><a href="<?php the_permalink();?>"><?php the_title();?></h5>

                        <div class="thumbnail">
                            <?php if(has_post_thumbnail()) { echo get_the_post_thumbnail(); } ?>
                        </div>

                        <div class="snippet"><?php the_excerpt();?>
                            <span class="read-continue">続きを読む ≫</a></span>
                        </div>
                        <p class="blog_info">
                            <span class="post_date"><?php the_time('Y/m/j');?></span>
                            <span class="tags"><?php the_tags('Tag :',',');?></span>
                        </p>
                    </div><!--post-->
            <?php endforeach;
             wp_reset_postdata(); ?>

			<!--ここからページャー-->
			<div class="nav_below">
				<span class="leftnav"><?php previous_posts_link('prav-page');?></span>
				<span class="rightnav"><?php next_posts_link('next-page');?></span>
			</div><!--/nav_below-->

		</div><!--/contents-->

<?php get_sidebar();?>

<?php get_footer();?>
