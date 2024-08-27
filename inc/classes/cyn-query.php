<?php


if (!class_exists('cyn_query')) {
    class cyn_query
    {

        function __construct()
        {
            add_action('pre_get_posts', [$this, 'customize_search_query']);
        }

        public function customize_search_query($query)
        {

            if (!$query->is_search() || !$query->is_main_query()) {
                return;
            }

            $query->set('post_type', 'product');
        }

    }
}