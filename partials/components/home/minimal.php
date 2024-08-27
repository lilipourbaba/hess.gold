<?Php
$minimal_title_1 = get_field('minimal_title_1');
$minimal_title_2 = get_field('minimal_title_2');
$minimal_text_1 = get_field('minimal_text_1');
$minimal_text_2 = get_field('minimal_text_1');
?>
<div class=" minimal">
    <div class=" d-flex d-md-block fade-in-down" anim-delay="0.3">
        <?= wp_get_attachment_image(get_field('minimal_img_1'), 'full'); ?>
        <div class="d-flex  jc-center f-column gap-24 p-72 p-md-16">
            <p class="fs-h1 fs-md-h2">
                <?= $minimal_title_1;
                ?>
            </p>
            <p class=""> <?= $minimal_text_1; ?> </p>
                <a href="<?= get_field('minimal_link_1') ?>" class="see-all">مشاهده محصولات </a>
        </div>
    </div>
    <div class=" d-flex f-row-reverse d-md-block fade-in-down" anim-delay="0.3">
        <?= wp_get_attachment_image(get_field('minimal_img_2'), 'full'); ?>
        <div class="d-flex  jc-center f-column gap-24 p-72 p-md-16">
            <p class="fs-h1 fs-md-h2">
                <?= $minimal_title_2;
                ?>
            </p>
            <p class=""> <?= $minimal_text_2; ?> </p>

                <a href="<?= get_field('minimal_link_2') ?>" class="see-all">مشاهده محصولات  </a>

        </div>
    </div>
</div>