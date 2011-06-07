<?php
/**
 * Isset
 *
 * @package Q_Annotation
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Annotation_Parser_Isset extends Q_Annotation_Parser_Abstract
{
    public function getAnnotations()
    {
        preg_match_all('!@([a-zA-Z0-9]+)\n!', $this->_docComment, $matchesarray);
        
        if (!isset($matchesarray[1])) return array();
        
        $array = $matchesarray[1];
        
        $returnArray = array();
        foreach ($array as $value) {
            $returnArray[$value] = null;
        }
        
        return $returnArray;
    }
}