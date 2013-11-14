<?php
/**
 * poche, a read it later open source system
 *
 * @category   poche
 * @author     Nicolas Lœuillet <support@inthepoche.com>
 * @copyright  2013
 * @license    http://www.wtfpl.net/ see COPYING file
 */

class Fever
{
    public static function convertEntries($entries)
    {
        $feverEntries = array();
	foreach($entries as $k=>$v)
	{
	    $feverEntries[$k]['id'] = $v['id'];
	    $feverEntries[$k]['feed_id'] = 90;
	    $feverEntries[$k]['title'] = $v['title'];
	    $feverEntries[$k]['author'] = "unknown";
	    $feverEntries[$k]['url'] = $v['url'];
	    $feverEntries[$k]['html'] = $v['content'];
	    $feverEntries[$k]['is_saved'] = 0;
	    $feverEntries[$k]['is_read'] = 0;
	    $feverEntries[$k]['created_on_time'] = 1384274435;
	}
	return $feverEntries;
    }

    public static function unreadItemIds($entries)
    {
        $feverEntries = "";
	foreach($entries as $k=>$v)
	{
	    $feverEntries .= $v["id"] . ',';
	}
	return $feverEntries;
    }

    public static function renderJson($data)
    {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json; charset=UTF-8');
        echo json_encode($data);
        exit();
    }

}