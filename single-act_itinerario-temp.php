<?php get_header();
/**
 * The Template for displaying all single posts
 *
 <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="main-post-div">
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
	   						 <li><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a> - km: <?php echo the_field('km', $p->ID); ?></li>
						<?php endforeach; ?>
						</ul>
						<p>totale km: <?php echo $tot; ?></p>
				<?php endif; ?>
                </div>
                <hr />

            <?php endwhile; 
			get_sidebar();
            get_footer();
?>
            
