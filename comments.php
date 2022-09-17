<?php

wp_list_comments();

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