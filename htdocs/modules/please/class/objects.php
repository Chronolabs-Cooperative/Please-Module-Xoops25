<?php
/**
 * Please Addresses Ticketer of Batch Group & User Addressess
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   	The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     	General Public License version 3 (http://labs.coop/briefs/legal/general-public-licence/13,3.html)
 * @author      	Simon Roberts (wishcraft) <wishcraft@users.sourceforge.net>
 * @subpackage  	please
 * @description 	Addresses Ticking for Support/Faults/Management of Batch Group & User managed emails tickets
 * @version			1.0.5
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.5/Modules/please
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.6/Modules/please
 * @link			https://sourceforge.net/p/xoops/svn/HEAD/tree/XoopsModules/please
 * @link			http://internetfounder.wordpress.com
 */

if (!defined('_MI_PLEASE_MODULE_DIRNAME')) {
	return false;
}

//*
require_once (__DIR__ . DIRECTORY_SEPARATOR . 'objects.php');


/**
 * Class for Addresses in Please email ticketer
 * @author Simon Roberts (wishcraft@users.sourceforge.net)
 * @copyright copyright (c) 2015 labs.coop
 */
class pleaseXoopsObject extends XoopsObject
{
	/**
	 * (non-PHPdoc)
	 * @see XoopsObject::assignVar()
	 */
	function assignVar($key, $value)
	{
		if ($this->vars[$key]['data_type'] == XOBJ_DTYPE_OTHER) {
			parent::assignVar($key, pleaseDecompressData($value));
		} elseif (strpos($key, 'pass')||strpos($key, 'password')) {
			parent::assignVar($key, pleaseDecryptPassword($value, _PLEASE_SALT_BLOWFISH . _PLEASE_SALT_WHENSET));
		} else
			parent::assignVar($key, $value);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see XoopsObject::cleanVars()
	 */
	function cleanVars($object = null)
	{
		$ret = false;
		if (empty($object)||is_null($object))
			$object = self;
		if (is_a($object, "XoopsObject"))
			if ($ret = parent::cleanVars($object))
			{
				foreach(array_keys($object->vars) as $field)
				{
					if ($object->vars[$field]['data_type'] == XOBJ_DTYPE_OTHER) {
						$object->vars[$field]['value'] = pleaseCompressData($object->vars[$field]['value']);
					} elseif (strpos($field, 'pass')||strpos($field, 'password')) {
						$object->vars[$field]['value'] = pleaseEncryptPassword($object->vars[$field]['value'], _PLEASE_SALT_BLOWFISH . _PLEASE_SALT_WHENSET);
					}
				}
			}
		return $ret;
	}
}

/**
 * Handler Modelling Class for Addresses in Please email ticketer
 * @author Simon Roberts (wishcraft@users.sourceforge.net)
 * @copyright copyright (c) 2015 labs.coop
 */
class pleaseXoopsObjectHandler extends XoopsPersistableObjectHandler
{
	
	/**
	 * Class Constructor
	 * @param XoopsDB $db
	 * @param string $tbl
	 * @param string $child
	 * @param string $identity
	 * @param string $envalued
	 */
	function __construct(&$db, $tbl = '', $child = '', $identity = '', $envalued = '')
	{
		if (!object($db))
			$db = $GLOBAL["xoopsDB"];
		return parent::__construct($db, $tbl, $child, $identity, $envalued);
	}
}