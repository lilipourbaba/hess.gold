<?php
if (get_field("FAQ_1")) : ?>
    <p class=" fs-h1 fs-md-h2 m-be-16" id="FAQ">سوالاتی که شاید براتون پیش بیاد </p>
    <div class="d-flex f-column faq gap-8 m-be-80 fs-md-h6">
        <?php
        for ($i = 0; $i < 6; $i++) :
            $FAQ = get_field("FAQ_$i");
            if ($FAQ && count(array_filter(get_field("FAQ_$i"))) > 0) : ?>
                <div anim-delay="<?php echo $i * 0.2 ?>">
                    <div class="tab p-16 bg-primary-100  fade-in-down">

                        <span class=" w-100 d-flex jc-between fs-md-h6">
                            <?= $FAQ['FAQ_ask']; ?> </span>
                        <div class="tab_content">
                            <div class="d-flex f-column gap-4">
                                <p><?= $FAQ['FAQ_answer']; ?></p>

                                <div class="customization-btn">
                                    <?php
                                    $faq_link = $FAQ['FAQ_link'];
                                    $faq_text = $FAQ['FAQ_text'];
                                    if ($faq_link and $faq_text) : ?>

                                        <a href="<?= $faq_link ?>" class="btn btn-secondary"><?= $faq_text ?></a>

                                    <?php endif ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        <?php endif;
        endfor; ?>
    </div>
<?php endif; ?>