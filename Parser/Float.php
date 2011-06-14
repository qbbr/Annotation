<?php
/**
 * Float
 *
 * @package Q_Annotation
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Annotation_Parser_Float extends Q_Annotation_Parser_Abstract
{
    public function getAnnotations()
    {
        preg_match_all('!@([a-zA-Z0-9]+)\((-?\d+\.\d+)\)!', $this->_docComment, $matchesarray);

        if (!isset($matchesarray[1])) return array();

        $returnArray = array();
        foreach ($matchesarray[1] as $key => $value) {
            $returnArray[$value] = (float) $matchesarray[2][$key];
        }

        return $returnArray;
    }
}