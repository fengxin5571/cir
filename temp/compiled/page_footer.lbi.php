

  <div class="footer mt30">
    <div class="w1160px">

      <div class="footer-menu clearfix fl">
        <?php if ($this->_var['helps']): ?>
        <?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');if (count($_from)):
    foreach ($_from AS $this->_var['help_cat']):
?>
        <ul>
          <li><strong><?php echo $this->_var['help_cat']['cat_name']; ?></strong></li>
          <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
          <li><a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['item']['title']); ?>"><?php echo $this->_var['item']['short_title']; ?></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>
        <ul>
          <li><strong>全程保障交易安全</strong></li>
          <li><img src="themes/default/images/robot/safe.png" width="76" height="77" alt=""></li>
        </ul>
      </div>
      <div class="ewm mt10 fl"><img src="<?php echo $this->_var['weixin']; ?>" width="100" height="100" alt=""></div>
      <div class="conner fr">
        <div class="tel">
          <p><strong><?php echo $this->_var['service_phone']; ?></strong></p>
          <p>周一至周日9:00-23:00</p>
          <?php if ($this->_var['qq']): ?>
          <p><a href="tencent://message/?uin=<?php echo $this->_var['qq']; ?>&Site=<?php echo $this->_var['shop_name']; ?>&Menu=yes" target="_blank"><img src="themes/default/images/robot/online.gif" alt=""></a></p>
          <?php endif; ?>
          
        </div>
        <div class="share">
          <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>


  <div class="copyright">
    <div class="w1160px">
      <p>
       <?php if ($this->_var['navigator_list']['bottom']): ?>
       <?php $_from = $this->_var['navigator_list']['bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav_0_36804900_1467447753');$this->_foreach['nav_bottom_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_bottom_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav_0_36804900_1467447753']):
        $this->_foreach['nav_bottom_list']['iteration']++;
?>
            <a href="<?php echo $this->_var['nav_0_36804900_1467447753']['url']; ?>" <?php if ($this->_var['nav_0_36804900_1467447753']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav_0_36804900_1467447753']['name']; ?></a>
            <?php if (! ($this->_foreach['nav_bottom_list']['iteration'] == $this->_foreach['nav_bottom_list']['total'])): ?>
               |
            <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endif; ?>

      </p>
      <p> <?php echo $this->_var['copyright']; ?>  <a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $this->_var['icp_number']; ?></a>
      <?php if ($this->_var['stats_code']): ?>
         <divsh><?php echo $this->_var['stats_code']; ?></div>
      <?php endif; ?>
      </p>
      
      <div class="safe-site mt20">
        <a href="#" title=""><img src="themes/default/images/robot/safe1.jpg" alt=""></a><a href="#" title=""><img src="themes/default/images/robot/safe2.jpg" alt=""></a><a href="#" title=""><img src="themes/default/images/robot/safe3.jpg" alt=""></a>
      </div>
    </div>
  </div>

</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'focus.js,mousevent.js,ztab.js,simplefoucs.js')); ?>
