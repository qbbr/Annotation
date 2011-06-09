<?php
/**
 * Annotation
 *
 * @package Q_Annotation
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Annotation
{
    protected $_reflection = null;
    protected $_annotations = array();

    /**
     * @param string $class
     * @param string $method
     */
    public function __construct($class, $method = null)
    {
        $reflectionClass = new ReflectionClass($class);

        if (null !== $method) {
            if (false === $reflectionClass->hasMethod($method)) {
                throw new Q_Annotation_Exception("Method {$method} is not defined in {$class} class ");
            }
            $this->_reflection = $reflectionClass->getMethod($method);
        } else {
            $this->_reflection = $reflectionClass;
        }

        $this->parse();
    }

    protected function parse()
    {
        $parser = new Q_Annotation_Parser($this->_reflection->getDocComment());
        $this->_annotations = $parser->getAnnotations();
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function hasAnnotation($name)
    {
        return array_key_exists($name, $this->_annotations);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getAnnotation($name)
    {
        if (false === $this->hasAnnotation($name)) {
            throw new Q_Annotation_Exception("Annotation `{$name}` not found");
        }

        return $this->_annotations[$name];
    }

    /**
     * @return array
     */
    public function getAnnotations()
    {
        return $this->_annotations;
    }
}
