
<?php foreach ($styles as $style) echo HTML::style("media/css/" . $style . ".css")."\n"; ?>
<?php foreach ($scripts as $script) echo (strpos($script, 'http://') !== false) ? html::script($script) . "\n" : HTML::script("media/js/" . $script . ".js")."\n"; ?>
<?php foreach ($custom_styles as $custom_style) : ?>

	<style type="text/css">
		<?php echo $custom_style; ?>
	</style>
	
<?php endforeach ?>

<?php foreach ($custom_scripts as $custom_script) : ?>

	<script type="text/javascript">
		<?php echo $custom_script; ?>
	</script>
	
<?php endforeach ?>

<link rel="shortcut icon" href="/favicon.ico" />
