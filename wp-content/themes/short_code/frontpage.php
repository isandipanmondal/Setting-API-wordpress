
<?php 
  
/* 

  Template Name: Home 

*/
  get_header( $name = null ); 

?>

<?php while(have_posts()) : the_post();?>

  <?php the_content( $more_link_text = null, $strip_teaser = false ) ?>

<?php endwhile; ?>


<?php get_footer( $name = null ); ?>