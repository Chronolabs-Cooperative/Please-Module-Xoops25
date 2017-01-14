<?php
/**
 * Please Email Ticketer of Batch Group & User Emails
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
* @subpackage  	language
* @description 	Email Ticking for Support/Faults/Management of Batch Group & User managed emails tickets
* @version		1.0.5
* @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.5/Modules/please
* @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.6/Modules/please
* @link			https://sourceforge.net/p/xoops/svn/HEAD/tree/XoopsModules/please
* @link			http://internetfounder.wordpress.com
*/

function xoops_module_pre_install_please(&$module) {

	xoops_loadLanguage('modinfo', 'please');
	
	$groups_handler =& xoops_gethandler('group');
	$criteria = new Criteria('group_type', _MI_PLEASE_GROUP_TYPE_CLIENT);
	if (!$results = $groups_handler->getObjects($criteria)) {
		$group = $groups_handler->create();
		$group->setVar('name', _MI_PLEASE_GROUP_NAME_CLIENT);
		$group->setVar('description', _MI_PLEASE_GROUP_DESC_CLIENT);
		$group->setVar('group_type', _MI_PLEASE_GROUP_TYPE_CLIENT);
		$gc = $groups_handler->insert($group, true);
		$groupperm_handler =& xoops_gethandler('groupperm');
		$criteria = new Criteria('gperm_groupid', XOOPS_GROUP_USERS);
		if ($perms = $groupperm_handler->getObjects($criteria, true, true))
		{
			foreach ($perms as $id => $row )
			{
				unset($row['gperm_id']);
				$row['gperm_groupid'] = $gc;
				$obj = $groupperm_handler->create();
				$obj->setVars($row);
				$groupperm_handler->insert($obj, true);
			}
		}
	} else {
		foreach($results as $group)
			if (!isset($gc))
				$gc = $group->getVar('groupid');
	}

	$groups_handler =& xoops_gethandler('group');
	$criteria = new Criteria('group_type', _MI_PLEASE_GROUP_TYPE_STAFF);
	if (!$results = $groups_handler->getObjects($criteria)) {
		$group = $groups_handler->create();
		$group->setVar('name', _MI_PLEASE_GROUP_NAME_STAFF);
		$group->setVar('description', _MI_PLEASE_GROUP_DESC_STAFF);
		$group->setVar('group_type', _MI_PLEASE_GROUP_TYPE_STAFF);
		$gs = $groups_handler->insert($group, true);
		$groupperm_handler =& xoops_gethandler('groupperm');
		$criteria = new Criteria('gperm_groupid', XOOPS_GROUP_USERS);
		if ($perms = $groupperm_handler->getObjects($criteria, true, true))
		{
			foreach ($perms as $id => $row )
			{
				unset($row['gperm_id']);
				$row['gperm_groupid'] = $gs;
				$obj = $groupperm_handler->create();
				$obj->setVars($row);
				$groupperm_handler->insert($obj, true);
			}
		}
	} else {
		foreach($results as $group)
			if (!isset($gs))
				$gs = $group->getVar('groupid');
	}

	$groups_handler =& xoops_gethandler('group');
	$criteria = new Criteria('group_type', _MI_PLEASE_GROUP_TYPE_MANAGER);
	if (!$results = $groups_handler->getObjects($criteria)) {
		$group = $groups_handler->create();
		$group->setVar('name', _MI_PLEASE_GROUP_NAME_MANAGER);
		$group->setVar('description', _MI_PLEASE_GROUP_DESC_MANAGER);
		$group->setVar('group_type', _MI_PLEASE_GROUP_TYPE_MANAGER);
		$gm = $groups_handler->insert($group, true);
		$groupperm_handler =& xoops_gethandler('groupperm');
		$criteria = new Criteria('gperm_groupid', XOOPS_GROUP_USERS);
		if ($perms = $groupperm_handler->getObjects($criteria, true, true))
		{
			foreach ($perms as $id => $row )
			{
				unset($row['gperm_id']);
				$row['gperm_groupid'] = $gm;
				$obj = $groupperm_handler->create();
				$obj->setVars($row);
				$groupperm_handler->insert($obj, true);
			}
		}
	} else {
		foreach($results as $group)
			if (!isset($gm))
				$gm = $group->getVar('groupid');
	}
	
	// Record the Group ID again constants
	if (is_file(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'groups.php'))
		unlink(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'groups.php');
	$php = file_get_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'groups.php.tpl');
	file_put_contents(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'groups.php', str_replace('%whenset%', date("D, d M Y, H:i:s"), str_replace('%salt%', please_install_generate_salt(), str_replace('%client%', $gc, str_replace('%staff%', $gs, str_replace('%manager%, $gm, $php'))))));
	return true;
}
	
function xoops_module_install_please(&$module) {
	
	
}

function please_install_generate_salt()
{
	$salt = '';
	mt_srand(mt_rand(-microtime(true), microtime(true)));
	mt_srand(mt_rand(-microtime(true), microtime(true)));
	mt_srand(mt_rand(-microtime(true), microtime(true)));
	mt_srand(mt_rand(-microtime(true), microtime(true)));
	while (strlen($salt)<mt_rand(256,2048))
	{
		mt_srand(mt_rand(-microtime(true), microtime(true)));
		switch((string)mt_rand(0,3))
		{
			default:
				$salt .= chr(mt_rand(ord("-"), ord("|")));
				break;
			case "1":
				$salt .= chr(mt_rand(ord("A"), ord("Z")));
				break;
			case "2":
				$salt .= chr(mt_rand(ord("a"), ord("z")));
				break;
			case "2":
				$salt .= chr(mt_rand(ord("0"), ord("9")));
				break;
		}
	}
	return $salt;
}
?>