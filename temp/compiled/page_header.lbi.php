<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.9.1.min.js')); ?>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
<div class="container">

  <div class="top">
    <div class="w1160px clearfix">
      <div class="welcome fl">欢迎光临<?php echo $this->_var['shop_name']; ?></div>
      <div class="topnav fr">
       <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,utils.js,json2.js')); ?>
       <?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>

       <?php $_from = $this->_var['navigator_list']['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_top_list']['iteration']++;
?>
            <a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

      </div>
    </div>
  </div>


  <div class="header">
    <div class="w1160px clearfix">
      
      <h1 class="logo fl mt40"><a href="index.php" name="top" title="<?php echo $this->_var['shop_name']; ?>"><img src="themes/default/images/robot/cirlogo.png" width="480" height="60" alt="<?php echo $this->_var['shop_name']; ?>"></a></h1>
      
      

      <script type="text/javascript">
      
      <!--
      function checkSearchForm()
      {
          if(document.getElementById('keyword').value)
          {
              return true;
          }
          else
          {
              alert("<?php echo $this->_var['lang']['no_keywords']; ?>");
              return false;
          }
      }
      -->
      
      </script>
      <div class="soso clearfix fl mt30">
        <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()">
        <input name="keywords" type="text" id="keyword" class="soso-input fl" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>">
        <input type="submit" class="soso-btn" value="">
        </form>
        <p>
        <?php if ($this->_var['searchkeywords']): ?>
        <?php $_from = $this->_var['searchkeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
        <?php if ($this->_var['key'] > 0): ?>|<?php endif; ?><a href="search.php?keywords=<?php echo urlencode($this->_var['val']); ?>"><?php echo $this->_var['val']; ?></a>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>
        </p>
      </div>
      
      <div class="settle fr mt30">
        <div class="settleup">购物车<span>(<?php 
$k = array (
  'name' => 'cart_num',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>)</span>件</div>
        <div class="settledown"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?><br><button onclick="location.href='flow.php'">查看我的购物车</button></div>
      </div>
    </div>
  </div>



  <div class="nav mt20">
    <div class="w1160px clearfix">
      <div class="category fl hand" id="cate-bg">
        <div class="cate-ico" id="cate-ico-hover"></div>全部商品分类<span class="cateup"></span>
      </div>
      <div class="navitems fl">
        <ul>
          <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
          <li><a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?> <?php if ($this->_var['nav']['active'] == 1): ?> class="cur "<?php endif; ?>><?php echo $this->_var['nav']['name']; ?><span></span></a><span class="nav-hover"></span></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <div class="clr"></div>
        </ul>
      </div>
    </div>
  </div>
