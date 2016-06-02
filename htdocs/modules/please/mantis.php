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

/**
 * Example usage (using jQuery):
 *  var url = "/modules/please/mantis.php?name=mc_project_get_issues&project_id=0&page_number=1&per_page=10";
 *  $.getJSON(url, function(data) {
 *      $.each(data, function() {
 *          console.log(data.id + ': ' data.summary);
 *      });
 *  });
 */

/**
 * Include Required Control Files
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR . "common.php";

/**
 * Opens Access Origin Via networking Route NPN
 */
header('Access-Control-Allow-Origin: *');
header('Origin: *');

/**
 * Turns of GZ Lib Compression for Document Incompatibility
 */
ini_set("zlib.output_compression", 'Off');
ini_set("zlib.output_compression_level", -1);

/**
 * Set header Context-type
 */
header("Context-type: application/json");

if (!$GLOBALS['pleaseConfig']['mantis_support'])
	die(json_encode(array('error'=>_ERR_MANTIS_ADAPTOR_NOSUPPORT)));
/**
 * Compile Variable into streamline var $args
 */
parse_str(http_build_query($_POST).'&'.http_build_query($_GET), $args);

/**
 * Checks passkey if valid!
 */
if (!isset($args['passkey'])) {
	die(json_encode(array('error'=>_ERR_MANTIS_ADAPTOR_NOPASSKEY)));
} elseif($args['passkey'] != sha1($ipv4 = gethostbyname(parse_url($_SERVER["REFERER_URI"], PHP_URL_HOST))._PLEASE_SALT_WHENSET.parse_url(_PLEASE_SALT_WHERESET, PHP_URL_HOST)))
	die(json_encode(array('error'=>sprintf(_ERR_MANTIS_ADAPTOR_WRONGPASS, $ipv4))));
unset($args['passkey']);


/**
 * get and sets Passed Variables
 */
if (!isset($args['name'])) {
	die(json_encode(array('error'=>_ERR_MANTIS_ADAPTOR_NOFUNCTION)));
}

/**
 * Set user and function on SOAP API with mantis!
 */
$function_name = $args['name'];
unset($args['name']);
$args = array_merge(
    array(
        'username' => $GLOBALS['pleaseConfig']['mantis_username'],
        'password' => $GLOBALS['pleaseConfig']['mantis_password']
    ),
    $args
);
try {
    $client = new SoapClient($GLOBALS['pleaseConfig']['mantis_api_uri'] . '?wsdl');

    $result = $client->__soapCall($function_name, $args);
} catch (SoapFault $e) {
    $result = array(
        'error' => $e->faultstring
    );
}

/**
 * Passes the result!
 */
die(json_encode($result));