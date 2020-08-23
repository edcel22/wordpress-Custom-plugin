<?php get_header(); ?>
<div class="main-container">
	<div id="front-page" class="wrapper">
		<?php	
			query_posts(array('post_type' => 'post'));
			while (have_posts()): the_post();
		?>
		<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a><br>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>

<!-- 
	- display single post
	- display the tags of the post
	- display all posts with the same tag


 -->