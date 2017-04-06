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
                <div class="content-here">
                <?php  the_content();  ?>
				<p>altitudine: <?php the_field('altitudine'); ?> metri s.l.m.</p>
				<p>provincia: <?php the_field('provincia'); ?></p>
				<p>
				<?php 

				$image = get_field('mappa');
				$width = 400;
				$height = 400;
				
				
				if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

				<?php endif; ?>
				</p>
				<p>previsioni meteo: </p>
				<p>Wikipedia: </p>
				<p>Centro servizi: </p>
                </div>
		
				<div class="percorsi">
				<h3>Percorsi di <?php the_title(); ?></h3>
				<?php 
					$posts = get_field('nodo_percorsi');
					if( $posts ): ?>
						<ul>
						<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
	   						 <li><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></li>
						<?php endforeach; ?>
						</ul>
				<?php endif; ?>
                </div>
                <hr />
                <div class="strutture">
				<h3>Strutture turistico-alberghiere di <?php the_title(); ?></h3>
				</div>
				<hr />
                <div class="eventi">
				<h3>Prossimi eventi a <?php the_title(); ?></h3>
				</div>

            <?php endwhile; 
            get_footer();
?>
            
