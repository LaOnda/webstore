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
 * Web Admin panel template called by xlsws_admin_ship_modules class
 * Used for shipping modules
 * 
 *
 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Web Store Configuration</title>

    <script type="text/javascript" src="<?=  adminTemplate('js/jquery.min.js');  ?>"></script>     
    <script type="text/javascript" src="<?=  adminTemplate('js/jquery.ui.js');  ?>"></script>     
	<script type="text/javascript" src="<?=  adminTemplate('js/admin.js'); ?>"></script>
	<script type="text/javascript" src="<?=  adminTemplate('js/corners.js'); ?>"></script>

	<script type="text/javascript"> 
    $(document).ready(function(){ 
        $("ul.sf-menu").superfish(); 
    }); 
	</script>
	
	<script type="text/javascript">
  $(document).ready(function(){
    $('.rounded').corners();
    $('.rounded').corners(); /* test for double rounding */
    $('table', $('#featureTabsc_info .tab')[0]).each(function(){$('.native').hide();});
    $('#featureTabsc_info').show();
  });
  function tab(n) {
    $('#featureTabsc_info .tab').removeClass('tab_selected');
    $($('#featureTabsc_info .tab')[n]).addClass('tab_selected');
    $('#featureElementsc_info .feature').hide();
    $($('#featureElementsc_info .feature')[n]).show();
  }
  </script>
	
	<style type="text/css" xml:space="preserve">
		/*<![CDATA[*/
		      @import url(<?= adminTemplate('css/admin.css') ?>) all;
			  @import url(<?= adminTemplate('css/superfish.css') ?>) all;
		/*]]>*/
	</style>
	
</head>
<body>
<?php include_once(adminTemplate('pages.tpl.php')); ?>

<?php $this->RenderBegin(); ?>				
		<br /><br />
			
		<div id="options" class="accord rounded"> 
		<div id="tabs">
			<ul>
				<?php foreach($this->arrTabs as $type=>$label): ?>
				<a href="<?= $this->get_uri($type); ?>" >
					<li class="rounded 
						<?php if($type == $this->currentTab): ?>
							active
						<?php endif; ?> {5px top transparent}" style="display:block; float: left">
						<?= $label; ?>
					</li>
				</a>
				<?php endforeach; ?>
			</ul>
		</div>

<?php

if(isset($this->HelperRibbon)) 
	if (strlen($this->HelperRibbon)>0)
		echo '<div style="padding: 5px;"><img style="padding-right: 5px; width:44px; height:35px;" align="left" src="'.adminTemplate('css/images/questionmark.png').'"> '.$this->HelperRibbon.'</div>';

?>	


	<div class="title rounded"> 
		<div class="name" style="cursor:pointer;">Editing Order <?= $this->page; ?></div> 
		<div style="float:right">
			<?php $this->btnSave->Render('CssClass=button rounded'); ?><?php $this->btnCancel->Render('CssClass=button rounded'); ?></div> 
	</div>
						
						
<div id="customer_registration edit_height module_config">

	<div id='editcontainer'>
	
		<div class="basic_row">
			<div class="collabel">First Name:</div><div class="colfield"><?php $this->BillingContactControl->FirstName->RenderWithError('CssClass=smallfont'); ?></div>
			<div class="collabel">Last Name:</div><div class="colfield"><?php $this->BillingContactControl->LastName->RenderWithError('CssClass=smallfont'); ?></div>
			<div class="collabel">Phone:</div><div class="colfield"><?php $this->BillingContactControl->Phone->RenderWithError('CssClass=smallfont') ?></div>
			<div class="clear_float"></div>
		</div> 
	
		<div class="basic_row">
			<div class="collabel">Company:</div><div class="colfield"><?php $this->BillingContactControl->Company->Render('CssClass=smallfont'); ?></div>
			<div class="collabel">Email:</div><div class="colfieldwide"><?php $this->BillingContactControl->Email->RenderWithError('CssClass=smallfont') ?></div>
		</div>
		 
		<div class="thin_row">
		</div>
		
		<div class="basic_row">
			<div class="collabel">Bill To:</div><div class="coladdress">
				<?php 
				$this->BillingContactControl->Street1->Render('CssClass=smallfont'); echo "<br clear='left'>";
				$this->BillingContactControl->Street2->Render('CssClass=smallfont'); echo "<br clear='left'>";
				$this->BillingContactControl->City->Render('CssClass=smallfont w100');
				$this->BillingContactControl->State->Render(); echo "<br clear='left'>";
				$this->BillingContactControl->Zip->Render('CssClass=smallfont w70'); echo "<br clear='left'>";
				$this->BillingContactControl->Country->Render(); 
				?></div>
			
			<div class="collabel">Ship To:</div><div class="coladdress">
				<?php 
				$this->ShippingContactControl->FirstName->Render('CssClass=smallfont w70 mr10'); echo "&nbsp;&nbsp;";
				$this->ShippingContactControl->LastName->Render('CssClass=smallfont w70'); echo "<br clear='left'>";
				$this->ShippingContactControl->Street1->Render('CssClass=smallfont'); echo "<br clear='left'>";
				$this->ShippingContactControl->Street2->Render('CssClass=smallfont'); echo "<br clear='left'>";
				$this->ShippingContactControl->City->Render('CssClass=smallfont w100');
				$this->ShippingContactControl->State->Render(); echo "<br clear='left'>";
				$this->ShippingContactControl->Zip->Render('CssClass=smallfont w70'); echo "<br clear='left'>";
				$this->ShippingContactControl->Country->Render(); 
				?></div>
	
			<div class="collabel">Pay Method:</div><div class="colfield">
				<?php 
				$this->PaymentControl->ModuleControl->Visible = true;
				$this->PaymentControl->ModuleControl->Enabled = true;
				$this->PaymentControl->ModuleControl->Render(); 
	
				?>
				
				<div class="collabel">Amt Paid:</div><div class="collabel"><?php $this->ctlPaymentAmount->Render(); ?></div>
				<div class="collabel">Reference #:</div><div class="collabel"><?php $this->ctlPaymentRef->Render(); ?></div>
				<div class="collabel"><?php $this->ctlShipLabel->Render(); ?>:</div><div class="collabel"><?php $this->ctlShippingTotal->Render(); ?></div><div class="clear_float"></div>
				<div class="collabel">Order Total:</div><div class="collabel"><?php $this->ctlOrderTotal->Render(); ?></div>
					
					
					
				</div>
			<div class="clear_float"></div>	
				
		
	
	<hr>

	
	<div class="clear_float"></div>
	
	
			<div class="basic_row tableheader ">
				<div class="colfield ml10">Product Code</div>
				<div class="colfield w70">Qty</div>
				<div class="colfield w300">Description</div>
				<div class="colfield">Delete This Item</div>

				<div class="clear_float"></div>
			</div> 



	<? 
		foreach ($this->arrProducts as $arrProduct) { ?>
		
			<div class="basic_row rowbg">
				<div class="colfield ml10"><?php $arrProduct['Code']->Render(); ?></div>
				<div class="colfield w70"><?php $arrProduct['Qty']->Render(); ?></div>
				<div class="colfield w300"><?php $arrProduct['Description']->Render(); ?></div>
				<div class="colfield w70"><?php $arrProduct['Delete']->Render(); ?></div>


				<div class="clear_float"></div>
			</div> 
		<?	
		
		
		}
	
	?>
				
	</div>
             
              
       
</div>
									
				
		
<?php $this->RenderEnd(); ?>		
</body>
</html>
