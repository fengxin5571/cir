<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?>商城</title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />
<?php echo $this->smarty_insert_scripts(array('files'=>'focus.js')); ?>
</head>
<body>
  
<?php echo $this->fetch('library/page_header.lbi'); ?>


<div class="main">
    
    <div class="w1160px clearfix">
      
      <?php echo $this->fetch('library/category_tree.lbi'); ?>
      
      
      
      <?php echo $this->fetch('library/index_ad.lbi'); ?>
      
      <div class="home-news fr">

      <?php if ($this->_var['user_info']): ?>
        <div class="user-region clearfix">
          <div class="user-head fl"><img src="themes/default/images/robot/avatar-80.png" width="60" height="60" alt=""></div>
          <div class="unlogin fl">
            <div class="unlogin-wel mb10">Hi,<font class="f4_b"><?php echo $this->_var['user_info']['username']; ?></font>, <?php echo $this->_var['lang']['welcome_return']; ?>！</div>
            <p><a href="user.php" class="login-btn" title="<?php echo $this->_var['lang']['user_center']; ?>"><?php echo $this->_var['lang']['user_center']; ?></a><a href="user.php?act=logout" class="register-btn ml10" title="<?php echo $this->_var['lang']['user_logout']; ?>"><?php echo $this->_var['lang']['user_logout']; ?></a></p>
          </div>
        </div>
      <?php else: ?>
        <div class="user-region clearfix">
          <div class="user-head fl"><img src="themes/default/images/robot/avatar-80.png" width="60" height="60" alt=""></div>
          <div class="unlogin fl">
            <div class="unlogin-wel mb10">Hi,您好！</div>
            <p><a href="user.php" class="login-btn" title="<?php echo $this->_var['lang']['label_login']; ?>"><?php echo $this->_var['lang']['label_login']; ?></a><a href="user.php?act=register" class="register-btn ml10" title="<?php echo $this->_var['lang']['label_regist']; ?>"><?php echo $this->_var['lang']['label_regist']; ?></a></p>
          </div>
        </div>
        <?php endif; ?>
        <?php echo $this->fetch('library/new_articles.lbi'); ?>

      </div>
    </div>
    
    
    <div class="w1160px">
      
      <div class="tab mt20" _ztab="tab1">
        <ul class="title clearfix">
          <li class="zt-title zt-selected">推荐产品</li>
          <li class="zt-title">热卖产品</li>
        </ul>
        <div class="cont">
          <div class="zt-cont">
            <div class="bannerbox">
                <div id="banner">
                    <ul>
                      <li>
                          <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
                          <?php if ($this->_var['key'] != 0 && $this->_var['key'] % 12 == 0): ?></li><li><?php endif; ?>
                          <?php if ($this->_var['key'] % 12 == 0): ?>
                          <div class="scroll-list mt20 clearfix">
                          <?php endif; ?>
                          <?php if ($this->_var['key'] == 6 || $this->_var['key'] == 18): ?></div><div class="line"></div><div class="scroll-list clearfix"><?php endif; ?>
                            <div class="scroll-li <?php if (( $this->_var['key'] + 1 ) % 6 == 0 && $this->_var['key'] != 0): ?>noborder<?php endif; ?>">
                              <a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="140" height="140" alt=""></a>
                              <h2><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><?php echo $this->_var['goods']['short_style_name']; ?></a></h2>
                              <p>
                                <?php if ($this->_var['goods']['promote_price'] != ""): ?>
                                <?php echo $this->_var['goods']['promote_price']; ?>
                                <?php else: ?>
                                <?php echo $this->_var['goods']['shop_price']; ?>
                                <?php endif; ?>
                                <span><b><?php echo $this->_var['goods']['sale_count']; ?></b>人已购买</span>
                              </p>
                            </div>
                             <?php if ($this->_var['key'] + 1 == 12 || $this->_var['key'] + 1 == 24): ?></div><?php endif; ?>
                           <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                      </li>
                    </ul>
                </div>
            </div>
          </div>
          <div class="zt-cont" style="display:none;">
            <div class="bannerbox">
                <div id="banner1">
                    <ul>
                       <li>
                       <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
                          <?php if ($this->_var['key'] != 0 && $this->_var['key'] % 12 == 0): ?></li><li><?php endif; ?>
                          <?php if ($this->_var['key'] % 12 == 0): ?>
                          <div class="scroll-list mt20 clearfix">
                          <?php endif; ?>
                          <?php if ($this->_var['key'] == 6 || $this->_var['key'] == 18): ?></div><div class="line"></div><div class="scroll-list clearfix"><?php endif; ?>
                            <div class="scroll-li <?php if (( $this->_var['key'] + 1 ) % 6 == 0 && $this->_var['key'] != 0): ?>noborder<?php endif; ?>">
                              <a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="140" height="140" alt=""></a>
                              <h2><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><?php echo $this->_var['goods']['short_style_name']; ?></a></h2>
                              <p>
                                <?php if ($this->_var['goods']['promote_price'] != ""): ?>
                                <?php echo $this->_var['goods']['promote_price']; ?>
                                <?php else: ?>
                                <?php echo $this->_var['goods']['shop_price']; ?>
                                <?php endif; ?>
                                <span><b><?php echo $this->_var['goods']['sale_count']; ?></b>人已购买</span>
                              </p>
                            </div>
                            <?php if ($this->_var['key'] + 1 == 12 || $this->_var['key'] + 1 == 24): ?></div><?php endif; ?>
                           <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </li>
                    </ul>
                </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
    
    <div class="w1160px">
      
      <div class="mol">
        <div class="mol-hd"><span><a href="<?php echo $this->_var['factory_url']; ?>" title="">更多产品>> </a></span></div>
        <div class="mol-bd clearfix">
          <div class="big fl">
            <div class="big-tit" id="big-tit2"><strong>智慧工厂</strong><p>Wisdom factory</p></div>
            <div class="big-img"><a href="<?php echo $this->_var['factory_url']; ?>" title=""><img src="themes/default/images/robot/big1.jpg" width="201" height="410" alt=""></a></div>
          </div>
          <div class="img-list fl">
            <ul>
              <?php $_from = $this->_var['factory_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
                  <li class="con"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><img style="box-shadow: 0px 0px 3px rgb(150, 150, 150);" src="<?php echo $this->_var['goods']['goods_img']; ?>" width="225" height="219" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"></a><div class="txt"><h3><?php echo htmlspecialchars($this->_var['goods']['name']); ?></h3>
                  <p> <?php if ($this->_var['goods']['promote_price'] != ""): ?>
                                <?php echo $this->_var['goods']['promote_price']; ?>
                                <?php else: ?>
                                <?php echo $this->_var['goods']['shop_price']; ?>
                                <?php endif; ?>
                                   &nbsp;&nbsp;&nbsp;&nbsp;<span><a  href="<?php echo $this->_var['goods']['url']; ?>" title="在线订购">在线订购</a></span></p></div></li>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
          </div>
          
          <div class="rank fr">
            <div class="rank-hd"><h3>热销商品</h3></div>
            <div class="rank-bd">
              <ul>
                <?php $_from = $this->_var['factory_hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
                <li>
                  <div class="rank-thub fl"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" tar<?php echo htmlspecialchars($this->_var['goods']['name']); ?>get="_blank"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="64" height="71" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"></a></div>
                  <div class="rank-tit fr ml10">
                    <h4><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><?php echo $this->_var['goods']['short_style_name']; ?></a></h4>
                    <p><span><?php echo $this->_var['goods']['shop_price']; ?></span></p>
                  </div>
                  <div class="clr"></div>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
               
              </ul>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class="adv mt20">
        <?php 
$k = array (
  'name' => 'ads',
  'id' => '1',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </div>
      
      <div class="mol">
        <div class="mol-hd"><span><a href="<?php echo $this->_var['life_url']; ?>" title="">更多产品>> </a></span></div>
        <div class="mol-bd clearfix">
          <div class="big fl">
            <div class="big-tit"><strong>智慧生活</strong><p>Intelligent life</p></div>
            <div class="big-img"><a href="<?php echo $this->_var['life_url']; ?>" title=""><img src="themes/default/images/robot/big.jpg" width="201" height="410" alt=""></a></div>
          </div>
          <div class="img-list fl">
            <ul>
              <?php $_from = $this->_var['life_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
                  <li class="con"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><img style="box-shadow: 0px 0px 3px rgb(150, 150, 150);" src="<?php echo $this->_var['goods']['goods_img']; ?>" width="225" height="219" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"></a><div class="txt"><h3><?php echo htmlspecialchars($this->_var['goods']['name']); ?></h3><p><?php if ($this->_var['goods']['promote_price'] != ""): ?>
                                <?php echo $this->_var['goods']['promote_price']; ?>
                                <?php else: ?>
                                <?php echo $this->_var['goods']['shop_price']; ?>
                                <?php endif; ?>
                                   &nbsp;&nbsp;&nbsp;&nbsp; <span><a  href="<?php echo $this->_var['goods']['url']; ?>" title="在线订购">在线订购</a></span></p></div></li>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
          </div>
          
          <div class="rank fr">
            <div class="rank-hd"><h3>热销商品</h3></div>
            <div class="rank-bd">
              <ul>
                <?php $_from = $this->_var['life_hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
                <li>
                  <div class="rank-thub fl"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" tar<?php echo htmlspecialchars($this->_var['goods']['name']); ?>get="_blank"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="64" height="71" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"></a></div>
                  <div class="rank-tit fr ml10">
                    <h4><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><?php echo $this->_var['goods']['short_style_name']; ?></a></h4>
                    <p><span><?php echo $this->_var['goods']['shop_price']; ?></span></p>
                  </div>
                  <div class="clr"></div>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class="adv mt20">
        <?php 
$k = array (
  'name' => 'ads',
  'id' => '2',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </div>


      
      <div class="mol">
        <div class="mol-hd"><span><a href="<?php echo $this->_var['parts_url']; ?>" title="">更多产品>> </a></span></div>
        <div class="mol-bd clearfix">
          <div class="big fl">
            <div class="big-tit" id="big-tit3"><strong style="margin-left:15px;">机器人零部件</strong><p>Robot parts</p></div>
            <div class="big-img"><a href="<?php echo $this->_var['parts_url']; ?>" title=""><img src="themes/default/images/robot/big2.jpg" width="201" height="410" alt=""></a></div>
          </div>
          <div class="img-list fl">
            <ul>
               <?php $_from = $this->_var['parts_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
                  <li class="con"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><img style="box-shadow: 0px 0px 3px rgb(150, 150, 150);" src="<?php echo $this->_var['goods']['goods_img']; ?>" width="225" height="219" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"></a><div class="txt"><h3><?php echo htmlspecialchars($this->_var['goods']['name']); ?></h3><p><?php if ($this->_var['goods']['promote_price'] != ""): ?>
                                <?php echo $this->_var['goods']['promote_price']; ?>
                                <?php else: ?>
                                <?php echo $this->_var['goods']['shop_price']; ?>
                                <?php endif; ?>
                                   &nbsp;&nbsp;&nbsp;&nbsp; <span><a  href="<?php echo $this->_var['goods']['url']; ?>" title="在线订购">在线订购</a></span></p></div></li>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
          </div>
          
          <div class="rank fr">
            <div class="rank-hd"><h3>热销商品</h3></div>
            <div class="rank-bd">
              <ul>
               <?php $_from = $this->_var['parts_hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
?>
                <li>
                  <div class="rank-thub fl"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" tar<?php echo htmlspecialchars($this->_var['goods']['name']); ?>get="_blank"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="64" height="71" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"></a></div>
                  <div class="rank-tit fr ml10">
                    <h4><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><?php echo $this->_var['goods']['short_style_name']; ?></a></h4>
                    <p><span><?php echo $this->_var['goods']['shop_price']; ?></span></p>
                  </div>
                  <div class="clr"></div>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class="adv mt20">
          <?php 
$k = array (
  'name' => 'ads',
  'id' => '3',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </div>
    </div>
    
    
    <?php if ($this->_var['txt_links']): ?>
    <div class="w1160px">
      <div class="friendlink mt50"><strong>友情链接：</strong>
        <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
        <a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
    </div>
    <?php endif; ?>
    
  </div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>
