<?php if ($this->_var['user_info']): ?>
<font style="position:relative; ">
<?php echo $this->_var['lang']['hello']; ?>，<font class="f4_b"><?php echo $this->_var['user_info']['username']; ?></font>, <?php echo $this->_var['lang']['welcome_return']; ?>！
 <a href="user.php"><?php echo $this->_var['lang']['user_center']; ?></a>|
 <a href="user.php?act=logout"><?php echo $this->_var['lang']['user_logout']; ?></a>
</font>
<?php else: ?>
<a href="user.php" ><?php echo $this->_var['lang']['label_login']; ?></a>
<a href="user.php?act=register" ><?php echo $this->_var['lang']['label_regist']; ?></a>
<?php endif; ?>