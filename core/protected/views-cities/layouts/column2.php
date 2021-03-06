<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
	<div class="span9">

		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
	        'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/css/images/breadcrumbs_home.png'), array('/site/index')),
			'separator'=>' / ',
	        ));	?> <!-- breadcrumbs -->
		<?= $this->renderPartial('/site/_flashmessages',null, true); ?><!-- flash messages -->
		<div id="viewport" class="row-fluid">
		    <?php echo $content; ?>
	    </div>
	</div>

	<div class="span3">

		<?= $this->renderPartial('/site/_sidecart',null, true); ?>

		<div id="shoppingcartcheckout" onclick="window.location.href='<?php echo Yii::app()->createUrl('cart/checkout') ?>'">
			<div class="checkoutlink"><?php echo CHtml::link(Yii::t('cart','Checkout'),array('cart/checkout')) ?></div>
			<div class="checkoutarrow"><?php echo CHtml::image(Yii::app()->theme->baseUrl."/css/images/checkoutarrow.png"); ?></div>
		</div>

		<div id="shoppingcarteditcart" onclick="window.location.href='<?php echo Yii::app()->createUrl('/cart') ?>'">
			<div class="editlink"><?php echo CHtml::link(Yii::t('cart','Edit Cart'),array('/cart')) ?></div>
		</div>

        <div id="sidebar" class="span12">
	        <?php if(_xls_get_conf('ENABLE_WISH_LIST'))
				echo $this->renderPartial('/site/_wishlists',array(),true); ?>
	    </div>
	</div>
</div>

<?php
$this->endContent();
