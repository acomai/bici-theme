<?php get_header(); ?>


Prova front-page
<p><a href="/testingsw/nodi">Nodi</a> - <a href="/testingsw/nodi/vercelli">Vercelli</a></p>
<p><a href="/testingsw/percorsi/">Percorsi</a></p>
<p><a href="/testingsw/itinerari/">Itinerari</a></p>
<hr />

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Display the Title as a link to the Post's permalink. -->

 	<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


 	<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->

 	<small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>


 	<!-- Display the Post's content in a div box. -->
		<?php if( is_singular() ) : ?>
			<?php the_content() ?>
		<?php else : ?>
			<?php the_excerpt() ?>
		<?php endif ?>



 	<!-- Display a comma separated list of the Post's Categories. -->

 	<p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
	<Hr />

 	</div> <!-- closes the first div box -->


 	<!-- Stop The Loop (but note the "else:" - see next line). -->

 <?php endwhile; else : ?>


 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>


 	<!-- REALLY stop The Loop. -->
 <?php endif; ?>

<?php get_footer(); ?>