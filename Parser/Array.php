<?php
/**
 * Array
 *
 * @package Q_Annotation
 * @author Sokolov Innokenty, <sokolov.innokenty@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT License
 * @copyright Copyright (c) 2011, qbbr
 */
class Q_Annotation_Parser_Array extends Q_Annotation_Parser_Abstract
{
    public function getAnnotations()
    {
        preg_match_all('!@([a-zA-Z0-9]+)\(\[(.*)\]\)!', $this->_docComment, $matchesarray);

        if (!isset($matchesarray[1])) return array();

        $returnArray = array();
        foreach ($matchesarray[1] as $key => $value) {
            $array = explode(',', $matchesarray[2][$key]);
            $returnArray[$value] = array_map(array($this, 'map'), $array);
        }

        return $returnArray;
    }

    protected function map($value)
    {
        return $this->fixType(trim($value));
    }

    protected function fixType($var)
    {
        if (is_numeric($var)) {
            if (false === strpos($var, '.')) {
                $var = (integer) $var;
            } else {
                $var = (float) $var;
            }
        } else if ($var === "false") {
            $var = false;
        } else if ($var === "true") {
            $var = true;
        } else {
            $var = trim($var, '"\'');
        }

        return $var;
    }
}
