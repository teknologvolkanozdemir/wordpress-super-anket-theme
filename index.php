<?php
/**
 * Main template.
 *
 * @package Super_Anket
 */

get_header();
?>
<main id="main-content" class="site-main">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1><?php single_post_title(); ?></h1>
		</header>
	<?php elseif ( is_search() ) : ?>
		<header class="page-header">
			<h1><?php
			printf(
				/* translators: %s: search query. */
				esc_html__( '“%s” için arama sonuçları', 'super-anket' ),
				esc_html( get_search_query() )
			);
			?></h1>
		</header>
	<?php elseif ( is_archive() ) : ?>
		<header class="page-header">
			<h1><?php the_archive_title(); ?></h1>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
		</header>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
				<header class="entry-header">
					<?php if ( is_singular() ) : ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php else : ?>
						<h2 class="entry-title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
						</h2>
					<?php endif; ?>
					<p class="entry-meta">
						<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					</p>
				</header>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large' ); ?>
				<?php endif; ?>
				<div class="<?php echo is_singular() ? 'entry-content' : 'entry-summary'; ?>">
					<?php
					if ( is_singular() ) {
						the_content();
						wp_link_pages();
					} else {
						the_excerpt();
					}
					?>
				</div>
			</article>
			<?php if ( is_singular() && comments_open() ) : ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		<?php endwhile; ?>

		<?php if ( ! is_singular() ) : ?>
			<nav class="pagination" aria-label="<?php esc_attr_e( 'Yazı sayfaları', 'super-anket' ); ?>">
				<?php
				the_posts_pagination( array(
					'mid_size'           => 1,
					'prev_text'          => esc_html__( 'Önceki', 'super-anket' ),
					'next_text'          => esc_html__( 'Sonraki', 'super-anket' ),
					'screen_reader_text' => esc_html__( 'Yazı sayfaları', 'super-anket' ),
				) );
				?>
			</nav>
		<?php endif; ?>
	<?php else : ?>
		<section class="no-results">
			<h1><?php esc_html_e( 'İçerik bulunamadı', 'super-anket' ); ?></h1>
			<p><?php esc_html_e( 'Aradığınız içerik mevcut değil. Farklı bir arama yapabilirsiniz.', 'super-anket' ); ?></p>
			<?php get_search_form(); ?>
		</section>
	<?php endif; ?>
</main>
<?php
get_footer();
