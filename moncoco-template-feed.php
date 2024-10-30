<?php
/**
 * MonCoco Custom XML feed generator template.
 */

header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>

<root>
<items>
<language><?php bloginfo_rss( 'language' ); ?></language>
	<?php while( have_posts()) : the_post(); ?>
	<item>
		<title><?php the_title_rss(); ?></title>
		<category><?php 
			foreach((get_the_category()) as $category) { 
    				echo $category->cat_name . ' '; 
				} 

		?></category>
		<pubDate><?php echo mysql2date('d M Y', get_post_time('Y-m-d', true), true); ?></pubDate>
		<?php $allcontent = get_the_content_feed('rss2'); ?>
		<description>
			<![CDATA[
			<?php echo $allcontent; ?>
			]]>
		</description>
		<link><?php the_permalink_rss() ?></link>
		<image>
			<?php if (has_post_thumbnail() ):
      		$attachmentimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );echo $attachmentimage[0]; ?>
      		<?php endif; ?>
		</image>
		<?php
		$idcurrentpost = get_the_ID();
		?> <idcurrentpost><?php echo ($idcurrentpost); ?></idcurrentpost><?php
		$comments = get_comments('post_id='.$idcurrentpost);
		?>
		<comments>
		<?php
		foreach($comments as $comment) 
		{ 
			?>
			<comment>
			<author><?php comment_author( $comment->comment_ID ); ?></author>
			<avatar><?php echo get_avatar( $comment, 128 ); ?></avatar>
			<content><?php
    			echo ($comment->comment_content);
			?></content></comment><?php 
		} ?>
		</comments>
<?php rss_enclosure(); ?>
	<?php do_action('rss2_item'); ?>
	</item>
	<?php endwhile; ?>
	</items>
</root>