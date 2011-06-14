<?php
/**
 * Abstract
 *
 * @package Q_Annotation
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @copyright Copyright (c) 2011, qbbr
 */
abstract class Q_Annotation_Parser_Abstract
{
    protected $_docComment;

    /**
     * @param string $docComment
     */
    public function __construct($docComment)
    {
        $this->_docComment = $docComment;
    }

    /**
     * @return array
     */
    abstract public function getAnnotations();
}