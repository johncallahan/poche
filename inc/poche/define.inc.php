<?php
/**
 * poche, a read it later open source system
 *
 * @category   poche
 * @author     Nicolas Lœuillet <nicolas@loeuillet.org>
 * @copyright  2013
 * @license    http://www.wtfpl.net/ see COPYING file
 */

define ('STORAGE','mysql'); # postgres, mysql, sqlite
define ('STORAGE_SERVER', 'localhost'); # leave blank for sqlite
define ('STORAGE_DB', 'poche'); # only for postgres & mysql
define ('STORAGE_SQLITE', __DIR__ . '/../../db/poche.sqlite');
define ('STORAGE_USER', 'root'); # leave blank for sqlite
define ('STORAGE_PASSWORD', ''); # leave blank for sqlite

define ('MODE_DEMO', FALSE);
define ('DEBUG_POCHE', FALSE);
define ('DOWNLOAD_PICTURES', FALSE);
define ('SHARE_TWITTER', TRUE);
define ('SHARE_MAIL', TRUE);
define ('SHARE_SHAARLI', FALSE);
define ('SHAARLI_URL', 'http://myshaarliurl.com');
define ('ABS_PATH', 'assets/');
define ('TPL', __DIR__ . '/../../tpl');
define ('LOCALE', __DIR__  . '/../../locale');
define ('CACHE', __DIR__  . '/../../cache');
define ('PAGINATION', '10');
define ('THEME', 'light');

define ('IMPORT_POCKET_FILE', './ril_export.html');
define ('IMPORT_READABILITY_FILE', './readability');
define ('IMPORT_INSTAPAPER_FILE', './instapaper-export.html');

if (!function_exists('gettext')) {
    function gettext($str) {
        return $str;
    }
}

if (!function_exists('_')) {
    function _($str) {
        return $str;
    }
}

