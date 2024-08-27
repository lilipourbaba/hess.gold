<?php
if(get_field('gallery_pic1') || get_field('gallery_pic2')): ?>
<section class="m-bs-44  container text-primary">
    <h2>گالری تصاویر </h2>
    <div class="swiper full-width w-100 gallery m-bs-16 ">
        <div class="swiper-wrapper gap-8">
            <div class="swiper-slide">
                <?= wp_get_attachment_image(get_field('gallery_pic1'), 'full w-100'); ?>
            </div>
            <div class="swiper-slide">
                <?= wp_get_attachment_image(get_field('gallery_pic2'), 'full w-100'); ?>
            </div>
            <div class=" swiper-slide">
                <?= wp_get_attachment_image(get_field('gallery_pic3'), 'full w-100'); ?>
            </div>
            <div class="swiper-slide">
                <?= wp_get_attachment_image(get_field('gallery_pic4'), 'full w-100'); ?>
            </div>
            <div class="swiper-slide">
                <?= wp_get_attachment_image(get_field('gallery_pic5'), 'full w-100'); ?>
            </div>
            <div class="swiper-slide">
                <?= wp_get_attachment_image(get_field('gallery_pic6'), 'full w-100'); ?>
            </div>
        </div>
        <div class="swiper-button-nexty"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<?php endif; ?>