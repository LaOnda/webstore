<?php
/*
  LightSpeed Web Store
 
  NOTICE OF LICENSE
 
  This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to support@lightspeedretail.com <mailto:support@lightspeedretail.com>
 * so we can send you a copy immediately.
   
 * @copyright  Copyright (c) 2011 Xsilva Systems, Inc. http://www.lightspeedretail.com
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 
 */

/**
 * template Template to create product grid outline
 * calls product_list_item
 *
 *
 */

//Our paginator is currently hardcoded to use breadcrumb arrows for Previous and Next, so we override it in the template here
if($this->dtrProducts->Paginator) {
	$this->dtrProducts->Paginator->LabelForPrevious = _sp('previous');
	$this->dtrProducts->Paginator->LabelForNext = _sp('next');
}
?>


	<div>

		<?php if (isset($this->custom_page_content)): ?>
			<div id="custom_content">
				<?= $this->custom_page_content; ?>
			</div>
		<?php endif; ?>

		<?php if (_xls_get_conf('ENABLE_CATEGORY_IMAGE', 0) && isset($this->category) && $this->category->ImageExist): ?>
			<div id="category_image">
				<img src="<?= $this->category->CategoryImage; ?>"/>
			</div>
		<?php endif; ?>


		<?php  if ($this->subcategories && (count($this->subcategories) > 0)): ?>
			<div class="subcategories">

				<?php _xt("Browse subcategories"); ?>
				<ul >
					<?php  foreach ($this->subcategories as $categ): ?>
					<li><a href="<?= $categ['link']; ?>"><?= $categ['name']; ?></a></li>
					<?php endforeach; ?>
				</ul>

			</div>
		<?php endif; ?>

		<h1><?php echo _xls_stack_get('override_category') != '' ? _xls_stack_pop('override_category') : $this->category->Name; ?></h1>
	</div>

	<?php if ($this->dtrProducts->TotalItemCount > 0) : ?>
		<div class="sixteen columns clearfix">
			<?php $this->dtrProducts->Render(); ?>
			<?php if($this->dtrProducts->Paginator) {  $this->dtrProducts->Paginator->Render(); } ?>
		</div>
	<?php endif; ?>

