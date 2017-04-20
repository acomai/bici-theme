<?php get_header();

/**
 * The Template for displaying all single posts
 *
 <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="content-area col-md-9">
                 <!--  -->
                <div class="single-page-post-heading">
                <h1><?php the_title(); ?></h1>
                </div>
                <p>provincia: <strong><?php the_field('provincia'); ?></strong> - 
                altitudine: <strong><?php the_field('altitudine'); ?></strong> metri s.l.m. - abitanti: <strong><?php the_field('abitanti'); ?></strong> - <a href="<?php echo get_field('centro_servizi'); ?>">Centro servizi</a></p>
                <!--  <p>Visita il <a href="<?php echo get_field('centro_servizi'); ?>">Centro servizi</a> di <?php echo get_the_title( $p->ID ); ?></p>-->
                
                <hr />
                <div class="content-here">
                <?php  the_content();  ?>
				
				<p>
				<?php the_field('mappa_nodo'); ?>
				</p>
                </div>
                <hr />
		
				<div class="percorsi">
				<h3>Percorsi di <?php the_title(); ?></h3>
				<?php 
					$posts = get_field('nodo_percorsi');
					if( $posts ): ?>
						<ul>
						<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
	   						 <li><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a> - km: <?php echo the_field('km', $p->ID); ?></li>
						<?php endforeach; ?>
						</ul>
				<?php endif; ?>
                </div>
                <hr />
                <div class="meteo">
				<p><?php the_field('meteo'); ?></p>
                </div>
                <hr />
                <div class="arrivare">
				<h3>Arrivare a <?php the_title(); ?></h3>
				<p><?php the_field('arrivare'); ?></p>
                </div>
                <hr />
                <div class="strutture">
				<h3>Mangiare e dormire a <?php the_title(); ?></h3>
				<p><?php the_field('mangiare_dormire'); ?></p>
				</div>
				<hr />
                <div class="eventi">
				<h3>Prossimi eventi a <?php the_title(); ?></h3>
				</div>
			</div>
            <?php endwhile; 
            get_sidebar();
            get_footer();
?>
            
