<?php get_header(); ?>
<div class="single-page">
	<div class="main-container">
		<h1>Single Post Page</h1>
		<hr>
		<?php 
			global $post; 
			global $wpdb;

			$postslug = $post->post_name;
			$postid = $post->ID;

			$postcontent = $wpdb->get_row("SELECT post_title, post_content FROM $wpdb->posts WHERE post_name = '$postslug' ");
		?>
		<div class="post">
			<div class="title"><h2><?php echo $postcontent->post_title ?></h2></div>
			<div class="content"><?php echo $postcontent->post_content ?></div>
		</div>
		<hr>
		<?php   
			$postTags = get_the_tags();

			foreach ($postTags as $postTag):
				echo $postTag->name;
			endforeach;

		?>

			<hr>
<?
			$query_byTag="
		        SELECT wp_posts.post_title
		        FROM wp_posts, wp_term_relationships, wp_terms
		        WHERE wp_posts.ID = wp_term_relationships.object_id
		        AND wp_terms.term_id = wp_term_relationships.term_taxonomy_id
		        AND wp_terms.name LIKE 'tag2%'";
		    $search_songs = $wpdb->get_results($query_byTag);
		    print_r($search_songs);	

		?>
		<div class="related_posts">
			
		</div>
	</div>	
</div>
<?php get_footer(); ?>

<!-- 
	- wp_posts
	- wp_terms
	- wp_

 -->