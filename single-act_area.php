<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
	
	.flex-container {
	    display: -webkit-flex;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
	}
	
	.percorsi, .centri, .img-block, {
		padding: 30px 0px 0px 20px;
		display: flex;
  		justify-content: space-between;
	}
	
	.end-box{
  		height: 40px;
  		width: 120px;
  		align-self: flex-end;
  		border-bottom: 2px solid #dd3333;
  		border-right: 2px solid #dd3333;
	}

	
	
	.img-block, .centri, .percorsi {
  		flex: 0 1 50%;
	}
	
	.img{
  		width: 400px;
  		height: 300px;
	}
	
	.img-foto{
  		width: 400px;
  		height: 300px;
  		float: left;
  		margin-right: 1em;
	}
	
	.percorsi, .mappa, .meteo, .desc, .wrap-text-image {
  		/* background-color: lightyellow; */
	}
	
	.dati-base, .wrap-text-image, .strutture {
  		 background-color: #f3f3f3; 
	}
	
	.title {
		color: #dd3333;
	}
	
	/* @media all and (max-device-width: 480px) and (orientation: portrait) {
    
	    .flex-container {
		    display: -webkit-flex;
	    	display: flex;
	    	flex-direction: column;
	    	flex-wrap: wrap;
	    	align-content: center;
		}
		
		.dati-base, .strutture, .wrap-text-image {
		flex: 1 1 100%;
	}
	
	.desc, .servizi, .img-block, .eventi, .servizi, .arrivare, .percorsi {
  		flex: 0 1 100%;
	}
		*/
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
                <h1 class="title"><?php the_title(); ?></h1>
                </div>
                <div class="flex-container">
		                
	                
	                <!-- Link ai percorsi dell'area -->
					<div class="percorsi">
						<div>
							<h3><i class="fa fa-map-signs"></i> Percorsi di <?php the_title(); ?></h3>
							<?php 
								$posts = get_field('area_percorsi');
								if( $posts ): ?>
									<ul>
									<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
				   						 <li>
					   						 <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
					   						  - km: <?php echo the_field('km', $p->ID); ?> - 
					   						  <?php  echo the_field('tipo_percorso', $p->ID); ?>
				   						 </li>
									<?php endforeach; ?>
									</ul>
							<?php endif; ?>
						</div>
						
						<div class="end-box"></div>
						
	                </div>
	                
	                <div class="centri">
						<div>
							<h3><i class="fa fa-map"></i> Centri</h3>
							<?php 
								$posts = get_field('area_centri');
								if( $posts ): ?>
									<ul>
									<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
				   						 <li><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></li>
									<?php endforeach; ?>
									</ul>
							<?php endif; ?>
						</div>
						
						<div class="end-box"></div>
						
					</div>
					
					<div class="vuoto">
						<p>  </p>
					</div>
	                
                	<div class="wrap-text-image">
						<div class="content-here desc">
		                	<?php  the_content();  ?>
						</div>
						<div class="end-box"></div>
					</div>
			
	                
	                <div class="img-block mappa">
						<div class="img" >
							<?php the_field('mappa'); ?>
						</div>
						<!--   <div class="end-box"></div> -->
					</div>
					
	                

                
			</div>
            <?php endwhile; 
            get_sidebar();
            get_footer();
?>
            
