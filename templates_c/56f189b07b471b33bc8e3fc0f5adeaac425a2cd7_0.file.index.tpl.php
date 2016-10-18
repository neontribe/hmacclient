<?php
/* Smarty version 3.1.30, created on 2016-10-18 11:58:01
  from "/srv/http/hmacclient/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58060e49a09a19_55068466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56f189b07b471b33bc8e3fc0f5adeaac425a2cd7' => 
    array (
      0 => '/srv/http/hmacclient/templates/index.tpl',
      1 => 1476791880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58060e49a09a19_55068466 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/srv/http/hmacclient/vendor/smarty/smarty/libs/plugins/function.html_options.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- JQuery Jsonview -->
    <link rel="stylesheet" href="public/jquery-jsonview/jquery.jsonview.css" />

    <!-- Bootstrap -->
    <link href="public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->

  </head>
  <body>
     <div class="container">

		<div class="page-header"><h1>RCHC</h1></div>
		<form action='<?php echo $_smarty_tpl->tpl_vars['formpath']->value;?>
' method='get'>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type='text' class="form-control" placeholder="API URL" name='apiurl' value='<?php echo $_smarty_tpl->tpl_vars['apiurl']->value;?>
'></input>
				</div>
				<div class="form-group">
					<input type='text' class="form-control" name='apikey' placeholder="API Key" value='<?php echo $_smarty_tpl->tpl_vars['apikey']->value;?>
'></input>
				</div>
				<div class="form-group">
					<input type='text' class="form-control" name='apisecret' placeholder="API Secret" value='<?php echo $_smarty_tpl->tpl_vars['apisecret']->value;?>
'></input>
				</div>
				<div class="form-group">
					<input type='text' class="form-control" name='route' placeholder="Route" value='<?php echo $_smarty_tpl->tpl_vars['route']->value;?>
'></input>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea placeholder='Parameters: 
pets=true
reference=I192' class='form-control' rows='6' name='parameters'><?php echo $_smarty_tpl->tpl_vars['parameters']->value;?>
</textarea>
				</div>
				
				<div class="form-group">
					<!-- <span class="label label-primary">Request Method</span> -->
					<label for="parameters" class="col-sm-4 control-label">Request Method</label>
					<div class="col-sm-8">
						<select class="form-control" name="req_method">
						  <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['request_types']->value,'selected'=>$_smarty_tpl->tpl_vars['req_method']->value),$_smarty_tpl);?>

						</select>
					</div>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<button type="submit" class="btn btn-primary btn-block">Go</button>
			</div>
			<div class="col-md-2">
				<button type="button" class="btn btn-primary btn-block" onclick="var win = window.open(window.location.href + '&dump_json=true', '_blank'); win.focus();">View Raw</button>
			</div>
			<div class="col-md-2">
				<div class="checkbox">
					    <label>
					    	<input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['filter_search']->value !== 0 && isset($_smarty_tpl->tpl_vars['filter_search']->value)) {?> checked <?php }?> name="filter_search">Filter Search?
					    </label>
				</div>
			</div>
		</div>
		</form>

		<div class="section">

			<div class="col-md-12">
				<div id="json"></div>
			</div>
		</div>
    </div><!-- /.container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>

    <!-- JQuery Jsonview -->
  	<?php echo '<script'; ?>
 type="text/javascript" src="public/jquery-jsonview/jquery.jsonview.js"><?php echo '</script'; ?>
>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo '<script'; ?>
 src="public/bootstrap/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 type="text/javascript">
    	$('#json').JSONView(<?php echo $_smarty_tpl->tpl_vars['json_result']->value;?>
, { collapsed: true, nl2br: true, recursive_collapser: true });
    <?php echo '</script'; ?>
>
    
  </body>
</html><?php }
}
