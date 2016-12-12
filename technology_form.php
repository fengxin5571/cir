<?php
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
$action  = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';

 
if ($action == 'default') {
	assign_template('a', array($cat_id));
	$position = assign_ur_here($cat_id, '', 4);
	$smarty->assign('page_title',           $position['title']);     // 页面标题
	$smarty->assign('ur_here',              $position['ur_here']);   // 当前位置

	$smarty->assign('keywords',        htmlspecialchars($_CFG['shop_keywords']));
	$smarty->assign('description',     htmlspecialchars($_CFG['shop_desc']));

	if (empty($_SESSION['user_id']))
	{
	    ecs_header("Location: user.php?action=login\n");
	    exit;
	}

	$user_info   = get_user_info($_SESSION['user_id']);

	$smarty->assign('user_info',           $user_info);  

	$smarty->assign('hangye',              get_cats());   
	$smarty->assign('gongneng',            get_cats('gongneng'));  

	$smarty->display('technology_form.dwt');

} elseif ($action == 'add_msg') {
    $message = array(
        'user_id'     => $_SESSION['user_id'],
        'hangye'      => $_POST['hangye'],
        'gongneng'    => $_POST['gongneng'],
        'user_name'   => $_POST['user_name'],
        'user_email'  => $_POST['user_email'],
        'user_phone'  => $_POST['user_phone'],
        'msg_title'   => $_POST['msg_title'],
        'msg_type'    => isset($_POST['msg_type']) ? intval($_POST['msg_type'])     : 0,
        'user_company'=> isset($_POST['user_company']) ? trim($_POST['user_company'])     : '',
        'msg_content' => isset($_POST['msg_content']) ? trim($_POST['msg_content']) : '',
        'upload'      => (isset($_FILES['msg_file']['error']) && $_FILES['msg_file']['error'] == 0) || (!isset($_FILES['msg_file']['error']) && isset($_FILES['msg_file']['tmp_name']) && $_FILES['msg_file']['tmp_name'] != 'none')
         ? $_FILES['msg_file'] : array()
     );

    if (add_message($message))
    {
        show_message('定制解决方案提交成功, 我们会在48小时内与你联系！', '继续提交', 'technology_form.php','info');
    }
    else
    {
        $err->show($_LANG['message_list_lnk'], 'technology_form.php');
    }
}


function get_cats($type = 'hangye')
{
    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table($type) . ' ORDER BY sort_order ASC';
    $res = $GLOBALS['db']->getAll($sql);

    return $res;
}


function add_message($message)
{
    $upload_size_limit = $GLOBALS['_CFG']['upload_size_limit'] == '-1' ? ini_get('upload_max_filesize') : $GLOBALS['_CFG']['upload_size_limit'];
    $status = 1 - $GLOBALS['_CFG']['message_check'];

    $last_char = strtolower($upload_size_limit{strlen($upload_size_limit)-1});

    switch ($last_char)
    {
        case 'm':
            $upload_size_limit *= 1024*1024;
            break;
        case 'k':
            $upload_size_limit *= 1024;
            break;
    }

    $file_name = '';
    if ($message['upload'])
    {
        if($_FILES['msg_file']['size'] / 1024 > $upload_size_limit)
        {
            $GLOBALS['err']->add(sprintf($GLOBALS['_LANG']['upload_file_limit'], $upload_size_limit));
            return false;
        }
        $file_name = upload_file($_FILES['msg_file'], 'technology');

        if ($file_name === false)
        {
            return false;
        }
    }

    $sql = "INSERT INTO " . $GLOBALS['ecs']->table('technology') .
            " (msg_id, user_id, hangye, gongneng, user_name, user_email, user_phone, user_company, msg_title, msg_type, msg_status,  msg_content, msg_time, msg_file)".
            " VALUES (NULL, '$message[user_id]', '$message[hangye]', '$message[gongneng]', '$message[user_name]', '$message[user_email]', ".
            " '$message[user_phone]',  '$message[user_company]', '$message[msg_title]', '$message[msg_type]', '$status', '$message[msg_content]', '".gmtime()."', '$file_name')";
    $GLOBALS['db']->query($sql);

    return true;
}

?>