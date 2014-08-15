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
      width: 100%;
    }
    .outlined {
      border: 1px solid #000000;
      margin: 2px;
      padding: 3px;
    }
    .outlined input[type:"submit"] {
      width: 100px;
    }
  </style>
  <?php
use tabs\api\client\ApiClient;

if (isset($_REQUEST['apiurl'])) {
    require_once dirname(__FILE__) . '/tabs-api-client/tabs/autoload.php';


    $apiclient = ApiClient::factory($_REQUEST['apiurl'], $_REQUEST['apikey'], $_REQUEST['apisecret']);
    $lines = explode("\n", $_REQUEST['parameters']);

    $parameters = array();
    foreach ($lines as $line) {
        list($key, $val) = explode('=', $line);
        $key = trim($key);
        $val = trim($val);
        if (!empty($val) || $val == "0") {
            $parameters[$key] = is_numeric($val) ? (int)$val : $val;
        }
    };
    $postThis = json_encode($parameters);
    if( isset($_REQUEST['type']) && $_REQUEST['type'] == 'on' ) {
        $data = $apiclient->post($_REQUEST['route'], array(
            'data' => $postThis
        ));
        //$data = $apiclient->post($_REQUEST['route'], $parameters);
    } else if( isset($_REQUEST['options']) && $_REQUEST['options'] == 'on' ) {
        $data = $apiclient->options($_REQUEST['route'], $parameters);
    } else {
        $data = $apiclient->get($_REQUEST['route'], $parameters);
    }
}

?>
</head>

<body>
<h1>RCHC</h1>

<!-- I'm using tables coz I don't care -->
<table>
  <tr>
    <td>

      <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='get'>
          <table>
              <tr>
                  <th>API URL</th>
                  <td><input type='text' name='apiurl' value='<?php if (isset($_REQUEST['apiurl'])) { echo $_REQUEST['apiurl']; } else { echo 'http://zz.api.carltonsoftware.co.uk/'; } ?>' /></td>
              </tr>
              <tr>
                  <th>API Key</th>
                  <td><input type='text' name='apikey' value='<?php if (isset($_REQUEST['apikey'])) { echo $_REQUEST['apikey']; } else { echo 'mouse'; } ?>' /></td>
              </tr>
              <tr>
                  <th>API Secret</th>
                  <td><input type='text' name='apisecret' value='<?php if (isset($_REQUEST['apisecret'])) { echo $_REQUEST['apisecret']; } else { echo 'cottage'; } ?>' /></td>
              </tr>
              <tr>
                  <th>Route</th>
                  <td><input type='text' name='route' value='<?php if (isset($_REQUEST['route'])) { echo $_REQUEST['route']; } else { echo 'property'; } ?>' /></td>
              </tr>
              <tr>
                  <th>Parameters</th>
                  <td>
                      <textarea name='parameters'><?php if (isset($_REQUEST['parameters'])) { echo $_REQUEST['parameters']; } else { echo ''; } ?></textarea>
                  </td>
              </tr>
              <tr>
                  <th>Post?</th>
                  <td>
                      <input type="checkbox" name='type' <?php if (isset($_REQUEST['type']) && $_REQUEST['type'] === 'on') { echo 'checked="checked"'; } ?>/>
                  </td>
              </tr>
              <tr>
                  <th>options?</th>
                  <td>
                      <input type="checkbox" name='options' <?php if (isset($_REQUEST['options']) && $_REQUEST['options'] === 'on') { echo 'checked="checked"'; } ?>/>
                  </td>
              </tr>
              <tr>
                  <th>&nbsp;</th>
                  <td>
                    <input type='submit' value='Go' />
                    <div class='outlined'>
                    <input type='submit' value='Save' /><input name="filename" type="text" /><br />
                    </div>
                    <div class='outlined'>
                    <input type='submit' value='Load' /><input type="file" name="load" id="file" />
                    </div>
                  </td>
              </tr>
          </table>
      </form>

      <h2>example booking-enquiry</h2>
      <textarea>
      propertyRef=&lt;propRef&gt;
      brandCode=&lt;brandCode&gt;
      fromDate=2014-04-01
      toDate=2014-11-08
      partySize=4
      pets=0
      </textarea>
    </td>
    <td width='99%'>
      <textarea id='response' style='height: 100%; width: 100%'><?php
      if (isset($data)) {
          echo json_encode($data, JSON_PRETTY_PRINT);
      }
      ?></textarea>
    </td>
  </tr>
</table>


</body>
</html>
