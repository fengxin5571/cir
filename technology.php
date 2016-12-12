<?php


define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');


/*------------------------------------------------------ */
//-- 判断是否存在缓存，如果存在则调用缓存，反之读取相应内容
/*------------------------------------------------------ */
/* 缓存编号 */
$cache_id = sprintf('%X', crc32('technology-' . $_SESSION['user_rank'] . '-' . $_CFG['lang']));

if (!$smarty->is_cached('technology.dwt', $cache_id))
{
    assign_template();

    $position = assign_ur_here();
    $smarty->assign('page_title',      $position['title']);    // 页面标题
    $smarty->assign('ur_here',         $position['ur_here']);  // 当前位置

    /* meta information */
    $smarty->assign('keywords',        htmlspecialchars($_CFG['shop_keywords']));
    $smarty->assign('description',     htmlspecialchars($_CFG['shop_desc']));


    if ($_SESSION['user_id'] > 0)
    {
        $smarty->assign('user_info', get_user_info());
    }
    $cat = article_cat_list(21, 0, false, 0);
    foreach ($cat as $key => $value) {
        if ($value['level'] !=1 || in_array($value['cat_id'], array(22, 23)) ) {
            unset($cat[$key]);
        }
    }
    $smarty->assign('cat',         $cat);
    $scat = article_cat_list(23, 0, false, 0);
    $smarty->assign('scat',  $scat);

    $smarty->assign('data_dir',        DATA_DIR);       // 数据目录

   
}

$smarty->display('technology.dwt', $cache_id);

?>