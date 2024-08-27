<?php get_header() /* Template name: about */ ?>
<?php
 $gallery = get_field('gallery_pic1');
?>
<main class="m-be-120">
      <div class="d-flex hero jc-around ">
         <div class="d-flex f-column gap-12 jc-center">
            <h1 class="fs-title fs-lg-h1"><?= get_field("about_title"); ?></h1>
            <p class="pi-40 fs-h1  fs-lg-h2">جواهری <span class="text-secondary">حس </span> را بهتر بشناسید</p>
    
        </div>
                    <?php echo get_the_post_thumbnail(); ?>

    </div>
    
    <section class="container about-content gap-12 m-bs-24 d-lg-block p-lg-20">
        <?= the_content(); ?>
    </section>
    <?= cyn_get_component('gallery'); ?>

</main>
<?php get_footer() ?>