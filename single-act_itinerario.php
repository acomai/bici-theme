<?php
/**
 * The template for displaying all single posts (custom act_itinerario).
 *
 * @package Sydney
 */

get_header(); ?>


	<div id="primary" class="content-area col-md-9">
		<main id="main" class="post-wrap" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="single-page-post-heading">
                <h1><?php the_title(); ?></h1>
                </div>               
                <hr />
                <div class="content-here">
                <?php  the_content();  ?>
            </div>
            <hr />

			<div class="percorsi">
				<h3>Percorsi di <?php the_title(); ?></h3>
				<?php 
					$posts = get_field('percorsi_itinerario');
					$tot = 0;
					if( $posts ): ?>
						<ul>
						<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) 
						
						// totalizzazione km dei percorsi compresi nell'itinerario
						$tot = $tot + get_field('km', $p->ID);
					?>
	   						 <li>
		   						 <?php 
						   						  // visualizza icone appropriate al tipo_percorso
						   						  $tipo = get_field('tipo_percorso', $p->ID);
						   						  if ( $tipo == 'bici' ) {
						   						  	echo '<i class="fa fa-bicycle fa-2x"></i>';
						   						  } else {
						   						  	echo '<i class="fa fa-blind fa-2x"></i>';
						   						  }
					   						  ?>
		   						 <a href="<?php echo get_permalink( $p->ID ); ?>">
		   						 <?php echo get_the_title( $p->ID ); ?></a> 
		   						 - km: <?php echo the_field('km', $p->ID); ?> -
		   						 <?php  echo the_field('difficolta', $p->ID); ?>
	   						 </li>
						<?php endforeach; ?>
						</ul>
						<p>totale km: <?php echo $tot; ?></p>
				<?php endif; ?>
            </div>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
	get_sidebar();
?>
<?php get_footer(); ?>
