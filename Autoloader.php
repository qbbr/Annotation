<?php
/**
 * Autoloads Q_Annotation classes
 *
 * @package Q_Annotation
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Annotation_Autoloader
{
    /**
     * Registers Q_Annotation_Autoloader as an SPL autoloader
     */
    static public function register()
    {
        ini_set('unserialize_callback_func', 'spl_autoload_call');
        spl_autoload_register(array(new self, 'autoload'));
    }

    /**
     * Handles autoloading of classes.
     *
     * @param string $class Class name
     * @return boolean Returns true if the class has been loaded
     */
    static public function autoload($class)
    {
        if (0 !== strpos($class, 'Q_Annotation')) {
            return;
        }

        if ($class == 'Q_Annotation') {
            $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Annotation.php';
        } else {
            $file = dirname(dirname(__FILE__))  . DIRECTORY_SEPARATOR
                  . str_replace('_', DIRECTORY_SEPARATOR, str_replace('Q_', '', $class)) . '.php';
        }

        if (file_exists($file)) {
            require $file;
        }
    }
}