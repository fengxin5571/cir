<?php

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . 'includes/lib_talent.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}
$action  = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';
/*------------------------------------------------------ */
//-- INPUT
/*------------------------------------------------------ */

$_REQUEST['id'] = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
$talent_id     = $_REQUEST['id'];
/*if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] < 0)
{
    $talent_id = $db->getOne("SELECT talent_id FROM " . $ecs->table('talent') . " WHERE cat_id = '".intval($_REQUEST['cat_id'])."' ");
}
*/
/*------------------------------------------------------ */
//-- PROCESSOR
/*------------------------------------------------------ */

/* 人才详情 */

if ($action == 'default') {
    $talent = get_talent_info($talent_id);

    if (empty($talent))
    {
        ecs_header("Location: ./\n");
        exit;
    }

    $smarty->assign('id',               $talent_id);
    $smarty->assign('username',         $_SESSION['user_name']);
    $smarty->assign('email',            $_SESSION['email']);
    $smarty->assign('type',            '1');

    $smarty->assign('talent',          $talent);
    $smarty->assign('keywords',        htmlspecialchars($_CFG['shop_keywords']));
    $smarty->assign('description',     htmlspecialchars($_CFG['shop_desc']));


    if ($_SESSION['user_id'] > 0)
    {
        $current_rank = getUserRankInfo(2, $_SESSION['user_id']);
        if (time() > $current_rank['end_time']) {
            show_message('您的会员权限已经过期，请先续费！', '会员续费', 'user_update.php?type=2&rank=' . $rank, 'info');
        }
        $smarty->assign('user_info', get_user_info());
        if ($current_rank['price'] >= $talent['price']) {
            $smarty->assign('canSend', 1);
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

    $smarty->assign('cat',  $cat);

    assign_template();

    $position = assign_ur_here($talent['cat_id'], $talent['name']);
    $smarty->assign('page_title',   $position['title']);    // 页面标题
    $smarty->assign('ur_here',      $position['ur_here']);  // 当前位置

    //assign_dynamic('talent');
    $smarty->assign('ranks',      getUserRank(2));
    $smarty->display('talent_show.dwt', $cache_id);
    
} elseif ($action == 'add_msg') {
    // 提交人才输送申请
    if (empty($_SESSION['user_id'])) {
        show_message('请先登录', '', 'user.php', 'error');
    }

    $sql = "SELECT COUNT(*) FROM " . $ecs->table('talent_request') .
            " WHERE user_id = '$_SESSION[user_id]' AND talent_id = '$_POST[talent_id]'";
    if ($db->GetOne($sql) > 0)
    {
         show_message('您已输送过,请不要重复输送', '', 'talent_show.php?id=' . $_POST['talent_id'], 'error');
    }


    $message = array(
        'user_id'     => $_SESSION['user_id'],
        'talent_id'   => $_POST['talent_id'],
        'goods_id'    => $_POST['goods_id'],
        'user_name'   => $_POST['user_name'],
        'user_email'  => $_POST['user_email'],
        'user_phone'  => $_POST['user_phone'],
        'user_company'=> isset($_POST['user_company']) ? trim($_POST['user_company'])     : '',
        'msg_content' => isset($_POST['msg_content']) ? trim($_POST['msg_content']) : ''
     );

    if (add_message($message))
    {
        show_message('人才输送提交成功！', '继续提交', 'talent_show.php?id='.$_POST['talent_id'],'info');
    }
    else
    {
        $err->show($_LANG['message_list_lnk'], 'talent_show.php?id='.$_POST['talent_id']);
    }
} elseif ($action == 'addTalent') {
    include_once(ROOT_PATH .'includes/cls_json.php');
    $json = new JSON();
    $result = array('error' => 0, 'message' => '');
    $talent_id = $_GET['id'];

    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0)
    {
        $result['error'] = 1;
        $result['message'] = $_LANG['login_please'];
        die($json->encode($result));
    } else {
        /* 检查是否已经存在于用户的收藏夹 */
        $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('collect_talent') .
            " WHERE user_id='$_SESSION[user_id]' AND talent_id = '$talent_id'";
        if ($GLOBALS['db']->GetOne($sql) > 0)
        {
            $result['error'] = 1;
            $result['message'] = '该人才已经存在于您的收藏夹中。';
            die($json->encode($result));
        } else {
            $time = gmtime();
            $sql = "INSERT INTO " .$GLOBALS['ecs']->table('collect_talent'). " (user_id, talent_id, add_time)" .
                    "VALUES ('$_SESSION[user_id]', '$talent_id', '$time')";

            if ($GLOBALS['db']->query($sql) === false)
            {
                $result['error'] = 1;
                $result['message'] = $GLOBALS['db']->errorMsg();
                die($json->encode($result));
            }
            else
            {
                $result['error'] = 0;
                $result['message'] = '该人才已经成功地加入了您的收藏夹。';
                die($json->encode($result));
            }
        }
    }
}


/*------------------------------------------------------ */
//-- PRIVATE FUNCTION
/*------------------------------------------------------ */

/**
 * 获得指定的人才的详细信息
 *
 * @access  private
 * @param   integer     $talent_id
 * @return  array
 */
function get_talent_info($talent_id)
{
    global $educations, $experience;
    /* 获得人才的信息 */
    $sql = "SELECT * ".
            "FROM " .$GLOBALS['ecs']->table('talent'). " AS t " . 
            " LEFT JOIN " .$GLOBALS['ecs']->table('user_rank').  " AS u ON(t.level = u.rank_id) " . 
            " WHERE t.is_open = 1 AND t.talent_id = '$talent_id' ";
            
    $row = $GLOBALS['db']->getRow($sql);

    if ($row !== false)
    {
        $row['sex']         = $row['sex']==1 ? '男' : '女';
        $row['experience']  = $experience[$row['experience']];
        $row['education']   = $educations[$row['education']];
        $row['age']         = getAge($row['birthday']);
        $row['level']       = explode(',', $row['level']);
        $row['price']       = $row['price'];
        $row['add_time']    = local_date($GLOBALS['_CFG']['date_format'], $row['add_time']); // 修正添加时间显示
    }
    return $row;
}


function add_message($message) {

    $status = 1 - $GLOBALS['_CFG']['message_check'];

    $sql = "INSERT INTO " . $GLOBALS['ecs']->table('talent_request') .
            " (msg_id, talent_id, user_id, user_name, user_email, user_phone, user_company, msg_status,  msg_content, msg_time)".
            " VALUES (NULL, '$message[talent_id]', '$message[user_id]', '$message[user_name]', '$message[user_email]', ".
            " '$message[user_phone]',  '$message[user_company]', '$status', '$message[msg_content]', '".gmtime()."')";
    $GLOBALS['db']->query($sql);

    return true;
}



?>