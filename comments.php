<?php
comment_form(
    array(
        'comment_field' => '<div class=" input-box d-flex gap-8  ">
      <button class="btn iconsax" type="button" icon-name="message-text"></button>
      <textarea id="comment" name="comment" class="w-100" variant="search" rows="1" maxlength="65525" placeholder="دیدگاه شما *" required></textarea>
    </div>',
        'fields' => [
            'author' => '<div class=" input-box d-flex gap-8">
        <button class="btn iconsax" type="button" icon-name="user-1"></button>
        <input id="author" name="author" class="w-100" variant="search" aria-required="true" placeholder="نام شما *" required />
      </div>',
            'email' => '<div class="input-box d-flex gap-8">
        <button class="btn iconsax" type="button" icon-name="mail"></button>
        <input id="email" name="email" class="w-100" variant="search" placeholder="ایمیل شما *" required />
    </div>',
            'cookies' => ""
        ],
        'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="btn w-md-100" variant="primary" value="ارسال دیدگاه" />',
        'comment_notes_before' => "",
        'comment_notes_after' => "",
        'logged_in_as' => null,
        'title_reply' => "شماهم توی این بحث شرکت کنید",
        'title_reply_before' => '<p id="reply-title" class="comment-reply-title h4">',
        'title_reply_after' => '</p> <div class="clearfix s-3"></div>',
        'title_reply_to' => "ارسال پاسخ به %s",
        'label_submit' => "ارسال دیدگاه",
        'submit_field' => '<div class="form-submit m-24 btn-secondary d-flex jc-end">
            <svg class="icon send-icon">
                <use href="#icon-Send" />
            </svg>
            %1$s %2$s</div>',
    )
);

if (have_comments()):
    ?>
    <div class="comment-list" id="comment-list">
        <?php
        $list = wp_list_comments(
            array(
                // 'walker' => null,
                'max_depth' => '',
                'style' => 'div',
                'callback' => null,
                'end-callback' => null,
                'type' => 'all',
                'page' => '',
                'per_page' => '',
                'avatar_size' => 32,
                'reverse_top_level' => null,
                'reverse_children' => '',
                'format' => current_theme_supports('html5', 'comment-list') ? 'html5' : 'xhtml',
                'short_ping' => true,
                'echo' => true,

            )
        );
        ?>
    </div>

    <?php
else:
    ?>
    <div class="comment-list">
        <p style="margin-top: 1rem;"><?php "there-are-no-comments" ?></p>
    </div>
    <?php
endif;
?>