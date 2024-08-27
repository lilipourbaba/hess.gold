<?php
$query = $args['query'] ?? [];
$title = $args['title'] !== '' ? $args['title'] : 'محصولات';

?>

<?php if ($query): ?>
    <section class="">
        <div class="d-flex jc-between ai-center">
            <h2>
                <?= $title ?>
            </h2>
            <a href="#" class="see-all | d-md-none p-12">
                مشاهده همه
            </a>
        </div>
        <div class="box-col-4 box-col-md-2 gap-8 m-be-120">
            <?php
            if (count($query) > 0) {
                foreach ($query as $i => $product_id) {
                    // wc_get_template_part('content-product', ['post_id' => $product_id]);

                    cyn_get_card('product', ['post_id' => $product_id, "product_anim_delay" => $i]);
                }
            } else {
                echo 'هیج محصولی وارد نشده است!';
            }

            ?>
        </div>
        <a href="<?= get_home_url() . '/shop'; ?>" class=" d-md-block d-none text-center see-all p-12 fs-h5">
            مشاهده همه
        </a>
    </section>
<?php endif; ?>