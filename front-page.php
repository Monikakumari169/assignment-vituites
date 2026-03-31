<?php
/*
Template Name: Front Page
*/

if (!defined('ABSPATH')) exit;
get_header();

?>
<!-- HERO SECTION -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content text-center">

    <?php 

    $hero_content = get_field('hero_content', get_the_ID());
    $contact_us_button = get_field('contact_us_button', get_the_ID());

    
    ?>
      
      <h1>
        <span class="bold">LOREM</span><span class="cstm-light-text"> IPSUM DOLOR</span>
      </h1>

      <?php if(!empty($hero_content)){ ?>

        <p>
            <?php echo  $hero_content; ?>
        </p>

    <?php } ?>

      <a href="#" class="btn hero-btn"><?php echo $contact_us_button; ?></a>

    </div>
  </div>
</section>

<section class="info-section">
  <div class="container">
    <div class="row align-items-center">

      <!-- LEFT CONTENT -->
      <div class="col-lg-7">
        <h2><span class="bold">LOREM</span><span class="cstm-light-text1"> IPSUM DOLOR SIT AMET</span></h2>

        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ea commodo consequat.
        </p>

        <p>
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
      </div>

      <!-- RIGHT ICON BOXES -->
      <div class="col-lg-5">
        <div class="row text-center icon-wrapper">

          <div class="col-6 icon-box">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Machine-test-cropset/team1.png" alt="Our Meet">
            <h6>MEET OUR<br> TEAM</h6>
          </div>

          <div class="col-6 icon-box">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Machine-test-cropset/building.png" alt="Our Project">
            <h6>SEE OUR<br> PROJECTS</h6>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<section class="testimonial-section">

  <!-- TOP TITLE BAR -->
  <div class="testimonial-header text-center">
    <?php
    $testimonials_text_heading = get_field('testimonials_text_heading', get_the_ID()) ? get_field('testimonials_text_heading', get_the_ID()): "TESTIMONIALS";
    ?>
    <h2><?php echo  $testimonials_text_heading; ?></h2>
  </div>

  <!-- SLIDER -->
 <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner text-center">

        <?php 
        $count = 0;

        if( have_rows('testimonials_repeater', get_the_ID()) ): 

            while( have_rows('testimonials_repeater', get_the_ID()) ): 
                the_row(); 
                
                $testimonials_heading = get_sub_field('testimonials_heading');
                $testimonials__content = get_sub_field('testimonials__content');
                $author_image = get_sub_field('author_image');
                $author_title = get_sub_field('author_title');

                // ✅ First item active
                $class = ($count == 0) ? 'active' : '';
        ?>

        <div class="carousel-item <?php echo $class; ?>">
            <div class="testimonial-content container">

                <h5><?php echo esc_html($testimonials_heading); ?></h5>

                <p><?php echo esc_html($testimonials__content); ?></p>

                <div class="author">
                    <img src="<?php echo esc_url($author_image); ?>" alt="Author">
                    <span>by <?php echo esc_html($author_title); ?></span>
                </div>

            </div>
        </div>

        <?php 
            $count++; 
            endwhile;
        endif; 
        ?>

    </div>

    <!-- ARROWS -->
    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="arrow">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Machine-test-cropset/Arrow 1 copy.png" alt="prev">
        </span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="arrow">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Machine-test-cropset/Arrow 1.png" alt="next">
        </span>
    </button>

</div>

</section>

<?php
get_footer(); ?>
