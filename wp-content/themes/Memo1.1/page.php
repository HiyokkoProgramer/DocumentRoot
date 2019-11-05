<?php get_header();?>


<!--ここからメインコンテンツ-->
<div id="wrapper">
	<div id="mein">
		<h1><?php the_title();?></h1>
        <div class = "category_description">
            <div id ="Breadcrumb">
                <a href="/index.php"><span class ="home">   </span></a>
                /<?php the_title(); ?><br>
            </div>

            <?php echo term_description();?>
        </div>
		<div id="page">

			<?php if (have_posts()) : 
				while (have_posts()) : the_post(); ?>

					<?php the_content();?>

				<?php endwhile;?>

			<?php else:?>
				<p>記事が見つかりませんでした</p>
			<?php endif?>

		</div>

<?php get_footer();?>
