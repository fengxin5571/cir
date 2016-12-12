<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,transport.js')); ?>

<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="main">
    
    <div class="mg-cate w1160px clearfix">
    <?php echo $this->fetch('library/category_tree.lbi'); ?>
    </div>
    


<?php if ($this->_var['action'] == 'login'): ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'jquery.kinMaxShow-1.1.src.js')); ?>
    <script type="text/javascript">
      $(function(){
        $("#kinMaxShow").kinMaxShow();
      });
    </script>
    <div class="w1160px">
      <div class="robert fl">
         <div id="kinMaxShow">
              <?php 
$k = array (
  'name' => 'ads',
  'id' => '4',
  'num' => '4',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        </div>
      </div>
      <div class="login fr mt30">
        <form name="formLogin" action="user.php" method="post" onSubmit="return userLogin()">
        <p><strong><?php echo $this->_var['lang']['label_username']; ?>：</strong><input type="text" name="username" class="login-input"></p>
        <p><strong><?php echo $this->_var['lang']['label_password']; ?>：</strong><input type="password" name="password" class="login-input"></p>

        <?php if ($this->_var['enabled_captcha']): ?>
        <p><strong><?php echo $this->_var['lang']['comment_captcha']; ?>：</strong><input type="text" size="8" name="captcha" class="login-input" /></p>
        <p><strong></strong><img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /></p>
        <?php endif; ?>
        <input type="hidden" name="act" value="act_login" />
        <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
        <p><strong></strong><input type="checkbox" value="1" name="remember" id="remember"> <?php echo $this->_var['lang']['remember']; ?></p>
        <p class="talignC"><a href="user.php?act=qpassword_name" title=""><?php echo $this->_var['lang']['get_password_by_question']; ?></a></p>
        <p class="talignC"><a href="user.php?act=get_password" title=""><?php echo $this->_var['lang']['get_password_by_mail']; ?></a></p>
        <p class="talignC"><input type="submit" name="submit" class="btning"><a href="user.php?act=register" title="" class="btning">注册</a></p>
        <div class="xx mt10"></div>
        <p class="talignC mt10"><?php echo $this->_var['lang']['user_reg_info']['0']; ?></p>
        <p class="talignC"><b class="color02"><?php echo $this->_var['lang']['user_reg_info']['1']; ?>：</b></p>
        <?php if ($this->_var['car_off'] == 1): ?>
        <p class="talignC"><?php echo $this->_var['lang']['user_reg_info']['2']; ?></p>
        <?php endif; ?>
        <?php if ($this->_var['car_off'] == 0): ?>
        <p class="talignC"><?php echo $this->_var['lang']['user_reg_info']['8']; ?></p>
        <?php endif; ?>
        <p class="talignC"><b class="color02"><?php echo $this->_var['lang']['user_reg_info']['3']; ?>：</b></p>
        <ul>
          <li>1、<?php echo $this->_var['lang']['user_reg_info']['4']; ?></li>
          <li>2、<?php echo $this->_var['lang']['user_reg_info']['5']; ?></li>
          <li>3、<?php echo $this->_var['lang']['user_reg_info']['6']; ?></li>
          <li>4、<?php echo $this->_var['lang']['user_reg_info']['7']; ?></li>
        </ul>
        </form>
      </div>
      <div class="clr"></div>
    </div>
<?php endif; ?>



    <?php if ($this->_var['action'] == 'register'): ?>
    <?php if ($this->_var['shop_reg_closed'] == 1): ?>
    <div class="usBox">
      <div class="usBox_2 clearfix">
        <div class="f1 f5" align="center"><?php echo $this->_var['lang']['shop_register_closed']; ?></div>
      </div>
    </div>
    <?php else: ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
    <div class="w1160px">
      <div class="pos mt30">
        <?php echo $this->fetch('library/ur_here.lbi'); ?>
      </div>
      <div class="border mt10">
        <div class="register mt30 mb30">
          <h2>免费注册为中国工业机器人智能网会员<span class="fontsimsun12 fontwgN color05">(带*为必选项)</span></h2>
           <form action="user.php" method="post" name="formUser" onsubmit="return register();">
            <ul class="register-list mt20">
              <li><strong><?php echo $this->_var['lang']['label_username']; ?></strong><p><input type="text" class="register-input" name="username"  id="username" onblur="is_registered(this.value);">
                <span id="username_notice" class="prompt color06"> *</span>
              </p></li>
              <li><strong><?php echo $this->_var['lang']['label_email']; ?></strong><p>
                <input name="email" type="text" id="email" onblur="checkEmail(this.value);" class="register-input">
                <span id="email_notice" class="prompt color06"> *</span>
              </p></li>


              <li><strong><?php echo $this->_var['lang']['label_password']; ?></strong><p><input name="password" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)"  class="register-input">
                <span class="prompt color06" id="password_notice"> *</span></p>
              </li>


              <li><strong><?php echo $this->_var['lang']['label_password_intensity']; ?></strong><div style="display:inline-block;width:220px;">
                  <table width="145" border="0" cellspacing="0" cellpadding="1" style="margin-left:20px;">
                    <tbody><tr align="center">
                      <td width="33%" id="pwd_lower" style="border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: red;">弱</td>
                      <td width="33%" id="pwd_middle" style="border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(218, 218, 218);">中</td>
                      <td width="33%" id="pwd_high" style="border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(218, 218, 218);">强</td>
                    </tr>
                  </tbody></table>
              </div></li>

              <li><strong><?php echo $this->_var['lang']['label_confirm_password']; ?></strong><p><input type="text" class="register-input"><span class="prompt color06">*</span></p></li>

              <?php $_from = $this->_var['extend_info_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
              <?php if ($this->_var['field']['id'] == 6): ?>
              <li><strong><?php echo $this->_var['lang']['passwd_question']; ?></strong><p>
                <select name='sel_question' class="register-input">
                <option value='0'><?php echo $this->_var['lang']['sel_question']; ?></option>
                <?php echo $this->html_options(array('options'=>$this->_var['passwd_questions'])); ?>
                </select>
              </p></li>
              <li><strong><?php echo $this->_var['lang']['passwd_answer']; ?></strong><p>
                <input name="passwd_answer" type="text" class="register-input" >
                <span class="prompt color06">*</span>
                <?php if ($this->_var['field']['is_need']): ?><span class="prompt color06" id="passwd_quesetion"> *</span><?php endif; ?>
              </p>
              </li>
              <?php else: ?>
              <li><strong><?php echo $this->_var['field']['reg_field_name']; ?></strong><p><input type="text" class="register-input" name="extend_field<?php echo $this->_var['field']['id']; ?>">
                <?php if ($this->_var['field']['is_need']): ?><span class="prompt color06"> *</span><?php endif; ?>
              </p></li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

              <?php if ($this->_var['enabled_captcha']): ?>
              <li><strong><?php echo $this->_var['lang']['comment_captcha']; ?></strong><p><input type="text" name="captcha" class="captcha-input"><img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /></p></li>

              <?php endif; ?>
              <li><strong></strong><input name="agreement" type="checkbox" value="1" checked="checked" />
            <?php echo $this->_var['lang']['agreement']; ?></li>

               <li>
                  <strong></strong>
                  <p>
                  <input name="act" type="hidden" value="act_register" >
                  <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                  <input name="Submit" type="submit" value="" class="reg-btn">
                  </p>
              </li>
              <li><strong></strong><p><span class="reg-ico"></span><a href="user.php?act=login" class="color03"><?php echo $this->_var['lang']['want_login']; ?></a></p></li>
              <li><strong></strong><p><span class="reg-ico"></span><a href="user.php?act=get_password" class="color03"><?php echo $this->_var['lang']['forgot_password']; ?></a></p></li>
            </ul>
          </form>
        </div>
      </div>
    </div>

<?php endif; ?>
<?php endif; ?>



    <?php if ($this->_var['action'] == 'get_password'): ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
<div class="w1160px">
  <div class="pos mt30">
    <?php echo $this->fetch('library/ur_here.lbi'); ?>
  </div>
  <div class="border usBox mt10">
    <div class="usBox_2 clearfix">
      <form action="user.php" method="post" name="getPassword" onsubmit="return submitPwdInfo();">
          <br />
          <table width="70%" border="0" align="center">
            <tr>
              <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['username_and_email']; ?></strong></td>
            </tr>
            <tr>
              <td width="29%" align="right" height="50"><?php echo $this->_var['lang']['username']; ?></td>
              <td width="61%"><input name="user_name" type="text" size="30" class="login-input"  /></td>
            </tr>
            <tr>
              <td align="right" height="50"><?php echo $this->_var['lang']['email']; ?></td>
              <td><input name="email" type="text" size="30" class="login-input" /></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="hidden" name="act" value="send_pwd_email" />
                <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="btning" style="border:none;" />
                <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="btning" />
  	    </td>
            </tr>
          </table>
          <br />
        </form>
    </div>
  </div>
</div>
<?php endif; ?>


    <?php if ($this->_var['action'] == 'qpassword_name'): ?>
<div class="w1160px">
  <div class="pos mt30">
    <?php echo $this->fetch('library/ur_here.lbi'); ?>
  </div>
  <div class="border usBox mt10">
    <div class="usBox_2 clearfix">
      <form action="user.php" method="post">
          <br />
          <table width="70%" border="0" align="center">
            <tr>
              <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['get_question_username']; ?></strong></td>
            </tr>
            <tr>
              <td width="29%" align="right" height="50"><?php echo $this->_var['lang']['username']; ?></td>
              <td width="61%"><input name="user_name" type="text" size="30" class="login-input" /></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="hidden" name="act" value="get_passwd_question" class="login-input"/>
                <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="btning" style="border:none;" />
                <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;"class="btning" />
  	         </td>
            </tr>
          </table>
          <br />
        </form>
    </div>
  </div>
</div>
<?php endif; ?>


    <?php if ($this->_var['action'] == 'get_passwd_question'): ?>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post">
        <br />
        <table width="70%" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['input_answer']; ?></strong></td>
          </tr>
          <tr>
            <td width="29%" align="right"><?php echo $this->_var['lang']['passwd_question']; ?>：</td>
            <td width="61%"><?php echo $this->_var['passwd_question']; ?></td>
          </tr>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['passwd_answer']; ?>：</td>
            <td><input name="passwd_answer" type="text" size="20" class="inputBg" /></td>
          </tr>
          <?php if ($this->_var['enabled_captcha']): ?>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['comment_captcha']; ?></td>
            <td><input type="text" size="8" name="captcha" class="inputBg" />
            <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
          </tr>
          <?php endif; ?>
          <tr>
            <td></td>
            <td><input type="hidden" name="act" value="check_answer" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
	    </td>
          </tr>
        </table>
        <br />
      </form>
  </div>
</div>
<?php endif; ?>

<?php if ($this->_var['action'] == 'reset_password'): ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post" name="getPassword2" onSubmit="return submitPwd()">
      <br />
      <table width="80%" border="0" align="center">
        <tr>
          <td><?php echo $this->_var['lang']['new_password']; ?></td>
          <td><input name="new_password" type="password" size="25" class="inputBg" /></td>
        </tr>
        <tr>
          <td><?php echo $this->_var['lang']['confirm_password']; ?>:</td>
          <td><input name="confirm_password" type="password" size="25"  class="inputBg"/></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="hidden" name="act" value="act_edit_password" />
            <input type="hidden" name="uid" value="<?php echo $this->_var['uid']; ?>" />
            <input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>" />
            <input type="submit" name="submit" value="<?php echo $this->_var['lang']['confirm_submit']; ?>" />
          </td>
        </tr>
      </table>
      <br />
    </form>
  </div>
</div>
<?php endif; ?>

</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
</script>
</html>
