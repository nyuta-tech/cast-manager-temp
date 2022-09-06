<?php get_header(); ?>

<!-- ヘッダとパンくず無理やり変更 -->
<div class="section page-header">
	<div class="container">
		<div class="row bg_img">
			<div class="col-md-12">
				<h1 class="page-header_pageTitle">THERAPIST <br>
					<span class="page-header_sub_Title">セラピスト一覧</span>
				</h1>
				<span>
					あなたのお好みのセラピストは？
				</span>
				<br>
				<span>
					コンセプトは、”Touch & Talk”。気になるセラピストをさがして、絶世の美に癒やされてください。
				</span>
			</div>
		</div>
	</div>
	<script>
		document.title= document.title.replace('キャスト管理','セラピスト一覧');
	</script>
</div>
<!-- <div class="section breadSection">
	<div class="container">

		<div class="row">
			<ol class="breadcrumb" itemtype="http://schema.org/BreadcrumbList">
				<li id="panHome" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
					<a itemprop="item" href="https://sample.oilnoko.com/"><span itemprop="name"><i class="fa fa-home"></i> HOME</span></a>
				</li>
				<li>
					<span>セラピスト一覧</span></li>
			</ol>
		</div>
	</div>
</div> -->
<div class="description">
	<span class="title"> 
		滋賀メンズエステ【SWEET ROSE スイートロゼ】の
		<br>
		セラピストのご紹介	
	</span>
	<br>
	<br>
	<span class="detail">
		「心」と「身体」と「おもてなし」ができる女性を厳選しております！ <br> 
		究極の全身アロマケアと最高級の施術をご堪能くださいませ。
	</span>
</div>
<?php
// Dealing with old files.
// Actually, it's ok to only use get_template_part().
/*
 Page Header
/*-------------------------------------------*/
$old_file_name[] = 'module_pageTit.php';
if ( locate_template( $old_file_name, false, false ) ) {
	locate_template( $old_file_name, true, false );
} else {
	//get_template_part( 'template-parts/page-header' );
}

/*
 BreadCrumb
/*-------------------------------------------*/
do_action( 'lightning_breadcrumb_before' );
$old_file_name[] = 'module_panList.php';
if ( locate_template( $old_file_name, false, false ) ) {
	locate_template( $old_file_name, true, false );
} else {
	//get_template_part( 'template-parts/breadcrumb' );
}
do_action( 'lightning_breadcrumb_after' );
?>

<div class="<?php lightning_the_class_name( 'siteContent' ); ?>">
<?php do_action( 'lightning_siteContent_prepend' ); ?>
<div class="container">
<?php do_action( 'lightning_siteContent_container_prepend' ); ?>
<div class="row">
<div class="<?php lightning_the_class_name( 'mainSection' ); ?>" id="main" role="main">
<?php do_action( 'lightning_mainSection_prepend' ); ?>

	<?php
	/*
		Archive title
	/*-------------------------------------------*/
	$archiveTitle_html = '';
	$page_for_posts		= lightning_get_page_for_posts();
	// Use post top page（ Archive title wrap to div ）.
	if ( $page_for_posts['post_top_use'] || get_post_type() !== 'post' ) {
		if ( is_year() || is_month() || is_day() || is_tag() || is_author() || is_tax() || is_category() ) {
			$archiveTitle			= get_the_archive_title();
			$archiveTitle_html = '<header class="archive-header"><h1>' . $archiveTitle . '</h1></header>';
		}
	}
	echo wp_kses_post( apply_filters( 'lightning_mainSection_archiveTitle', $archiveTitle_html ) );

	/*
		Archive description
	/*-------------------------------------------*/
	$archiveDescription_html = '';
	if ( is_category() || is_tax() || is_tag() ) {
		$archiveDescription = term_description();
		$page_number				= get_query_var( 'paged', 0 );
		if ( ! empty( $archiveDescription ) && $page_number == 0 ) {
			$archiveDescription_html = '<div class="archive-meta">' . $archiveDescription . '</div>';
		}
	}
	echo wp_kses_post( apply_filters( 'lightning_mainSection_archiveDescription', $archiveDescription_html ) );

	$postType = lightning_get_post_type();

	do_action( 'lightning_loop_before' );
	?>

<div class="<?php lightning_the_class_name( 'postList' ); ?>">

<?php if ( have_posts() ) : ?>
	<!-- セラピスト一覧 -->
	<div class="cast-wrapper">
		<div class="box-title"></div>
		<div class="box-body">
		<?php while (have_posts()):the_post();?>
			<?php get_template_part('content',('castlist'));?>
		<?php endwhile;?>
		</div>
	</div>

	<?php
	the_posts_pagination(
		array(
			'mid_size'					 => 1,
			'prev_text'					=> '&laquo;',
			'next_text'					=> '&raquo;',
			'type'							 => 'list',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lightning' ) . ' </span>',
		)
	);
	?>

	<?php else : // hove_posts() ?>

	<div class="well"><p><?php echo wp_kses_post( apply_filters( 'lightning_no_posts_text', __( 'No posts.', 'lightning' ) ) ); ?></p></div>

<?php endif; // have_post() ?>

</div><!-- [ /.postList ] -->

<?php do_action( 'lightning_loop_after' ); ?>
<?php do_action( 'lightning_mainSection_append' ); ?>
</div><!-- [ /.mainSection ] -->





<?php do_action( 'lightning_additional_section' ); ?>

</div><!-- [ /.row ] -->
<?php do_action( 'lightning_siteContent_container_apepend' ); ?>
</div><!-- [ /.container ] -->
<?php do_action( 'lightning_siteContent_apepend' ); ?>
</div><!-- [ /.siteContent ] -->
<?php get_footer(); ?>