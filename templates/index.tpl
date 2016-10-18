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
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
     <div class="container">

		<div class="page-header"><h1>RCHC</h1></div>
		<form action='{$formpath}' method='get'>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type='text' class="form-control" placeholder="API URL" name='apiurl' value='{$apiurl}'></input>
				</div>
				<div class="form-group">
					<input type='text' class="form-control" name='apikey' placeholder="API Key" value='{$apikey}'></input>
				</div>
				<div class="form-group">
					<input type='text' class="form-control" name='apisecret' placeholder="API Secret" value='{$apisecret}'></input>
				</div>
				<div class="form-group">
					<input type='text' class="form-control" name='route' placeholder="Route" value='{$route}'></input>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea placeholder='Parameters: 
pets=true
reference=I192' class='form-control' rows='6' name='parameters'>{$parameters}</textarea>
				</div>
				
				<div class="form-group">
					<!-- <span class="label label-primary">Request Method</span> -->
					<label for="parameters" class="col-sm-4 control-label">Request Method</label>
					<div class="col-sm-8">
						<select class="form-control" name="req_method">
						  {html_options options=$request_types selected=$req_method}
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
					    	<input type="checkbox" {if $filter_search !== 0 && isset($filter_search)} checked {/if} name="filter_search">Filter Search?
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- JQuery Jsonview -->
  	<script type="text/javascript" src="public/jquery-jsonview/jquery.jsonview.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/bootstrap/dist/js/bootstrap.min.js"></script>


    <script type="text/javascript">
    	$('#json').JSONView({$json_result}, { collapsed: true, nl2br: true, recursive_collapser: true });
    </script>
    
  </body>
</html>