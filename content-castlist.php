<?php
	$cast_fields = get_post_custom(); //カスタムフィールドを全部取得
	$comment = get_the_content();
	$cast_screens = json_decode($cast_fields['_krc_cast_screens'][0]); //画像配列を用意
	$cast_type_terms = get_the_terms($post->ID, 'krc_type'); //タイプタクソノミーを取得
	$cast_grade_terms = get_the_terms($post->ID, 'krc_grade'); //グレードタクソノミーを取得
	$cast_new_terms = get_the_terms($post->ID, 'krc_new'); //新人区分タクソノミーを取得
?>
<div class="one-cast <?php if (today_schedule(get_the_ID())) {echo 'todays-badge';}?>">

	<a href="/cast/<?php echo esc_html($cast_fields['_krc_name'][0]);?>">
		<figure>
			<?php if( empty($cast_screens) ): ?>
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/noimg.jpeg" alt="<?php the_title();?>">
			<?php else: ?>
				<img src="<?php echo $cast_screens[0];?>" alt="<?php the_title();?>">
			<?php endif;?>
			<?php if  ($fncName != 'outNewType'): ?>
				<?php if ( !empty($cast_grade_terms[0]->name) ):?>
					<span class="grade <?php echo $cast_grade_terms[0]->slug?>"><?php echo $cast_grade_terms[0] -> name ?></span>
				<?php endif;?>
				
			<?php endif;?>
		</figure>
		<?php
echo '<script>console.log(' . json_encode($cast_grade_terms) . ');</script>';
?>
		<figcaption>
			<span class="cast-name"><?php echo esc_html($cast_fields['_krc_name'][0]);?></span>
			<span class="cast-size">T.<?php echo esc_html($cast_fields['_krc_tall'][0]);?> B.<?php echo esc_html($cast_fields['_krc_bust'][0]);?>(<?php echo esc_html($cast_fields['_krc_cups'][0]);?>)</span>
			<span class="cast-pr"><?php echo esc_html($cast_fields['krc_pr'][0]);?></span>
			<span class="cast-com"><?php echo esc_html($comment);?></span>
		</figcaption>
	</a>
	<?php if ( !empty($cast_fields['tw_id'][0]) ):?>
		<a class="tw" href="https://twitter.com/<?php echo esc_html($cast_fields['tw_id'][0]);?>" target="_blank"></a>
	<?php endif;?>
</div>