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
 * @subpackage  	please
 * @description 	Email Ticking for Support/Faults/Management of Batch Group & User managed emails tickets
 * @version			1.0.5
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.5/Modules/please
 * @link        	https://sourceforge.net/projects/chronolabs/files/XOOPS%202.6/Modules/please
 * @link			https://sourceforge.net/p/xoops/svn/HEAD/tree/XoopsModules/please
 * @link			http://internetfounder.wordpress.com
 */

if (!defined('XOOPS_ROOT_PATH')) {
	die('XOOPS root path not defined');
}

if (!defined(_MI_PLEASE_MODULE_DIRNAME))
	define('_MI_PLEASE_MODULE_DIRNAME', basename(__DIR__));
	
global $pleaseModule, $pleaseConfigsList, $pleaseConfigs, $pleaseConfigsOptions;

if (empty($pleaseModule))
{
	if (is_a($pleaseModule = xoops_gethandler('module')->getByDirname(_MI_PLEASE_MODULE_DIRNAME), "XoopsModule"))
	{
		if (empty($pleaseConfigsList))
		{
			$pleaseConfigsList = xoops_gethandler('config')->getConfigsList($pleaseModule->getVar('mid'));
		}
		if (empty($pleaseConfigs))
		{
			$pleaseConfigs = xoops_gethandler('config')->getConfigs(new Criteria('conf_modid', $pleaseModule->getVar('mid')));
		}
		if (empty($pleaseConfigsOptions) && !empty($pleaseConfigs))
		{
			foreach($pleaseConfigs as $key => $config)
				$pleaseConfigsOptions[$config->getVar('conf_name')] = $config->getConfigOptions(new Criteria('conf_id', $config->getVar('conf_id')));
		}
	}
}

$modversion['dirname'] 					= _MI_PLEASE_MODULE_DIRNAME;
$modversion['name'] 					= _MI_PLEASE_MODULE_NAME;
$modversion['version']     				= _MI_PLEASE_MODULE_VERSION;
$modversion['releasedate'] 				= _MI_PLEASE_MODULE_RELEASEDATE;
$modversion['status']      				= _MI_PLEASE_MODULE_STATUS;
$modversion['description'] 				= _MI_PLEASE_MODULE_DESCRIPTION;
$modversion['credits']     				= _MI_PLEASE_MODULE_CREDITS;
$modversion['author']      				= _MI_PLEASE_MODULE_AUTHORALIAS;
$modversion['help']        				= _MI_PLEASE_MODULE_HELP;
$modversion['license']     				= _MI_PLEASE_MODULE_LICENCE;
$modversion['official']    				= _MI_PLEASE_MODULE_OFFICAL;
$modversion['image']       				= _MI_PLEASE_MODULE_ICON;
$modversion['module_status'] 			= _MI_PLEASE_MODULE_STATUS;
$modversion['website'] 					= _MI_PLEASE_MODULE_WEBSITE;
$modversion['dirmoduleadmin'] 			= _MI_PLEASE_MODULE_ADMINMODDIR;
$modversion['icons16'] 					= _MI_PLEASE_MODULE_ADMINICON16;
$modversion['icons32'] 					= _MI_PLEASE_MODULE_ADMINICON32;
$modversion['release_info'] 			= _MI_PLEASE_MODULE_RELEASEINFO;
$modversion['release_file'] 			= _MI_PLEASE_MODULE_RELEASEFILE;
$modversion['release_date'] 			= _MI_PLEASE_MODULE_RELEASEDATE;
$modversion['author_realname'] 			= _MI_PLEASE_MODULE_AUTHORREALNAME;
$modversion['author_website_url'] 		= _MI_PLEASE_MODULE_AUTHORWEBSITE;
$modversion['author_website_name'] 		= _MI_PLEASE_MODULE_AUTHORSITENAME;
$modversion['author_email'] 			= _MI_PLEASE_MODULE_AUTHOREMAIL;
$modversion['author_word'] 				= _MI_PLEASE_MODULE_AUTHORWORD;
$modversion['status_version'] 			= _MI_PLEASE_MODULE_VERSION;
$modversion['warning'] 					= _MI_PLEASE_MODULE_WARNINGS;
$modversion['demo_site_url'] 			= _MI_PLEASE_MODULE_DEMO_SITEURL;
$modversion['demo_site_name'] 			= _MI_PLEASE_MODULE_DEMO_SITENAME;
$modversion['support_site_url'] 		= _MI_PLEASE_MODULE_SUPPORT_SITEURL;
$modversion['support_site_name'] 		= _MI_PLEASE_MODULE_SUPPORT_SITENAME;
$modversion['submit_feature'] 			= _MI_PLEASE_MODULE_SUPPORT_FEATUREREQUEST;
$modversion['submit_bug'] 				= _MI_PLEASE_MODULE_SUPPORT_BUGREPORTING;
$modversion['people']['developers'] 	= explode("|", _MI_PLEASE_MODULE_DEVELOPERS);
$modversion['people']['testers']		= explode("|", _MI_PLEASE_MODULE_TESTERS);
$modversion['people']['translaters']	= explode("|", _MI_PLEASE_MODULE_TRANSLATERS);
$modversion['people']['documenters']	= explode("|", _MI_PLEASE_MODULE_DOCUMENTERS);

// Requirements
$modversion['min_php']        			= '5.3.7';
$modversion['min_xoops']      			= '2.5.7';
$modversion['min_db']         			= array('mysql' => '5.0.7', 'mysqli' => '5.0.7');
$modversion['min_admin']      			= '1.1';

// Database SQL File and Tables
$modversion['sqlfile']['mysql'] 		= "sql/mysqli.sql";
$modversion['tables']	 				= file(__DIR__ . DIRECTORY_SEPARATOR . 'sql' . DIRECTORY_SEPARATOR . 'tables.diz');

//Search
$modversion['hasSearch'] 				= _MI_PLEASE_MODULE_HASSEARCH;
//$modversion['search']['file'] 		= "include/search.inc.php";
//$modversion['search']['func'] 		= "publisher_search";

// Main
$modversion['hasMain'] 					= _MI_PLEASE_MODULE_HASMAIN;
	
// Admin
$modversion['hasAdmin'] 				= _MI_PLEASE_MODULE_HASADMIN;
//$modversion['adminindex']  			= "admin/index.php";
//$modversion['adminmenu']   			= "admin/menu.php";
//$modversion['system_menu'] 			= 1;

// Comments
$modversion['hasComments'] 				= _MI_PLEASE_MODULE_HASCOMMENTS;
//$modversion['comments']['itemName'] = 'itemid';
//$modversion['comments']['pageName'] = 'item.php';
//$modversion['comments']['callbackFile']        = 'include/comment_functions.php';
//$modversion['comments']['callback']['approve'] = 'publisher_com_approve';
//$modversion['comments']['callback']['update']  = 'publisher_com_update';

// Add extra menu items
//$modversion['sub'][3]['name'] = _MI_PLEASE_SUB_ARCHIVE;
//$modversion['sub'][3]['url']  = "archive.php";


// Create Block Constant Defines
$i = 0;
++$i;
//$modversion['blocks'][$i]['file']        = "items_new.php";
//$modversion['blocks'][$i]['name']        = _MI_PLEASE_ITEMSNEW;
//$modversion['blocks'][$i]['description'] = _MI_PLEASE_ITEMSNEW_DSC;
//$modversion['blocks'][$i]['show_func']   = "publisher_items_new_show";
//$modversion['blocks'][$i]['edit_func']   = "publisher_items_new_edit";
//$modversion['blocks'][$i]['options']     = "0|datesub|0|5|65|none";
//$modversion['blocks'][$i]['template']    = "publisher_items_new.tpl";


// Templates
$i = 0;
$modversion['templates'][$i]['file'] = 'noticer_index.html';
$modversion['templates'][$i]['description'] = 'Honeypot noticer Template';
$i++;
$modversion['templates'][$i]['file'] = 'noticer_results.html';
$modversion['templates'][$i]['description'] = 'Honeypot noticer results';

// Config categories
$modversion['configcat']['seo']['name']        = _MI_PLEASE_CONFCAT_SEO;
$modversion['configcat']['seo']['description'] = _MI_PLEASE_CONFCAT_SEO_DESC;

$modversion['configcat']['email']['name']        = _MI_PLEASE_CONFCAT_EMAIL;
$modversion['configcat']['email']['description'] = _MI_PLEASE_CONFCAT_EMAIL_DESC;

$modversion['configcat']['systems']['name']        = _MI_PLEASE_CONFCAT_SYSTEMS;
$modversion['configcat']['systems']['description'] = _MI_PLEASE_CONFCAT_SYSTEMS_DESC;

$modversion['configcat']['reports']['name']        = _MI_PLEASE_CONFCAT_REPORTS;
$modversion['configcat']['reports']['description'] = _MI_PLEASE_CONFCAT_REPORTS_DESC;

$modversion['configcat']['offline']['name']        = _MI_PLEASE_CONFCAT_OFFLINE;
$modversion['configcat']['offline']['description'] = _MI_PLEASE_CONFCAT_OFFLINE_DESC;

// Config categories
$i=0;
++$i;
$modversion['config'][$i]['name']        = 'htaccess';
$modversion['config'][$i]['title']       = '_MI_PLEASE_HTACCESS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_HTACCESS_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'seo';
++$i;
$modversion['config'][$i]['name']        = 'base';
$modversion['config'][$i]['title']       = '_MI_PLEASE_BASE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_BASE_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'seo';
++$i;
$modversion['config'][$i]['name']        = 'html';
$modversion['config'][$i]['title']       = '_MI_PLEASE_HTML';
$modversion['config'][$i]['description'] = '_MI_PLEASE_HTML_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'html';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'seo';
++$i;
$modversion['config'][$i]['name']        = 'rss';
$modversion['config'][$i]['title']       = '_MI_PLEASE_RSS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_RSS_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'html';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'seo';

++$i;
$modversion['config'][$i]['name']        = 'email_method';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILMETHOD';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILMETHOD_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'class';
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_EMAILMETHOD_PHP => 'class', 
													_MI_PLEASE_EMAILMETHOD_PHP => 'extention'		);
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'email_typal';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILTYPAL';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILTYPAL_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'imap';
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_EMAILTYPAL_IMAP => 'imap', 
													_MI_PLEASE_EMAILTYPAL_POP3 => 'pop3'			);
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'email_service';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILSERVICE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILSERVICE_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'imap.'.parse_url(XOOPS_URL, PHP_URL_HOST);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'email_port';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILPORT';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILPORT_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = '993';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'email_user';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILUSER';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILUSER_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'ticketpls@'.parse_url(XOOPS_URL, PHP_URL_HOST);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'email_pass';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILPASS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILPASS_DESC';
$modversion['config'][$i]['formtype']    = 'password';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = '';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'email_folder';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILFOLDER';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILFOLDER_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array()';
$modversion['config'][$i]['default']     = array('DEFAULT');
$modversion['config'][$i]['options']     = (count(	$inboxes = please_getMailboxInboxes())	>	0	?	
													$inboxes	:	
													array(	_MI_PLEASE_EMAILFOLDER_DEFAULT => 'DEFAULT')		);
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'email_reply_addy';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILREPLYADDY';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILREPLYADDY_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'ticketpls@'.parse_url(XOOPS_URL, PHP_URL_HOST);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'email_reply_name';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILREPLYNAME';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILREPLYNAME_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = "[%username%] ~ [%sitename%]";
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'email_attachments';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILATTACHMENTS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILATTACHMENTS_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = true;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'email_signature';
$modversion['config'][$i]['title']       = '_MI_PLEASE_EMAILSIGNATURE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_EMAILSIGNATURE_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = true;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'email';
++$i;
$modversion['config'][$i]['name']        = 'salting';
$modversion['config'][$i]['title']       = '_MI_PLEASE_SALTING';
$modversion['config'][$i]['description'] = '_MI_PLEASE_SALTING_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array("please", "department", "owner", "item");
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_SALTING_PLEASE => "please", 
													_MI_PLEASE_SALTING_SYSTEM => "system", 
													_MI_PLEASE_SALTING_DEPARTMENTAL => "department", 
													_MI_PLEASE_SALTING_CLIENT => "client",
													_MI_PLEASE_SALTING_OWNER => "owner", 
													_MI_PLEASE_SALTING_ITEM => "item", 
													_MI_PLEASE_SALTING_DATE => "date"					);
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'ticketers';
$modversion['config'][$i]['title']       = '_MI_PLEASE_TICKETERS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_TICKETERS_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'ticketers_groups';
$modversion['config'][$i]['title']       = '_MI_PLEASE_TICKETERS_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_TICKETERS_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(		XOOPS_GROUP_USERS => XOOPS_GROUP_USERS			);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'ticketers_only';
$modversion['config'][$i]['title']       = '_MI_PLEASE_TICKETERS_ONLY';
$modversion['config'][$i]['description'] = '_MI_PLEASE_TICKETERS_ONLY_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	XOOPS_GROUP_USER => XOOPS_GROUP_USER, 
													XOOPS_GROUP_ANONYMOUS => XOOPS_GROUP_ANONYMOUS	);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'staff';
$modversion['config'][$i]['title']       = '_MI_PLEASE_STAFF';
$modversion['config'][$i]['description'] = '_MI_PLEASE_STAFF_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'staff_groups';
$modversion['config'][$i]['title']       = '_MI_PLEASE_STAFF_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_STAFF_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_IN_PLEASE_GROUP_STAFF => _IN_PLEASE_GROUP_STAFF		);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'staff_only';
$modversion['config'][$i]['title']       = '_MI_PLEASE_STAFF_ONLY';
$modversion['config'][$i]['description'] = '_MI_PLEASE_STAFF_ONLY_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_IN_PLEASE_GROUP_MANAGER => _IN_PLEASE_GROUP_MANAGER, 
													_IN_PLEASE_GROUP_STAFF => _IN_PLEASE_GROUP_STAFF, 
													XOOPS_GROUP_ADMIN => XOOPS_GROUP_ADMIN			);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'support';
$modversion['config'][$i]['title']       = '_MI_PLEASE_SUPPORT';
$modversion['config'][$i]['description'] = '_MI_PLEASE_SUPPORT_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'support_groups';
$modversion['config'][$i]['title']       = '_MI_PLEASE_SUPPORT_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_SUPPORT_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_IN_PLEASE_GROUP_STAFF => _IN_PLEASE_GROUP_STAFF, 
													_IN_PLEASE_GROUP_SUPPORT => _IN_PLEASE_GROUP_SUPPORT	);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'support_only';
$modversion['config'][$i]['title']       = '_MI_PLEASE_SUPPORT_ONLY';
$modversion['config'][$i]['description'] = '_MI_PLEASE_SUPPORT_ONLY_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_IN_PLEASE_GROUP_MANAGER => _IN_PLEASE_GROUP_MANAGER, 
													_IN_PLEASE_GROUP_STAFF => _IN_PLEASE_GROUP_STAFF, 
													_IN_PLEASE_GROUP_SUPPORT => PLEASE_GROUP_SUPPORT, 
													XOOPS_GROUP_ADMIN => XOOPS_GROUP_ADMIN			);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'manager';
$modversion['config'][$i]['title']       = '_MI_PLEASE_MANAGER';
$modversion['config'][$i]['description'] = '_MI_PLEASE_MANAGER_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'manager_groups';
$modversion['config'][$i]['title']       = '_MI_PLEASE_MANAGER_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_MANAGER_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_IN_PLEASE_GROUP_MANAGER => _IN_PLEASE_GROUP_MANAGER, 
													_IN_PLEASE_GROUP_SUPPORT => _IN_PLEASE_GROUP_SUPPORT, 
													_IN_PLEASE_GROUP_STAFF => _IN_PLEASE_GROUP_STAFF 		);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'manager_only';
$modversion['config'][$i]['title']       = '_MI_PLEASE_MANAGER_ONLY';
$modversion['config'][$i]['description'] = '_MI_PLEASE_MANAGER_ONLY_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_IN_PLEASE_GROUP_MANAGER => _IN_PLEASE_GROUP_MANAGER, 
													_IN_PLEASE_GROUP_SUPPORT => _IN_PLEASE_GROUP_SUPPORT, 
													_IN_PLEASE_GROUP_STAFF => _IN_PLEASE_GROUP_STAFF, 
													XOOPS_GROUP_ADMIN => XOOPS_GROUP_ADMIN			);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'reportee';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTEE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTEE_DESC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = false;
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'reportee_groups';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTEE_GROUPS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTEE_GROUPS_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_IN_PLEASE_GROUP_REPORTEE => _IN_PLEASE_GROUP_REPORTEE	);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'reportee_only';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTEE_ONLY';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTEE_ONLY_DESC';
$modversion['config'][$i]['formtype']    = 'group_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_IN_PLEASE_GROUP_MANAGER => _IN_PLEASE_GROUP_MANAGER, 
													_IN_PLEASE_GROUP_SUPPORT => _IN_PLEASE_GROUP_SUPPORT, 
													_IN_PLEASE_GROUP_STAFF => _IN_PLEASE_GROUP_STAFF, 
													_IN_PLEASE_GROUP_REPORTEE => _IN_PLEASE_GROUP_REPORTEE,
													XOOPS_GROUP_ADMIN => XOOPS_GROUP_ADMIN, 
													XOOPS_GROUP_USER => XOOPS_GROUP_USER, 
													XOOPS_GROUP_ANONYMOUS => XOOPS_GROUP_ANONYMOUS	);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'cron_method';
$modversion['config'][$i]['title']       = '_MI_PLEASE_CRON_METHOD';
$modversion['config'][$i]['description'] = '_MI_PLEASE_CRON_METHOD_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_CRON_METHOD_PRELOADS =>	_MI_PLEASE_CRON_METHOD_PRELOADS 	);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_CRON_METHOD_PRELOADS_DESC =>	_MI_PLEASE_CRON_METHOD_PRELOADS, 
													_MI_PLEASE_CRON_METHOD_SCHEDULE_DESC =>	_MI_PLEASE_CRON_METHOD_SCHEDULE	);
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'reports_ticketer_heights';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_TICKETER_HEIGHTS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_TICKETER_HEIGHTS_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_ticketer_heights', 0, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_ticketer_heights', $toll, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_ticketer_lowes';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_TICKETER_LOWES';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_TICKETER_LOWES_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_ticketer_lowes', 0, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_ticketer_lowes', $toll, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_ticketer_run';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_TICKETER_RUN';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_TICKETER_RUN_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORTS_TICKET_OPENED_DESC => _MI_PLEASE_REPORTS_TICKET_OPENED,
													_MI_PLEASE_REPORTS_TICKET_SPAM => _MI_PLEASE_REPORTS_SPAM,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED			);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORTS_TICKET_SPAM_DESC => _MI_PLEASE_REPORTS_TICKET_SPAM,
													_MI_PLEASE_REPORTS_TICKET_OPEN_DESC => _MI_PLEASE_REPORTS_TICKET_OPEN,
													_MI_PLEASE_REPORTS_TICKET_CLAIMED_DESC => _MI_PLEASE_REPORTS_TICKET_CLAIMED,	
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED,
													_MI_PLEASE_REPORTS_TICKETS_STAFF_DESC => _MI_PLEASE_REPORTS_TICKETS_STAFF,
													_MI_PLEASE_REPORTS_TICKETS_MANAGER_DESC => _MI_PLEASE_REPORTS_TICKETS_MANAGER,
													_MI_PLEASE_REPORTS_TICKETS_DEPARTMENT_DESC => _MI_PLEASE_REPORTS_TICKETS_DEPARTMENT,
													_MI_PLEASE_REPORTS_TICKETS_MANTIS_DESC => _MI_PLEASE_REPORTS_TICKETS_MANTIS,
													_MI_PLEASE_REPORTS_MANTIS_OPENED_DESC => _MI_PLEASE_REPORTS_MANTIS_OPENED,
													_MI_PLEASE_REPORTS_MANTIS_ASSIGNED_DESC => _MI_PLEASE_REPORTS_MANTIS_ASSIGNED,		
													_MI_PLEASE_REPORTS_MANTIS_STATUS_DESC => _MI_PLEASE_REPORTS_MANTIS_STATUS,	
													_MI_PLEASE_REPORTS_MANTIS_RESPONDED_DESC => _MI_PLEASE_REPORTS_MANTIS_RESPONDED,
													_MI_PLEASE_REPORTS_MANTIS_REPONSEREQ_DESC => _MI_PLEASE_REPORTS_MANTIS_REPONSEREQ,
													_MI_PLEASE_REPORTS_MANTIS_CLOSED_DESC => _MI_PLEASE_REPORTS_MANTIS_CLOSED				);
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_ticketer_schedule';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_TICKETER_SCHEDULE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_TICKETER_SCHEDULE_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORT_SCHEDULE_INSTANCE => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY => _MI_PLEASE_SCHEDULE_WEEKLY							);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORT_SCHEDULE_TOP20_DESC => _MI_PLEASE_REPORT_TOP20_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_HIGHLIGHTS_DESC => _MI_PLEASE_REPORT_HIGHLIGHTS_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_INSTANCE_DESC => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_DAILY_DESC => _MI_PLEASE_SCHEDULE_DAILY,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY_DESC => _MI_PLEASE_SCHEDULE_WEEKLY,
													_MI_PLEASE_REPORT_SCHEDULE_FORTNIGHTLY_DESC => _MI_PLEASE_SCHEDULE_FORTNIGHTLY,
													_MI_PLEASE_REPORT_SCHEDULE_MONTHLY_DESC => _MI_PLEASE_SCHEDULE_MONTHLY,
													_MI_PLEASE_REPORT_SCHEDULE_QUARTERLY_DESC => _MI_PLEASE_SCHEDULE_QUARTERLY,
													_MI_PLEASE_REPORT_SCHEDULE_ANNUALLY_DESC => _MI_PLEASE_SCHEDULE_ANNUALLY				);
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_ticketee_heights';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_TICKETEE_HEIGHTS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_TICKETEE_HEIGHTS_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_ticketee_heights', 0, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_ticketee_heights', $toll, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_ticketee_lowes';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_TICKETEE_LOWES';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_TICKETEE_LOWES_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_ticketee_lowes', 0, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_ticketee_lowes', $toll, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_ticketee_run';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_TICKETEE_RUN';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_TICKETEE_RUN_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORTS_TICKET_OPENED_DESC => _MI_PLEASE_REPORTS_TICKET_OPENED,
													_MI_PLEASE_REPORTS_TICKET_SPAM => _MI_PLEASE_REPORTS_SPAM,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED			);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORTS_TICKET_SPAM_DESC => _MI_PLEASE_REPORTS_TICKET_SPAM,
													_MI_PLEASE_REPORTS_TICKET_OPEN_DESC => _MI_PLEASE_REPORTS_TICKET_OPEN,
													_MI_PLEASE_REPORTS_TICKET_CLAIMED_DESC => _MI_PLEASE_REPORTS_TICKET_CLAIMED,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED,
													_MI_PLEASE_REPORTS_TICKETS_STAFF_DESC => _MI_PLEASE_REPORTS_TICKETS_STAFF,
													_MI_PLEASE_REPORTS_TICKETS_MANAGER_DESC => _MI_PLEASE_REPORTS_TICKETS_MANAGER,
													_MI_PLEASE_REPORTS_TICKETS_DEPARTMENT_DESC => _MI_PLEASE_REPORTS_TICKETS_DEPARTMENT,
													_MI_PLEASE_REPORTS_TICKETS_MANTIS_DESC => _MI_PLEASE_REPORTS_TICKETS_MANTIS,
													_MI_PLEASE_REPORTS_MANTIS_OPENED_DESC => _MI_PLEASE_REPORTS_MANTIS_OPENED,
													_MI_PLEASE_REPORTS_MANTIS_ASSIGNED_DESC => _MI_PLEASE_REPORTS_MANTIS_ASSIGNED,
													_MI_PLEASE_REPORTS_MANTIS_STATUS_DESC => _MI_PLEASE_REPORTS_MANTIS_STATUS,
													_MI_PLEASE_REPORTS_MANTIS_RESPONDED_DESC => _MI_PLEASE_REPORTS_MANTIS_RESPONDED,
													_MI_PLEASE_REPORTS_MANTIS_REPONSEREQ_DESC => _MI_PLEASE_REPORTS_MANTIS_REPONSEREQ,
													_MI_PLEASE_REPORTS_MANTIS_CLOSED_DESC => _MI_PLEASE_REPORTS_MANTIS_CLOSED				);
$modversion['config'][$i]['category']    = 'systems';
++$i;
$modversion['config'][$i]['name']        = 'reports_staff_heights';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_STAFF_HEIGHTS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_STAFF_HEIGHTS_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_staff_heights', 0, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_staff_heights', $toll, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_staff_lowes';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_STAFF_LOWES';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_STAFF_LOWES_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_staff_lowes', 0, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_staff_lowes', $toll, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_staff_run';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_STAFF_RUN';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_STAFF_RUN_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORTS_TICKET_OPENED_DESC => _MI_PLEASE_REPORTS_TICKET_OPENED,
													_MI_PLEASE_REPORTS_TICKET_SPAM => _MI_PLEASE_REPORTS_SPAM,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED			);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORTS_TICKET_SPAM_DESC => _MI_PLEASE_REPORTS_TICKET_SPAM,
													_MI_PLEASE_REPORTS_TICKET_OPEN_DESC => _MI_PLEASE_REPORTS_TICKET_OPEN,
													_MI_PLEASE_REPORTS_TICKET_CLAIMED_DESC => _MI_PLEASE_REPORTS_TICKET_CLAIMED,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED,
													_MI_PLEASE_REPORTS_TICKETS_STAFF_DESC => _MI_PLEASE_REPORTS_TICKETS_STAFF,
													_MI_PLEASE_REPORTS_TICKETS_MANAGER_DESC => _MI_PLEASE_REPORTS_TICKETS_MANAGER,
													_MI_PLEASE_REPORTS_TICKETS_DEPARTMENT_DESC => _MI_PLEASE_REPORTS_TICKETS_DEPARTMENT,
													_MI_PLEASE_REPORTS_TICKETS_MANTIS_DESC => _MI_PLEASE_REPORTS_TICKETS_MANTIS,
													_MI_PLEASE_REPORTS_MANTIS_OPENED_DESC => _MI_PLEASE_REPORTS_MANTIS_OPENED,
													_MI_PLEASE_REPORTS_MANTIS_ASSIGNED_DESC => _MI_PLEASE_REPORTS_MANTIS_ASSIGNED,
													_MI_PLEASE_REPORTS_MANTIS_STATUS_DESC => _MI_PLEASE_REPORTS_MANTIS_STATUS,
													_MI_PLEASE_REPORTS_MANTIS_RESPONDED_DESC => _MI_PLEASE_REPORTS_MANTIS_RESPONDED,
													_MI_PLEASE_REPORTS_MANTIS_REPONSEREQ_DESC => _MI_PLEASE_REPORTS_MANTIS_REPONSEREQ,
													_MI_PLEASE_REPORTS_MANTIS_CLOSED_DESC => _MI_PLEASE_REPORTS_MANTIS_CLOSED				);
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_staff_schedule';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_STAFF_SCHEDULE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_STAFF_SCHEDULE_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORT_SCHEDULE_INSTANCE => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY => _MI_PLEASE_SCHEDULE_WEEKLY							);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORT_SCHEDULE_TOP20_DESC => _MI_PLEASE_REPORT_TOP20_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_HIGHLIGHTS_DESC => _MI_PLEASE_REPORT_HIGHLIGHTS_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_INSTANCE_DESC => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_DAILY_DESC => _MI_PLEASE_SCHEDULE_DAILY,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY_DESC => _MI_PLEASE_SCHEDULE_WEEKLY,
													_MI_PLEASE_REPORT_SCHEDULE_FORTNIGHTLY_DESC => _MI_PLEASE_SCHEDULE_FORTNIGHTLY,
													_MI_PLEASE_REPORT_SCHEDULE_MONTHLY_DESC => _MI_PLEASE_SCHEDULE_MONTHLY,
													_MI_PLEASE_REPORT_SCHEDULE_QUARTERLY_DESC => _MI_PLEASE_SCHEDULE_QUARTERLY,
													_MI_PLEASE_REPORT_SCHEDULE_ANNUALLY_DESC => _MI_PLEASE_SCHEDULE_ANNUALLY				);
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_support_heights';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_SUPPORT_HEIGHTS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_SUPPORT_HEIGHTS_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_support_heights', 0, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_support_heights', $toll, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_support_lowes';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_SUPPORT_LOWES';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_SUPPORT_LOWES_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_support_lowes', 0, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_support_lowes', $toll, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_support_run';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_SUPPORT_RUN';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_SUPPORT_RUN_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORTS_TICKET_OPENED_DESC => _MI_PLEASE_REPORTS_TICKET_OPENED,
													_MI_PLEASE_REPORTS_TICKET_SPAM => _MI_PLEASE_REPORTS_SPAM,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED			);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORTS_TICKET_SPAM_DESC => _MI_PLEASE_REPORTS_TICKET_SPAM,
													_MI_PLEASE_REPORTS_TICKET_OPEN_DESC => _MI_PLEASE_REPORTS_TICKET_OPEN,
													_MI_PLEASE_REPORTS_TICKET_CLAIMED_DESC => _MI_PLEASE_REPORTS_TICKET_CLAIMED,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED,
													_MI_PLEASE_REPORTS_TICKETS_STAFF_DESC => _MI_PLEASE_REPORTS_TICKETS_STAFF,
													_MI_PLEASE_REPORTS_TICKETS_MANAGER_DESC => _MI_PLEASE_REPORTS_TICKETS_MANAGER,
													_MI_PLEASE_REPORTS_TICKETS_DEPARTMENT_DESC => _MI_PLEASE_REPORTS_TICKETS_DEPARTMENT,
													_MI_PLEASE_REPORTS_TICKETS_MANTIS_DESC => _MI_PLEASE_REPORTS_TICKETS_MANTIS,
													_MI_PLEASE_REPORTS_MANTIS_OPENED_DESC => _MI_PLEASE_REPORTS_MANTIS_OPENED,
													_MI_PLEASE_REPORTS_MANTIS_ASSIGNED_DESC => _MI_PLEASE_REPORTS_MANTIS_ASSIGNED,
													_MI_PLEASE_REPORTS_MANTIS_STATUS_DESC => _MI_PLEASE_REPORTS_MANTIS_STATUS,
													_MI_PLEASE_REPORTS_MANTIS_RESPONDED_DESC => _MI_PLEASE_REPORTS_MANTIS_RESPONDED,
													_MI_PLEASE_REPORTS_MANTIS_REPONSEREQ_DESC => _MI_PLEASE_REPORTS_MANTIS_REPONSEREQ,
													_MI_PLEASE_REPORTS_MANTIS_CLOSED_DESC => _MI_PLEASE_REPORTS_MANTIS_CLOSED				);
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_support_schedule';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_SUPPORT_SCHEDULE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_SUPPORT_SCHEDULE_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORT_SCHEDULE_INSTANCE => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY => _MI_PLEASE_SCHEDULE_WEEKLY							);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORT_SCHEDULE_TOP20_DESC => _MI_PLEASE_REPORT_TOP20_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_HIGHLIGHTS_DESC => _MI_PLEASE_REPORT_HIGHLIGHTS_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_INSTANCE_DESC => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_DAILY_DESC => _MI_PLEASE_SCHEDULE_DAILY,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY_DESC => _MI_PLEASE_SCHEDULE_WEEKLY,
													_MI_PLEASE_REPORT_SCHEDULE_FORTNIGHTLY_DESC => _MI_PLEASE_SCHEDULE_FORTNIGHTLY,
													_MI_PLEASE_REPORT_SCHEDULE_MONTHLY_DESC => _MI_PLEASE_SCHEDULE_MONTHLY,
													_MI_PLEASE_REPORT_SCHEDULE_QUARTERLY_DESC => _MI_PLEASE_SCHEDULE_QUARTERLY,
													_MI_PLEASE_REPORT_SCHEDULE_ANNUALLY_DESC => _MI_PLEASE_SCHEDULE_ANNUALLY				);
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_department_heights';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_DEPARTMENT_HEIGHTS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_DEPARTMENT_HEIGHTS_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_department_heights', 0, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_department_heights', $toll, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_department_lowes';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_DEPARTMENT_LOWES';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_DEPARTMENT_LOWES_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_department_lowes', 0, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_department_lowes', $toll, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_department_run';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_DEPARTMENT_RUN';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_DEPARTMENT_RUN_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORTS_TICKET_OPENED_DESC => _MI_PLEASE_REPORTS_TICKET_OPENED,
													_MI_PLEASE_REPORTS_TICKET_SPAM => _MI_PLEASE_REPORTS_SPAM,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED			);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORTS_TICKET_SPAM_DESC => _MI_PLEASE_REPORTS_TICKET_SPAM,
													_MI_PLEASE_REPORTS_TICKET_OPEN_DESC => _MI_PLEASE_REPORTS_TICKET_OPEN,
													_MI_PLEASE_REPORTS_TICKET_CLAIMED_DESC => _MI_PLEASE_REPORTS_TICKET_CLAIMED,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED,
													_MI_PLEASE_REPORTS_TICKETS_STAFF_DESC => _MI_PLEASE_REPORTS_TICKETS_STAFF,
													_MI_PLEASE_REPORTS_TICKETS_MANAGER_DESC => _MI_PLEASE_REPORTS_TICKETS_MANAGER,
													_MI_PLEASE_REPORTS_TICKETS_DEPARTMENT_DESC => _MI_PLEASE_REPORTS_TICKETS_DEPARTMENT,
													_MI_PLEASE_REPORTS_TICKETS_MANTIS_DESC => _MI_PLEASE_REPORTS_TICKETS_MANTIS,
													_MI_PLEASE_REPORTS_MANTIS_OPENED_DESC => _MI_PLEASE_REPORTS_MANTIS_OPENED,
													_MI_PLEASE_REPORTS_MANTIS_ASSIGNED_DESC => _MI_PLEASE_REPORTS_MANTIS_ASSIGNED,
													_MI_PLEASE_REPORTS_MANTIS_STATUS_DESC => _MI_PLEASE_REPORTS_MANTIS_STATUS,
													_MI_PLEASE_REPORTS_MANTIS_RESPONDED_DESC => _MI_PLEASE_REPORTS_MANTIS_RESPONDED,
													_MI_PLEASE_REPORTS_MANTIS_REPONSEREQ_DESC => _MI_PLEASE_REPORTS_MANTIS_REPONSEREQ,
													_MI_PLEASE_REPORTS_MANTIS_CLOSED_DESC => _MI_PLEASE_REPORTS_MANTIS_CLOSED				);
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_department_schedule';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_DEPARTMENT_SCHEDULE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_DEPARTMENT_SCHEDULE_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORT_SCHEDULE_INSTANCE => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY => _MI_PLEASE_SCHEDULE_WEEKLY							);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORT_SCHEDULE_TOP20_DESC => _MI_PLEASE_REPORT_TOP20_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_HIGHLIGHTS_DESC => _MI_PLEASE_REPORT_HIGHLIGHTS_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_INSTANCE_DESC => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_DAILY_DESC => _MI_PLEASE_SCHEDULE_DAILY,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY_DESC => _MI_PLEASE_SCHEDULE_WEEKLY,
													_MI_PLEASE_REPORT_SCHEDULE_FORTNIGHTLY_DESC => _MI_PLEASE_SCHEDULE_FORTNIGHTLY,
													_MI_PLEASE_REPORT_SCHEDULE_MONTHLY_DESC => _MI_PLEASE_SCHEDULE_MONTHLY,
													_MI_PLEASE_REPORT_SCHEDULE_QUARTERLY_DESC => _MI_PLEASE_SCHEDULE_QUARTERLY,
													_MI_PLEASE_REPORT_SCHEDULE_ANNUALLY_DESC => _MI_PLEASE_SCHEDULE_ANNUALLY				);
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_manager_heights';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_MANAGER_HEIGHTS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_MANAGER_HEIGHTS_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_manager_heights', 0, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_manager_heights', $toll, 65, 95, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_manager_lowes';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_MANAGER_LOWES';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_MANAGER_LOWES_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'float';
$modversion['config'][$i]['default']     = $toll = pleaseGetTollerence('reports_manager_lowes', 0, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['options']     = pleaseGetTollerence('reports_manager_lowes', $toll, 15, 40, substr(microtime(false), strpos(microtime(false), " ")+1));
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_manager_run';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_MANAGER_RUN';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_MANAGER_RUN_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORTS_TICKET_OPENED_DESC => _MI_PLEASE_REPORTS_TICKET_OPENED,
													_MI_PLEASE_REPORTS_TICKET_SPAM => _MI_PLEASE_REPORTS_SPAM,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED			);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORTS_TICKET_SPAM_DESC => _MI_PLEASE_REPORTS_TICKET_SPAM,
													_MI_PLEASE_REPORTS_TICKET_OPEN_DESC => _MI_PLEASE_REPORTS_TICKET_OPEN,
													_MI_PLEASE_REPORTS_TICKET_CLAIMED_DESC => _MI_PLEASE_REPORTS_TICKET_CLAIMED,
													_MI_PLEASE_REPORTS_TICKET_ESCALATED_DESC => _MI_PLEASE_REPORTS_TICKET_ESCALATED,
													_MI_PLEASE_REPORTS_TICKETS_STAFF_DESC => _MI_PLEASE_REPORTS_TICKETS_STAFF,
													_MI_PLEASE_REPORTS_TICKETS_MANAGER_DESC => _MI_PLEASE_REPORTS_TICKETS_MANAGER,
													_MI_PLEASE_REPORTS_TICKETS_DEPARTMENT_DESC => _MI_PLEASE_REPORTS_TICKETS_DEPARTMENT,
													_MI_PLEASE_REPORTS_TICKETS_MANTIS_DESC => _MI_PLEASE_REPORTS_TICKETS_MANTIS,
													_MI_PLEASE_REPORTS_MANTIS_OPENED_DESC => _MI_PLEASE_REPORTS_MANTIS_OPENED,
													_MI_PLEASE_REPORTS_MANTIS_ASSIGNED_DESC => _MI_PLEASE_REPORTS_MANTIS_ASSIGNED,
													_MI_PLEASE_REPORTS_MANTIS_STATUS_DESC => _MI_PLEASE_REPORTS_MANTIS_STATUS,
													_MI_PLEASE_REPORTS_MANTIS_RESPONDED_DESC => _MI_PLEASE_REPORTS_MANTIS_RESPONDED,
													_MI_PLEASE_REPORTS_MANTIS_REPONSEREQ_DESC => _MI_PLEASE_REPORTS_MANTIS_REPONSEREQ,
													_MI_PLEASE_REPORTS_MANTIS_CLOSED_DESC => _MI_PLEASE_REPORTS_MANTIS_CLOSED				);
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'reports_manager_schedule';
$modversion['config'][$i]['title']       = '_MI_PLEASE_REPORTS_MANAGER_SCHEDULE';
$modversion['config'][$i]['description'] = '_MI_PLEASE_REPORTS_MANAGER_SCHEDULE_DESC';
$modversion['config'][$i]['formtype']    = 'select_multi';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array(	_MI_PLEASE_REPORT_SCHEDULE_INSTANCE => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY => _MI_PLEASE_SCHEDULE_WEEKLY							);
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_REPORT_SCHEDULE_TOP20_DESC => _MI_PLEASE_REPORT_TOP20_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_HIGHLIGHTS_DESC => _MI_PLEASE_REPORT_HIGHLIGHTS_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_INSTANCE_DESC => _MI_PLEASE_REPORT_SCHEDULE_INSTANCE,
													_MI_PLEASE_REPORT_SCHEDULE_DAILY_DESC => _MI_PLEASE_SCHEDULE_DAILY,
													_MI_PLEASE_REPORT_SCHEDULE_WEEKLY_DESC => _MI_PLEASE_SCHEDULE_WEEKLY,
													_MI_PLEASE_REPORT_SCHEDULE_FORTNIGHTLY_DESC => _MI_PLEASE_SCHEDULE_FORTNIGHTLY,
													_MI_PLEASE_REPORT_SCHEDULE_MONTHLY_DESC => _MI_PLEASE_SCHEDULE_MONTHLY,
													_MI_PLEASE_REPORT_SCHEDULE_QUARTERLY_DESC => _MI_PLEASE_SCHEDULE_QUARTERLY,
													_MI_PLEASE_REPORT_SCHEDULE_ANNUALLY_DESC => _MI_PLEASE_SCHEDULE_ANNUALLY				);
$modversion['config'][$i]['category']    = 'reports';
++$i;
$modversion['config'][$i]['name']        = 'offline_close';
$modversion['config'][$i]['title']       = '_MI_PLEASE_OFFLINE_CLOSED';
$modversion['config'][$i]['description'] = '_MI_PLEASE_OFFLINE_CLOSED_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'delete';
$modversion['config'][$i]['options']     = array(	_MI_PLEASE_OFFLINE_CLOSED_DELETE_DESC => _MI_PLEASE_OFFLINE_CLOSED_DELETE,
													_MI_PLEASE_OFFLINE_CLOSED_COPYTO_DESC => _MI_PLEASE_OFFLINE_CLOSED_COPYTO,
													_MI_PLEASE_OFFLINE_CLOSED_SENDFTP_DESC => _MI_PLEASE_REPORT_SCHEDULE_SENDFTP,
													_MI_PLEASE_OFFLINE_CLOSED_NOTHING_DESC => _MI_PLEASE_OFFLINE_CLOSED_NOTHING		);
$modversion['config'][$i]['category']    = 'offline';
++$i;
$modversion['config'][$i]['name']        = 'offline_copyto';
$modversion['config'][$i]['title']       = '_MI_PLEASE_OFFLINE_COPYTO';
$modversion['config'][$i]['description'] = '_MI_PLEASE_OFFLINE_COPYTO_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = dirname(dirname(dirname(dirname(__DIR__)))) . DIRECTORY_SEPARATOR . 'offline';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'offline';
++$i;
$modversion['config'][$i]['name']        = 'offline_ftpserver';
$modversion['config'][$i]['title']       = '_MI_PLEASE_OFFLINE_FTPSERVER';
$modversion['config'][$i]['description'] = '_MI_PLEASE_OFFLINE_FTPSERVER_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'ftp'.parse_url(XOOPS_URL, PHP_URL_HOST);
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'offline';
++$i;
$modversion['config'][$i]['name']        = 'offline_ftpport';
$modversion['config'][$i]['title']       = '_MI_PLEASE_OFFLINE_FTPPORT';
$modversion['config'][$i]['description'] = '_MI_PLEASE_OFFLINE_FTPPORT_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = '22';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'offline';
++$i;
$modversion['config'][$i]['name']        = 'offline_ftpuser';
$modversion['config'][$i]['title']       = '_MI_PLEASE_OFFLINE_FTPUSER';
$modversion['config'][$i]['description'] = '_MI_PLEASE_OFFLINE_FTPUSER_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = '';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'offline';
++$i;
$modversion['config'][$i]['name']        = 'offline_ftppass';
$modversion['config'][$i]['title']       = '_MI_PLEASE_OFFLINE_FTPPASS';
$modversion['config'][$i]['description'] = '_MI_PLEASE_OFFLINE_FTPPASS_DESC';
$modversion['config'][$i]['formtype']    = 'password';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = '';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'offline';
++$i;
$modversion['config'][$i]['name']        = 'offline_ftppath';
$modversion['config'][$i]['title']       = '_MI_PLEASE_OFFLINE_FTPPATH';
$modversion['config'][$i]['description'] = '_MI_PLEASE_OFFLINE_FTPPATH_DESC';
$modversion['config'][$i]['formtype']    = 'text';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = '/';
$modversion['config'][$i]['options']     = array();
$modversion['config'][$i]['category']    = 'offline';


// Notification
$modversion['hasNotification']             = false;
//$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
//$modversion['notification']['lookup_func'] = 'publisher_notify_iteminfo';

//$modversion['notification']['category'][1]['name']           = 'global_item';
//$modversion['notification']['category'][1]['title']          = _MI_PLEASE_GLOBAL_ITEM_NOTIFY;
//$modversion['notification']['category'][1]['description']    = _MI_PLEASE_GLOBAL_ITEM_NOTIFY_DSC;
//$modversion['notification']['category'][1]['subscribe_from'] = array('index.php', 'category.php', 'item.php');

//$modversion['notification']['event'][1]['name']          = 'category_created';
//$modversion['notification']['event'][1]['category']      = 'global_item';
//$modversion['notification']['event'][1]['title']         = _MI_PLEASE_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY;
//$modversion['notification']['event'][1]['caption']       = _MI_PLEASE_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_CAP;
//$modversion['notification']['event'][1]['description']   = _MI_PLEASE_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_DSC;
//$modversion['notification']['event'][1]['mail_template'] = 'global_item_category_created';
//$modversion['notification']['event'][1]['mail_subject']  = _MI_PLEASE_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_SBJ;

?>
