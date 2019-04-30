<div class="card">
   <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php the_post_thumbnail(); ?>
      <div class="card-info-blog">
        <h3><?php the_title(); ?></h3>
      <?php the_excerpt(); ?>
      </div> 
     <div class="go-link">
     <a href="<?php echo get_permalink(); ?>">Lire la suite <i class="fas fa-long-arrow-alt-right"></i></a>   
     </div>  
   </article>
</div>


