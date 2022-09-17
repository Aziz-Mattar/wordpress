<?php 
get_header();
while (have_posts()) {
    the_post();
    $attachment_id = get_the_ID();
    $attachment_meta = wp_get_attachment_metadata($attachment_id);
?>
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-question"></i> <?php the_title(); ?></h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active"><?php the_title(); ?></li>
                </ol>
            </div>                    
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <!-- Title //-->
                    <div class="blog-title-area">
                        <h3><?php the_title(); ?></h3>
                        <?php get_template_part('partials/single-share', null, ['post_link' => get_permalink()]); ?>
                    </div>
                    <!-- Attachment Picture //-->
                    <div class="single-post-media">
                        <audio controls>
                            <source src="<?php echo wp_get_attachment_url($attachment_id) ?>" type="<?php echo $attachment_meta['mime_type']; ?>">
                        </audio>
                    </div>
                    <!-- Caption //-->
                    <?php
                    $attachment_caption = wp_get_attachment_caption($attachment_id);
                    if (!empty($attachment_caption)) {
                    ?>
                    <h4>What is this</h4>
                    <p><?php echo $attachment_caption; ?></p>
                    <?php } ?>
                    <!-- Description //-->
                    <?php if(!empty(get_the_content())) { ?>
                    <h4>About the file</h4>
                    <div class="blog-content"><?php the_content(); ?></div>
                    <?php } ?>
                    <!-- Meta //-->
                    <h4>File Meta Data</h4>
                    
                    <table class="table">
                        <?php
                        foreach ($attachment_meta as $key => $value) {
                            $value = ($key == 'filesize') ? size_format($value, 2) : $value;
                            echo '<tr>';
                            echo '<td>' . ucwords(str_replace('_', ' ', $key)) . '</td>';
                            echo '<td>' . $value . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
get_footer();
?>