<?php
/**
 * Parser
 *
 * @package Q_Annotation
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Annotation_Parser
{
    protected $_docComment;
    protected $_annotations = array();

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
    public function getAnnotations()
    {
        $this->parse(new Q_Annotation_Parser_Isset($this->_docComment));
        $this->parse(new Q_Annotation_Parser_Boolean($this->_docComment));
        $this->parse(new Q_Annotation_Parser_Integer($this->_docComment));
        $this->parse(new Q_Annotation_Parser_Float($this->_docComment));
        $this->parse(new Q_Annotation_Parser_String($this->_docComment));
        $this->parse(new Q_Annotation_Parser_Array($this->_docComment));

        return $this->_annotations;
    }

    /**
     * @param Q_Annotation_Parser_Abstract $parser
     */
    protected function parse(Q_Annotation_Parser_Abstract $parser)
    {
        $this->_annotations = array_merge($this->_annotations, $parser->getAnnotations());
    }
}