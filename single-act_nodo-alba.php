<style>

	.dati-base{
  		font-size: 1.15em;
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

<?php get_header();

/**
 * The Template for displaying all single posts
 *
 <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="content-area col-md-10">
                 <!--  -->
                <div class="single-page-post-heading">
                <h1><?php the_title(); ?> - pagina esclusiva per Alba - css float</h1>
                </div>
                <div class="clearfix">
                <?php
                	// mostra immagine rappresentativa del nodo, se esiste
                	if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					} 
					
				?>
				<span class="dati-base">Provincia: <strong><?php the_field('provincia'); ?></strong> - 
                Altitudine: <strong><?php the_field('altitudine'); ?></strong> metri s.l.m. 
                - Abitanti: <strong><?php the_field('abitanti'); ?></strong> - 
                <a href="<?php echo get_field('centro_servizi'); ?>">Centro servizi</a></span>
                <hr />
                <div class="content-here">
                <?php  the_content();  ?>
				</div>

				</div>
				<hr />
				<div class="logistica col-md-6" >
				<?php the_field('mappa_nodo'); ?>
				</div>
				<div class="logistica2 col-md-4" >
				<p>del testo</p>
				</div>
                
                <hr />
				
				<!-- Link ai percorsi del nodo -->
				<div class="percorsi col-md-10">
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
                
                <!-- Link ai servizi acquistabili come 'product' tramite Woocommerce -->				
                <div class="servizi">
				<h3>Servizi a <?php the_title(); ?></h3>
				<?php 
					$posts = get_field('nodo_servizi');
					if( $posts ): ?>
						<ul>
						<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
	   						 <li><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a> <?php echo the_field('km', $p->ID); ?></li>
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
				<p><?php 
				// test per provare una limitazione di funzionalità in base al ruolo utente
				if( current_user_can('edit_posts') ) {
					// true if user can edit posts
					the_field('arrivare');
				}
				
				 ?></p>
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
            
