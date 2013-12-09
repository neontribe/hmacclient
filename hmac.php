<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>
<head>
  <title>RCHC</title>
  <script src="http://code.jquery.com/jquery-2.0.3.js"></script>
  <style>
    input {
      width: 400px;
    }
    textarea {
      width: 400px;
      height: 300px;
    }
    #response {
      width: 800px;
    }
  </style>
  <?php
use tabs\api\client\ApiClient;

if (isset($_POST['apiurl'])) {
    require_once dirname(__FILE__) . '/tabs-api-client/tabs/autoload.php';
    

    $apiclient = ApiClient::factory($_POST['apiurl'], $_POST['apikey'], $_POST['apisecret']);
    $lines = explode("\n", $_POST['parameters']);
    $parameters = array();
    foreach ($lines as $line) {
        list($key, $val) = explode('=', $line);
        $key = trim($key);
        $val = trim($val);
        if (!empty($val)) {
            $parameters[$key] = $val;
        }
    };

    $data = $apiclient->get($_POST['route'], $parameters);
}
?>
</head>

<body>
<h1>RCHC</h1>

<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
    <table>
        <tr>
            <th>API URL</th>
            <td><input type='text' name='apiurl' value='<?php if (isset($_POST['apiurl'])) { echo $_POST['apiurl']; } else { echo 'http://zz.api.carltonsoftware.co.uk/'; } ?>' /></td>
        </tr>
        <tr>
            <th>API Key</th>
            <td><input type='text' name='apikey' value='<?php if (isset($_POST['apikey'])) { echo $_POST['apikey']; } else { echo 'mouse'; } ?>' /></td>
        </tr>
        <tr>
            <th>API Secret</th>
            <td><input type='text' name='apisecret' value='<?php if (isset($_POST['apisecret'])) { echo $_POST['apisecret']; } else { echo 'cottage'; } ?>' /></td>
        </tr>
        <tr>
            <th>Route</th>
            <td><input type='text' name='route' value='<?php if (isset($_POST['route'])) { echo $_POST['route']; } else { echo 'property'; } ?>' /></td>
        </tr>
        <tr>
            <th>Parameters</th>
            <td>
                <textarea name='parameters'><?php if (isset($_POST['parameters'])) { echo $_POST['parameters']; } else { echo ''; } ?></textarea>
            </td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td><input type='submit' value='Go' /></td>
        </tr>
    </table>
</form>

<textarea id='response'><?php
if (isset($data)) {
    echo json_encode($data, JSON_PRETTY_PRINT);
}
?></textarea>

</body>
</html>
