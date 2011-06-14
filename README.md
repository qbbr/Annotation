Q_Annotation
============

Usage
-----

```php
require_once 'Annotation/Autoloader.php';
Q_Annotation_Autoloader::register();

$anotation = new Q_Annotation('Class', 'method');

var_dump($anotation->hasAnnotation('name'));
var_dump($anotation->getAnnotation('name'));
var_dump($anotation->getAnnotations());
```


Available annotation types
--------------------------

 * @value [isset]
 * @value(true) [boolean]
 * @value(-20) [integer]
 * @value(-20.2000) [float]
 * @value('string') [string]
 * @value([1, 2, "text"]) [array]


Example
-------

```php
class Test
{
    /**
     * @IssetValue
     *
     * @BooleanValue(true)
     * @BooleanValue2(false)
     *
     * @IntegerValue(200)
     * @IntegerValue2(-200)
     *
     * @FloatValue(-3.141592)
     * @FloatValue2(3.141592)
     *
     * @StringValue("omg its text")
     * @StringValue2('omg its text')
     *
     * @Array([1, 2, 3])
     * @Array2(["omg", 2, 'omg', -20, false, true, 3.141592, -3.141592])
     *
     * @return string
     */
    public function index()
    {
        return 'test';
    }
}

require_once 'Annotation/Autoloader.php';
Q_Annotation_Autoloader::register();

$anotation = new Q_Annotation('Test', 'index');

var_dump($anotation->getAnnotations());
```

**result:**

```php

array(11) {
  ["IssetValue"]=>
  NULL
  ["BooleanValue"]=>
  bool(true)
  ["BooleanValue2"]=>
  bool(false)
  ["IntegerValue"]=>
  int(200)
  ["IntegerValue2"]=>
  int(-200)
  ["FloatValue"]=>
  float(-3.141592)
  ["FloatValue2"]=>
  float(3.141592)
  ["StringValue"]=>
  string(12) "omg its text"
  ["StringValue2"]=>
  string(12) "omg its text"
  ["Array"]=>
  array(3) {
    [0]=>
    int(1)
    [1]=>
    int(2)
    [2]=>
    int(3)
  }
  ["Array2"]=>
  array(8) {
    [0]=>
    string(3) "omg"
    [1]=>
    int(2)
    [2]=>
    string(3) "omg"
    [3]=>
    int(-20)
    [4]=>
    bool(false)
    [5]=>
    bool(true)
    [6]=>
    float(3.141592)
    [7]=>
    float(-3.141592)
  }
}
```
