<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package k2osystem
 */

get_header();
?>

	<main id="primary" class="site-main col-md-8">

		<?php
		while ( have_posts() ) :
			the_post();
        ?>
            <h1>商品詳細</h1>
            <p><?php the_taxonomies() ?></p>
            <?php $items = get_the_terms(get_the_ID(), 'genre'); ?>
            <?php if ($terms): ?>
            <ul>
                <?php foreach ($terms as $term): ?>
                    <li><a href="<?php echo get_term_link($item); ?>"><?php echo esc_html($term->name); ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        <?php
			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'k2osystem' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'k2osystem' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
