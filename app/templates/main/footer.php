
</div>

<!-- JS -->
<?php helpers\assets::js(helpers\url::jquery_path() . 'jquery.min.js') ?>
<?php helpers\assets::js(helpers\url::bootstrap_path() . 'js/bootstrap.min.js') ?>

<?php helpers\assets::js(helpers\url::template_path() . 'default/js/jquery.js') ?>
<?php helpers\assets::js(helpers\url::template_path() . 'admin/js/jquery.js') ?>

<?php
if ($data['js']) {
	echo $data['js'];
}
?>
</body>
</html>