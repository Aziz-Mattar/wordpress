<?php
if (have_comments()) {
?>
<hr class="invis1">

<div class="custombox clearfix">
    <h4 class="small-title">
    <?php printf(
        _n('%s Comment', '%s Comments', get_comments_number(), 'wpc'),
        number_format_i18n(get_comments_number())
    ); ?>
    </h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
            <?php
            wp_list_comments([
                'avatar_size' => 80,
                'style' => 'div',
                'callback' => 'wpc_comment_callback',
                'max_depth' => 3,
            ]);
            ?>
            </div>
        </div>
    </div>
</div>
<?php
}


echo '<hr class="invis1">';

comment_form([
    'class_container' => 'custombox clearfix',
    'title_reply_before' => '<h4 class="small-title">',
    'title_reply_after' => '</h4>',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'class_submit' => 'btn btn-primary',
    'fields' => [
        'author' => '<input name="author" type="text" class="form-control" placeholder="'.esc_attr(__('Your name', 'wpc')).'">',
        'email' => '<input name="email" type="text" class="form-control" placeholder="'.esc_attr(__('Email address', 'wpc')).'">',
        'url' => '<input name="url" type="text" class="form-control" placeholder="'.esc_attr(__('Website', 'wpc')).'">',
        'cookies' => '',
    ],
    'comment_field' => '<textarea name="comment" class="form-control" placeholder="'.esc_attr(__('Your comment', 'wpc')).'"></textarea>',
    'class_form' => 'form-wrapper',
]);