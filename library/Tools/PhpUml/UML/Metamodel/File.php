<?php
/**
 * PHP_UML (MOF-like metamodel of language PHP)
 *
 * PHP version 5
 * 
 * @category   PHP
 * @package    PHP_UML
 * @subpackage Metamodel
 * @author     Baptiste Autin <ohlesbeauxjours@yahoo.fr> 
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @version    SVN: $Revision: 97 $
 * @link       http://pear.php.net/package/PHP_UML
 * @since      $Date: 2009-01-04 21:57:08 +0100 (dim., 04 janv. 2009) $
 */

/**
 * Meta-File
 *
 */
class PHP_UML_Metamodel_File extends PHP_UML_Metamodel_NamedElement
{
    /**
     * Array of classes/interfaces declarations contained in that file
     *
     * @var array
     */
    public $manifested = array();
}
?>
