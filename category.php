<?php $color = "red"; include 'header.php'; ?>
<?php get_header(); ?>

<div class="wrapper">
	<?php $active = "topics"; include 'sidebar.php' ?>
	
	<div id="right-content">
		<h2 class="topic"><?php single_cat_title(); ?></h2>
		<div id="posts">
			<?php $x=0; ?>
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="shallow-post<?php if ($x % 2) : ?> alt<?php endif; ?>">
				<div class="shallow-image">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<div class="shallow-overlay"></div>
					<?php $data = get_post_meta($id, 'image'); ?>
						<img src="http://hipsterist.com/wp-content/themes/hipsterist/thumb.php?src=<?=$data[0]?>&amp;w=290&amp;h=120&amp;zc=1&amp;q=90" width="290" height="120" alt="<?php the_title(); ?> Thumbnail" />
					</a>
				</div>
				<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<span class="date"><?php the_time('l, F jS, Y'); ?></span>
				<?php the_excerpt(); ?>
				<span class="perma"><a href="<?php the_permalink(); ?>">Keep Reading &raquo;</a></span>
				<span class="comment"><?php comments_popup_link('0', '1', '%'); ?></span>
				<div class="clear"></div>
			</div>
			<?php $x++;?>
			<?php endwhile;?>
			<?php else : ?>

				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>

			<?php endif; ?>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="clear"></div>		
	
</div>

<?php
	$next = get_next_posts_link('Next &raquo;');
	$previous = get_previous_posts_link('&laquo; Previous');
?>
<?php if ($next != '' || $previous != ''): ?>
<div class="whitey">
	<div id="pagination">
		<?php previous_posts_link('&laquo; Previous'); ?>
		<?php next_posts_link('Next &raquo;'); ?>
		<div class="clear"></div>
	</div>
</div>
<?php endif ?>

<?php get_footer(); ?>