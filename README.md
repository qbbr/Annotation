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
 * @value({1, 2, "text"}) [array]


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
     * @Array2(["omg", 2, 'omg', -20, false, true])
     *
     * @return string
     */
    public function index()
    {
        return 'test';
    }
}

require_once '../Annotation/Autoloader.php';
Q_Annotation_Autoloader::register();

$anotation = new Q_Annotation('Test', 'index');

print_r($anotation->getAnnotations());
```

**result:**

```php
Array
(
    [IssetValue] => 
    [BooleanValue] => 1
    [BooleanValue2] => 
    [IntegerValue] => 200
    [IntegerValue2] => -200
    [FloatValue] => -3.141592
    [FloatValue2] => 3.141592
    [StringValue] => omg its text
    [StringValue2] => omg its text
    [Array] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 3
        )

    [Array2] => Array
        (
            [0] => omg
            [1] => 2
            [2] => omg
            [3] => -20
            [4] => false
            [5] => true
        )
)
```
