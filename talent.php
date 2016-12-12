<?php


define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . 'includes/lib_talent.php');

$cat_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$page = !empty($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;

$rank = isset($_GET['rank']) ? intval($_GET['rank']) : 0;

/*------------------------------------------------------ */
//-- 判断是否存在缓存，如果存在则调用缓存，反之读取相应内容
/*------------------------------------------------------ */
/* 缓存编号 */
$cache_id = sprintf('%X', crc32('talent-' . $_SESSION['user_rank'] . '-' . $_CFG['lang']));

if (!$smarty->is_cached('talent.dwt', $cache_id))
{
    assign_template();

    $position = assign_ur_here();
    $smarty->assign('page_title',      $position['title']);    // 页面标题
    $smarty->assign('ur_here',         $position['ur_here']);  // 当前位置

    /* meta information */
    $smarty->assign('keywords',        htmlspecialchars($_CFG['shop_keywords']));
    $smarty->assign('description',     htmlspecialchars($_CFG['shop_desc']));
	$GLOBALS['smarty']->assign('talent',   article_categories_tree(0)); 
    $allranks = getUserRank(2, true);

    if ($_SESSION['user_id'] > 0)
    {
        $smarty->assign('user_info', get_user_info());

        $current_rank = getUserRankInfo(2, $_SESSION['user_id']);
        if ($rank) {
            if ($current_rank['rank_id'] != $rank && $allranks[$rank]['price'] > $current_rank['price']) {
                show_message('您还没有此模块权限，请先升级！', '升级会员', 'user_update.php?type=2&rank=' . $rank, 'info');
            }
            if (time() > $current_rank['end_time']) {
                show_message('您的会员权限已经过期，请先续费！', '会员续费', 'user_update.php?type=2&rank=' . $rank, 'info');
            }
        }
    }
    $cat = talent_cat_list(0, 0, false);
    
    foreach ($cat as $key => $value) {
        $strArray = str_split_php5_utf8($value['cat_name']);
        $str = '';
        foreach ($strArray as $k => $v) {
            $str .= $v . '<br>';
        }
        $cat[$key]['cat_name'] = $str;
    }

    $smarty->assign('cat', $cat);


    $size   = 10;
    $count  = get_talent_count($cat_id, $rank);
    $pages  = ($count > 0) ? ceil($count / $size) : 1;

    if ($page > $pages)
    {
        $page = $pages;
    }

    $smarty->assign('talent_list',  get_cat_talent($cat_id, $page, $size, $rank));
    $smarty->assign('cat_id',    $cat_id);
    /* 分页 */

    assign_pager('talent', $cat_id, $count, $size, '', '', $page, '', 0, 0, 0, 'list', '', '', '', $rank);


    $smarty->assign('ranks',        $allranks);
    $smarty->assign('data_dir',        DATA_DIR);       // 数据目录
    $smarty->assign('rank_id',      $rank);

   
}

$smarty->display('talent.dwt', $cache_id);

?>