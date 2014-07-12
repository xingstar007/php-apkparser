# php-apkparser
A small library for parsing Android application package files (__APK__ s).


Requirements
============
It is possible that these may or may not be necessary, or perhaps require a small modification to work.
* [**PHP 5.3.0**](http://php.net/releases/5_3_0.php)+ · the use of the 'const' keyword outside of classes
* [**iconv**](http://lu1.php.net/manual/en/function.iconv.php) · Android packages deal with many languages, and use UTF-16 when applicable

Performance
===========
Horrible.


Usage
=====

Simple
------
To display some basic information about the package:

```php
<?php

require_once 'lib/parser.php';

$apk = new \APKParser\APK('example.apk');

printf("-name = '%s'\n", $apk->get_package());
printf("-version = '%s (%s)'\n", $apk->get_androidversion_name(), $apk->get_androidversion_code());
printf("-min_sdk_version = '%s'\n", $apk->get_min_sdk_version());
var_export($apk->get_permissions());
```

Manifest
--------
You may also get the `AndroidManifest.xml` [**DOMDocument**](http://www.php.net/manual/en/class.domdocument.php) object:

```php
$apk = new \APKParser\APK('example.apk');
$manifest = $apk->get_android_manifest_xml();

printf("-object = '%s'", get_class($manifest));
```

...or perhaps you wish to get `AndroidManifest.xml` as a string (why?):

```php
// First method.
$manifest_i = $apk->get_android_manifest_axml()->get_buff();

// Second method.
$manifest_d = $apk->get_android_manifest_xml->saveXML();
```

...OR YOU WANT AN ELEMENT ATTRIBUTE VALUE:

```php
$app_name = $apk->get_element('application', 'android:name');
printf("-application_name = '%s%s'", $apk->get_package(), $app_name);

$activities = $apk->get_elements('activity', 'android:name');
var_export($activities);
```

Resources
---------
Some applications define their manifest attribute values as references:

```xml
...
<application android:icon="@drawable/mushrooms" android:label="Mushrooms"/>
...
```
...which upon APK compilation are converted into resource IDs and now parsed by the parser
into **hex** codes for convenience.

```php
printf("%s", $apk->get_androidversion_name()); // prints '@<hex>', e.g.: '@7f0b000d'
```

These resource IDs have to be decoded:

```php
$arscobj = $apk->get_android_resources();
$vn_res_id = substr($apk->get_androidversion_name(), 1);
printf("%s", $arscobj->get_resource_value_by_reference($vn_res_id));
```

Resource values may be paths to files inside the package:

```php
$app_icon = $apk->get_element('application', 'android:icon'); // @<hex>

$arscobj = $apk->get_android_resources();
var_export($arscobj->get_resource_value_by_reference(substr($app_icon, 1)));
/*
array (
  0 => 'res/drawable-mdpi/mushrooms.png',
  1 => 'res/drawable-hdpi/mushrooms.png',
  2 => 'res/drawable-xhdpi/mushrooms.png',
)
 */
```

...which you can get as a stream from the package (and then use as you wish):

```php
$icon = $arscobj->get_resource_value_by_reference(substr($app_icon, 1))[0];
$icon_stream = $apk->get_file($icon);
$base64_string = base64_encode(stream_get_contents($icon_stream));

printf("data:image/png;base64,%s", $base64_string);
```

Developers decide whether attribute values will hold references or actual values,
which means it is best to cover all cases for reliable results.


Acknowledgements
================
* the [**Androguard**](https://code.google.com/p/androguard/) project from which parts of the code was ported from
