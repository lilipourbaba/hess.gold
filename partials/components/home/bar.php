<div class="full-width fade-in-down" anim-delay="0.3">
    <?php
    $hero = get_field('home_hero');
     if (isset($hero)) {
        echo wp_get_attachment_image($hero, 'full home-hero full-width d-md-none');
    }
    $mobile_hero = get_field('home_hero_mobile');
    if (isset($mobile_hero)) {
        echo wp_get_attachment_image($mobile_hero, 'full home-hero full-width d-none  d-md-block');
    }
    
    if (get_field("attr_1")):
        ?>
      
        <marquee behavior="alternate" direction="left" class="bg-primary text-natural-100 full-width bar" scrollamount="2" bgcolor="lightgray">  
            <ul class="d-flex gap-40 ai-center">
                <?
                for ($i = 1; $i < 15; $i++){
                    ?>
                    <li class="d-flex gap-40 ai-center">
                        <?= (get_field("attr_$i")) ? get_field("attr_$i") . "<span class='fs-h1 d-flex ai-center p-be-8 '> . </span>" : ''; ?>
                    </li>
                <? } ?>
            </ul>
         </marquee>
    <?php endif; ?>
</div>
