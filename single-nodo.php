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
				<p>download: <?php 
				$file = get_field('mappa');
				if( $file ): ?>
					<a href="<?php the_field('mappa'); ?>" >Mappa</a>
				<?php endif;?></p>
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

            <?php endwhile; 
            get_footer();
?>
            
