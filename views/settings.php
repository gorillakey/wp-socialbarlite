<div class="page-header">
  <h1><?php echo $title_module;?></h1	>
</div>

<form id="master-settings" class="form-horizontal" role="form" action="/wp-admin/admin.php?page=<?php echo FORM_URL; ?>" method="post">
	
<?php if(!empty($msg)) { ?>
<div class="alert alert-<?php echo $msgtype; ?>">
	<?php echo $msg; ?>
</div>
<?php } ?>

	<input type="hidden" name="option" value="masterPlugin.init">

	<div class="form-group">
		<label for="BackgroundBar" class="col-sm-3 control-label">Message on Bar</label>
		<div class="col-sm-7">
	    <input type="text" class="form-control" placeholder="Message on Bar" name="data[<?php echo PLUGIN_NAME_VAR; ?>][message]" value="<?php echo $data[PLUGIN_NAME_VAR]['message'];?>">
		</div>
	</div>

	<div class="form-group">
	    <label for="BackgroundBar" class="col-sm-3 control-label">Background Bar</label>
	    <div class="col-sm-7">
		<div id="colorSelector_background"><div style="background-color: <?php if(!empty($data[PLUGIN_NAME_VAR]['background'])){echo $data[PLUGIN_NAME_VAR]['background'];}else{ echo '#fff';}?>"></div></div>
		<input type="hidden" class="regular-text" id="FloatSocialBarBackground" name="data[<?php echo PLUGIN_NAME_VAR; ?>][background]" value="<?php echo $data[PLUGIN_NAME_VAR]['background'];?>">
		</div>
	</div>

	<div class="form-group">
	    <label for="BackgroundBar" class="col-sm-3 control-label">Color Text Bar</label>
	    <div class="col-sm-7">
		<div id="colorSelector_colortext"><div style="background-color: <?php if(!empty($data[PLUGIN_NAME_VAR]['colortext'])){echo $data[PLUGIN_NAME_VAR]['colortext'];}else{ echo '#fff';}?>"></div></div>
		<input type="hidden" class="regular-text" id="FloatSocialBarColortext" name="data[<?php echo PLUGIN_NAME_VAR; ?>][colortext]" value="<?php echo $data[PLUGIN_NAME_VAR]['colortext'];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="BackgroundBar" class="col-sm-3 control-label icon-label"><span><img width="32" height="32" src="<?php echo STATIC_URL; ?>images/Twitter.png"></span></label>
	    <div class="col-sm-7">
			<input type="text" class="form-control" placeholder="https://twitter.com/username" name="data[<?php echo PLUGIN_NAME_VAR; ?>][url_twitter]" value="<?php echo $data[PLUGIN_NAME_VAR]['url_twitter'];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="BackgroundBar" class="col-sm-3 control-label">Activate Social Bar</label>
		<div class="col-sm-7">
		<div id="active-switch" class="make-switch" data-on="success" data-off="warning">
		    <input type="checkbox" name="data[<?php echo PLUGIN_NAME_VAR; ?>][active]" <?php if(!empty($data[PLUGIN_NAME_VAR]["active"])){ ?>checked<?php }?> value="1">
		</div>
		</div>
	</div>

	<div class="form-group">
		<label for="BackgroundBar" class="col-sm-3 control-label"></label>
		<div class="col-sm-7">
	    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save Settings">
		</div>
	</div>
	
</form>
