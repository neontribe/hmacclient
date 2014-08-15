<?php
use tabs\api\client\ApiClient;
use tabs\api\property\PropertySearch;
require_once dirname(__FILE__) . '/tabs-api-client/tabs/autoload.php';
var_dump($argv);

$apiclient = ApiClient::factory(
  'http://lb.api.carltonsoftware.co.uk/',
  'lymebhneon',
  $argv[1]
);

# get property
$raw_property = $apiclient->get('property/V4531_LB');
$raw_attributes = $raw_property->response->attributes;
$fh = fopen('raw_property', 'w'); fwrite($fh, var_export($raw_property, TRUE)); fclose($fh);
$fh = fopen('raw_attributes', 'w'); fwrite($fh, var_export($raw_attributes, TRUE)); fclose($fh);

$property = tabs\api\property\Property::getProperty('V4531', 'LB');
$fh = fopen('property', 'w'); fwrite($fh, var_export($property, TRUE)); fclose($fh);

# get attributes
$attributes = $property->getAttributes();
$fh = fopen('attributes', 'w'); fwrite($fh, var_export($attributes, TRUE)); fclose($fh);

$attribute_a = $property->getAttribute('No. of Pets ');
$attribute_b = $property->getAttribute('No. of Pets');

echo "property->getAttribute('No. of Pets '); = $attribute_a\n";
echo "property->getAttribute('No. of Pets'); = $attribute_b\n";
echo "property->getPets() = " . $property->getPets() . "\n";

$apiinfo = $apiclient->get('/');
var_export($apiinfo->response->constants->attributes[16]) . "\n";
echo "\nTrailing spaces, really?\n";
