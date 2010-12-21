<?php
  // Compatible with sf_escaping_strategy: true
  $blogCategories = isset($blogCategories) ? $sf_data->getRaw('blogCategories') : null;
  $dateRange = isset($dateRange) ? $sf_data->getRaw('dateRange') : null;
  $pager = isset($pager) ? $sf_data->getRaw('pager') : null;
  $params = isset($params) ? $sf_data->getRaw('params') : null;
?>
<?php slot('body_class') ?>a-blog <?php echo $sf_params->get('module'); ?> <?php echo $sf_params->get('action') ?><?php end_slot() ?>

<?php slot('a-subnav') ?>
	<div class="a-subnav-wrapper blog a-ui clearfix">
		<div class="a-subnav-inner">
	    <?php include_component('aBlog', 'sidebar', array('params' => $params, 'dateRange' => $dateRange, 'categories' => $blogCategories)) ?>
	  </div> 
	</div>
<?php end_slot() ?>

<h3>This is the alternate index template.</h3>

<div id="a-blog-main" class="a-blog-main clearfix">
	<div class="a-blog-heading"> 
	  <?php a_area('blog-heading', array('area_add_content_label' => a_('Add Heading Content'), 'allowed_types' => array('aRichText', 'aSlideshow', 'aSmartSlideshow'))) ?>
	  <?php if ($page->userHasPrivilege('edit')): ?>
	    <div class="a-help">
	      The heading appears before the blog posts. Use the "New Post" button to add blog posts.
	    </div>
	  <?php endif ?>
    <?php if ($sf_params->get('year')): ?>
  		<h3><?php echo $sf_params->get('day') ?> <?php echo ($sf_params->get('month')) ? date('F', strtotime(date('Y').'-'.$sf_params->get('month').'-01')) : '' ?> <?php echo $sf_params->get('year') ?></h3>
  	  <ul class="a-ui a-controls a-blog-browser-controls">
  	    <li><?php echo link_to('<span class="icon"></span>'.a_('Previous'), 'aBlog/index?'.http_build_query($params['prev']), array('class' => 'a-arrow-btn icon a-arrow-left', )) ?></li>
  	    <li><?php echo link_to('<span class="icon"></span>'.a_('Next'), 'aBlog/index?'.http_build_query($params['next']), array('class' => 'a-arrow-btn icon a-arrow-right', )) ?></li>
  	  </ul>
  	<?php endif ?>
	</div>
  
  <?php foreach ($pager->getResults() as $a_blog_post): ?>
  	<?php echo include_partial('aBlog/post', array('a_blog_post' => $a_blog_post)) ?>
  	<hr />
  <?php endforeach ?>

  <?php include_partial('aBlog/pager', array('pager' => $pager, 'pagerUrl' => url_for('aBlog/index?' . http_build_query($params['pagination'])), 'max_per_page' => $max_per_page)) ?>
  
</div>