<?php
get_header();

/**
 * ===================================================================
 * ADIM 1: ACF ALAN ADINI BURAYA GİRİN
 * ===================================================================
 * 'kapak_resmi' yazan yeri ACF'de belirlediğiniz kendi alan adınızla
 * (field name) değiştirin. Bu en önemli adımdır.
 */
$field_name_from_acf = 'kapak_resmi'; // <-- SADECE BURAYI DEĞİŞTİRİN
// ===================================================================

$category_image_url = get_field($field_name_from_acf, 'category_' . get_queried_object_id());

// Sidebar'ın olup olmadığını kontrol edip sayfa genişliğini ayarlıyoruz.
if (is_active_sidebar('sidebar-1')) :
    $main_column_class = 'col-xl-8';
else :
    $main_column_class = 'col-xl-12';
endif;
?>

<?php if ($category_image_url) : ?>
    
    <div class="category-cover-image" style="background-image: url('<?php echo esc_url($category_image_url); ?>'); height: 450px; background-size: cover; background-position: center;">
         </div>

<?php else : ?>

    <div class="category-no-cover" style="height: 50px;">
        </div>

<?php endif; ?>


<section class="blog-page-two" style="padding-top: 60px;">
    <div class="container">
        <div class="row text-right-rtl">
            
            <div class="<?php echo esc_attr($main_column_class); ?>">
                <div class="blog2-content-box blog-post-list-me">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/blog-layout/blog-standard-content');
                        endwhile;
                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>
                    <?php if (get_the_posts_pagination()) : ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <?php
                                the_posts_pagination(array(
                                    'mid_size' => 2,
                                    'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
                                    'next_text' => '<i class="fa fa-long-arrow-right"></i>',
                                ));
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php 
            // 3. İSTEK: Sidebar (Kenar Çubuğu) geri eklendi.
            // Eğer sidebar'ı göstermek istemiyorsanız, aşağıdaki if bloğunu silebilir
            // ve üstteki ana içerik alanının class'ını 'col-xl-12' olarak değiştirebilirsiniz.
            if (is_active_sidebar('sidebar-1')) { ?>
                <div class="col-xl-4">
                    <div class="sidebar-content-box">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>