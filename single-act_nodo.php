<?php get_header();
get_sidebar();
/**
 * The Template for displaying all single posts
 *
 <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="main-post-div">
                <div class="single-page-post-heading">
                <h1><?php the_title(); ?></h1>
                </div>
                <p>provincia: <?php the_field('provincia'); ?> - 
                altitudine: <?php the_field('altitudine'); ?> metri s.l.m. - abitanti: <?php the_field('abitanti'); ?> - <a href="<?php echo get_field('centro_servizi'); ?>">Centro servizi</a></p>
                <!--  <p>Visita il <a href="<?php echo get_field('centro_servizi'); ?>">Centro servizi</a> di <?php echo get_the_title( $p->ID ); ?></p>-->
                
                <hr />
                <div class="content-here">
                <?php  the_content();  ?>
				
				<p> mappa città: 
				<?php 

				$image = get_field('mappa_nodo');
				$width = 300;
				$height = 300;
				
				
				if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

				<?php endif; ?>
				 mappa nell'area: 
				 				<?php 

				$image = get_field('mappa_nodo_in_area');
				$width = 300;
				$height = 300;
				
				
				if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

				<?php endif; ?>
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
				<p>Info su treni e bus: <?php the_field('arrivare'); ?></p>
                </div>
                <hr />
                <div class="strutture">
				<h3>Mangiare e dormire a <?php the_title(); ?></h3>
				<p>Link a TripAdvisor - Link a Albergabici - Link a Airbnb: <?php the_field('mangiare_dormire'); ?></p>
				</div>
				<hr />
                <div class="eventi">
				<h3>Prossimi eventi a <?php the_title(); ?></h3>
				</div>

            <?php endwhile; 
			
            get_footer();
?>
            
