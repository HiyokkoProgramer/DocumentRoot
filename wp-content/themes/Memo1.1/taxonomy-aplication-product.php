<?php get_header();?>


<!--ここからメインコンテンツ-->
<div id="wrapper">
    <div id="mein">
        <h1><?php single_cat_title(); ?></h1>

        <div class = "category_description">
            <div id ="Breadcrumb">
                <a href="/index.php"><span class ="home">   </span></a>
                /<?php single_cat_title(); ?><br>
            </div>
            <?php echo term_description();?>
        </div>

        <div class = "recipe_box">

            <?php if (have_posts()) :
                    while (have_posts()) : the_post(); ?>

                    <div class="recipe_block">
                        <h4><a href="<?php the_permalink();?>"><?php the_title();?></h4>

                        <div class="recipe_thumbnail">
                            <?php if(has_post_thumbnail()) { echo get_the_post_thumbnail(); } ?>
                        </div>

                        <div class="recipe_snippet">
                            <?php the_excerpt();?>
                            <span class="read-continue">このレシピを見る ≫</a></span>
                            <p class="recipe_info">
                                <span class="post_date"><?php the_time('Y/m/j');?></span>
                            </p>
                        </div>
                    </div><!--recipe_block-->

            <?php endwhile;?>
        </div><!--recipe_box-->


        <?php else:?>
            <p>まだ1個も作っておりません。m(_ _)m</p>
        <?php endif?>

            <!--ここからページャー-->
<!--            <div class="nav_below">-->
<!--                <span class="leftnav">--><?php //previous_posts_link('prav-page');?><!--</span>-->
<!--                <span class="rightnav">--><?php //next_posts_link('next-page');?><!--</span>-->
<!--            </div><!--/nav_below-->
        

        <?php get_footer();?>
