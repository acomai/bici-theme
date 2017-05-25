
<style>

	.italic{
  		font-style: italic;
  		text-decoration: underline;
  		font-size: 1.5em;
	}

	img {
		float:left;
		margin: 5px;
	}
	
	.clearfix::after {
	    content: "";
	    clear: both;
	    display: table;    
	}

</style>

<?php get_header(); ?>
<div class="col-md-10">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Display the Title as a link to the Post's permalink. 

 	<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

-->
 	<!-- Display the Post's content in a div box. -->
		<?php if( is_singular() ) : ?>
		<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			<?php the_content() ?>
		<?php else : ?>
			<div class="clearfix">
			<span class="italic"><a href="<?php the_permalink(); ?>"
			 rel="bookmark" title="Permanent Link to <?php the_title_attribute();
			 ?>"><?php the_title(); ?></a></span>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			<?php the_excerpt() ?>
			</div>
	
		<?php endif ?>

 

 	<!-- Display a comma separated list of the Post's Categories. 

 	<p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
 	-->
	<Hr />




 	<!-- Stop The Loop (but note the "else:" - see next line). -->

 <?php endwhile; else : ?>


 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>


 	<!-- REALLY stop The Loop. -->
 <?php endif; ?>
</div>
<?php  

get_sidebar(); 
get_footer(); ?>