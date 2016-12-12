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
<link href="<?php echo $this->_var['jd_css_path']; ?>" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
<script type="text/javascript">
function $id(element) {
  return document.getElementById(element);
}
//切屏--是按钮，_v是内容平台，_h是内容库
function reg(str){
  var bt=$id(str+"_b").getElementsByTagName("h2");
  for(var i=0;i<bt.length;i++){
    bt[i].subj=str;
    bt[i].pai=i;
    bt[i].style.cursor="pointer";
    bt[i].onclick=function(){
      $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
      for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++){
        var _bt=$id(this.subj+"_b").getElementsByTagName("h2")[j];
        var ison=j==this.pai;
        _bt.className=(ison?"":"h2bg");
      }
    }
  }
  $id(str+"_h").className="none";
  $id(str+"_v").innerHTML=$id(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
}

</script>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<?php echo $this->fetch('library/jd_toolbar.lbi'); ?>
<script type="text/javascript">
 $(function(){
      $(".thumb_img").mouseenter(function() {
          $('#coverimg').attr('src',$(this).find('img').attr('data-img-url'));
          $('#coverimg').attr('jqimg', $(this).find('img').attr('data-orig-url'));
      });

      $(".tabmenu").click(function() {

          var tabid = $(this).attr('data-id');
          $('.tab_content').hide();
          $('#' + tabid).show();
          $('.tabmenu').removeClass('hover');
          $(this).addClass('hover');
      });
      
 });

function setAmount(type) {
  var number = parseInt($('#number').val());
  var result;
  if (type=='add') {
    result = number+1;
  } else if (type=='reduce') {
    if (number == 1) return;
    result = number-1;
  }
  $('#number').val(result);
  changePrice();
}
</script>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.jqzoom.js,base.js')); ?>


<div class="main">
    <div class="mg-cate w1160px clearfix">
    <?php echo $this->fetch('library/category_tree.lbi'); ?>
    
    </div>

    <form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
        <div class="w1160px clearfix">
          
          <div class="mg-subnav mt20">
            <?php echo $this->fetch('library/ur_here.lbi'); ?>
          </div>
          

          
          
          <div class="mg-item-info mt20 fl clearfix">
            <div class="previewLeft fl">
              <div id="preview" class="spec-preview">
                    <?php if ($this->_var['pictures']): ?>
                       <span>
                           <a href="javascript:;" onclick="window.open('gallery.php?id=<?php echo $this->_var['goods']['goods_id']; ?>'); return false;" class="jqzoom">
                            <img src="<?php echo $this->_var['goods']['goods_img']; ?>" jqimg="<?php echo $this->_var['goods']['original_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" id="coverimg" width="300px"/>
                           </a>
                        </span>
                    <?php else: ?>
                      <span class="jqzoom">
                      <img src="<?php echo $this->_var['goods']['goods_img']; ?>" jqimg="<?php echo $this->_var['goods']['original_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" id="coverimg" width="300px"/></span>
                    <?php endif; ?>
              </div>
              
              <div class="spec-scroll"> <a class="prev"></a> <a class="next"></a>
                <div class="items">
                  <ul>
                     <?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');if (count($_from)):
    foreach ($_from AS $this->_var['picture']):
?>
                      <li class="thumb_img"><a href="gallery.php?id=<?php echo $this->_var['id']; ?>&amp;img=<?php echo $this->_var['picture']['img_id']; ?>" target="_blank"><img src="<?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" class="B_blue" data-orig-url="<?php echo $this->_var['picture']['img_original']; ?>" data-img-url="<?php echo $this->_var['picture']['img_url']; ?>" /></a>
                      </li>
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </ul>
                </div>
              </div>
              
            </div>
            <div class="mg-sp-content fl">
              <h2><?php echo $this->_var['goods']['goods_style_name']; ?></h2>
              <ul>
                <li class="clearfix"><div >
                     <?php if ($this->_var['cfg']['show_marketprice']): ?>
                     <span><?php echo $this->_var['lang']['market_price']; ?></span><font class="market"><?php echo $this->_var['goods']['market_price']; ?></font><br />
                     <?php endif; ?>
                     
                     <span><?php echo $this->_var['lang']['shop_price']; ?></span><font class="price" id="ECS_SHOPPRICE"><?php echo $this->_var['goods']['shop_price_formated']; ?></font>
                    
                </div></li>

                <?php if ($this->_var['goods']['is_shipping']): ?>
                <li class="clearfix"><div class="font"><?php echo $this->_var['lang']['goods_free_shipping']; ?></div></li>
                <?php endif; ?>

                <?php if ($this->_var['cfg']['show_goodsweight']): ?>
                   <li class="clearfix"><span><?php echo $this->_var['lang']['goods_weight']; ?></span><div class="font"><?php echo $this->_var['goods']['goods_weight']; ?></div></li>
                <?php endif; ?>

                <?php if ($this->_var['cfg']['show_goodssn']): ?>
                  <li class="clearfix"><span><?php echo $this->_var['lang']['goods_sn']; ?></span><div class="font"><?php echo $this->_var['goods']['goods_sn']; ?></div></li>
                <?php endif; ?>

                <?php if ($this->_var['cfg']['show_addtime']): ?>
                    <li class="clearfix"><span><?php echo $this->_var['lang']['add_time']; ?></span><div class="font"><?php echo $this->_var['goods']['add_time']; ?></div></li>
                <?php endif; ?>

                <li class="bg clearfix"><span>销售情况</span><div class="font">评价数 <b><?php echo $this->_var['comment_count']; ?></b> | 已售 <b><?php echo $this->_var['sale_count']; ?></b> </div></li>


                
                <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
                    <li class="mg-color clearfix"><span><?php echo $this->_var['spec']['name']; ?>：</span>

                      <?php if ($this->_var['spec']['attr_type'] == 1): ?>
                          <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?>
                            <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                                
                                <input type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> onclick="changePrice()" />
                                <label for="spec_value_<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?></label>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                          <?php else: ?>
                                <select name="spec_<?php echo $this->_var['spec_key']; ?>" onchange="changePrice()">
                                  <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                                  <option label="<?php echo $this->_var['value']['label']; ?>" value="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> <?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?><?php if ($this->_var['value']['price'] != 0): ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?></option>
                                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </select>
                                <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                          <?php endif; ?>
                      <?php else: ?>
                          <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                          
                          <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" onclick="changePrice()" />
                          <label for="spec_value_<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?></label>
                            
                          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                          <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                      <?php endif; ?>
                    </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                


                <li class="clearfix"><span><?php echo $this->_var['lang']['goods_rank']; ?></span><img src="themes/default/images/stars<?php echo $this->_var['goods']['comment_rank']; ?>.gif" alt="comment rank <?php echo $this->_var['goods']['comment_rank']; ?>" style="margin-top:5px;"/></li>

                <li class="clearfix"><span><?php echo $this->_var['lang']['amount']; ?>：</span><div class="price" id="ECS_GOODS_AMOUNT"></div></li>

                <li class="mg-number clearfix"><span>订购数量</span><div class="font">

                  <a herf="javascript:;" class="cuts" onclick="setAmount('reduce')">-</a>
                  <input id="number" type="text" size="4" value="1" name="number" onblur="changePrice()">
                  <a herf="javascript:;" class="plus" onclick="setAmount('add')">+</a>
                  &nbsp;   
                  <?php if ($this->_var['goods']['goods_number'] != "" && $this->_var['cfg']['show_goodsnumber']): ?>
                  <?php if ($this->_var['goods']['goods_number'] == 0): ?>
                      <?php echo $this->_var['lang']['goods_number']; ?>
                      <font color='red'><?php echo $this->_var['lang']['stock_up']; ?></font>
                    <?php else: ?>
                      <?php echo $this->_var['lang']['goods_number']; ?>
                      <?php echo $this->_var['goods']['goods_number']; ?> <?php echo $this->_var['goods']['measure_unit']; ?>
                    <?php endif; ?>
                  <?php endif; ?>

                </div></li>


                <li class="clearfix"><span><?php echo $this->_var['lang']['goods_click_count']; ?>：</span><div class="font"><?php echo $this->_var['goods']['click_count']; ?></div></li>


              </ul>
              <div class="mg-cart clearfix">
                <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="in-cart"><span>加入购物车</span></a>
                <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)" class="save">收藏商品</a>
              </div>


              
              <?php if ($this->_var['volume_price_list']): ?>
              <div class="mg-all-sale">
                <table>
                  <tr>
                    <th class="tb1"><?php echo $this->_var['lang']['number_to']; ?></th>
                    <?php $_from = $this->_var['volume_price_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('price_key', 'price_list');if (count($_from)):
    foreach ($_from AS $this->_var['price_key'] => $this->_var['price_list']):
?>
                    <th class="tb<?php echo $this->_var['price_key']; ?>"><?php echo $this->_var['price_list']['number']; ?></th>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </tr>
                  <tr>
                    <td class="tb1"><?php echo $this->_var['lang']['preferences_price']; ?></td>
                    <?php $_from = $this->_var['volume_price_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('price_key', 'price_list');if (count($_from)):
    foreach ($_from AS $this->_var['price_key'] => $this->_var['price_list']):
?>
                    <td class="tb<?php echo $this->_var['price_key']; ?> font"><?php echo $this->_var['price_list']['format_price']; ?></td>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </tr>
                </table>
              </div>
              <?php endif; ?>

            </div>
          </div>
          
          
          
          <div class="mg-sidebar mt20 fr">
            
            <div class="mg-leftlist">
              <h2 class="mg-cate-title">热卖推荐</h2>
              <ul>
                  <?php if ($this->_var['best_goods']): ?>
                <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_34674000_1467447753');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_34674000_1467447753']):
?>
                <li class="clearfix">
                  <div class="mg-listpic fl">
                    <a href="<?php echo $this->_var['goods_0_34674000_1467447753']['url']; ?>"><img src="<?php echo $this->_var['goods_0_34674000_1467447753']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_34674000_1467447753']['name']); ?>"></a>
                  </div>
                  <div class="mg-listdes fl">
                    <p><a href="<?php echo $this->_var['goods_0_34674000_1467447753']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_34674000_1467447753']['name']); ?>"><?php echo $this->_var['goods_0_34674000_1467447753']['short_style_name']; ?></a></p>
                    <p class="price">
                        <?php if ($this->_var['goods_0_34674000_1467447753']['promote_price'] != ""): ?>
                        <?php echo $this->_var['goods_0_34674000_1467447753']['promote_price']; ?>
                        <?php else: ?>
                        <?php echo $this->_var['goods_0_34674000_1467447753']['shop_price']; ?>
                        <?php endif; ?>
                    </p>
                  </div>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          
        </div>
    </form>

    <?php echo $this->fetch('library/taocan.lbi'); ?>


    
    <div class="w1160px mg-product-detail mt20">
      <div class="mg-pro-hd">
        <ul>
          <li class="hover tabmenu" data-id="desc_tab"><?php echo $this->_var['lang']['goods_brief']; ?></li>
          <li class="tabmenu" data-id="buy_tab">购买记录（<?php echo $this->_var['sale_count']; ?>）</li>
          <li class="tabmenu" data-id="commnet_tab"><?php echo $this->_var['lang']['user_comment']; ?>（<?php echo $this->_var['comment_count']; ?>）</li>
        </ul>
      </div>
      
      <div class="mg-pro-bd">

        <div class="mg-info tab_content" id="desc_tab">
          <div class="sub-wrap">

            <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
            <h4 class="tit"><?php echo htmlspecialchars($this->_var['key']); ?></h4>
            <div class="attributes">
              <table>
                <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
                <tr>
                  <td class="gray"><?php echo htmlspecialchars($this->_var['property']['name']); ?>:</td>
                  <td><?php echo $this->_var['property']['value']; ?></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </table>
            </div>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

            <h4 class="tit mt20">详细说明</h4>
            <div class="mg-content mt20">
              <?php echo $this->_var['goods']['goods_desc']; ?>
            </div>
          </div>
        </div>

        <div class="mg-info tab_content" style="display: none;" id="buy_tab">
          <?php 
$k = array (
  'name' => 'bought_notes',
  'id' => $this->_var['id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        </div>

        <div class="mg-info tab_content" style="display: none;" id="commnet_tab">
          <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,utils.js')); ?>
          <?php 
$k = array (
  'name' => 'comments',
  'type' => $this->_var['type'],
  'id' => $this->_var['id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        </div>

      </div>
    </div>

</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>

</body>
<script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function(){
  changePrice();
  fixpng();
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;

  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}

/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    if (document.getElementById('ECS_GOODS_AMOUNT'))
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
  }
}

</script>
</html>
