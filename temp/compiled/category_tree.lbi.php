
    <ul class="catelist fl">
      <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
      <li>
        <h2><a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a></h2>
        <p>
        <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['catchild'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['catchild']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['catchild']['iteration']++;
?>
          <?php if ($this->_foreach['catchild']['iteration'] <= 2): ?>
          <a href="<?php echo $this->_var['child']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </p>
        <div class="catebox">
          <strong><a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a></strong>
          <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['catchild'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['catchild']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['catchild']['iteration']++;
?>
          <a href="<?php echo $this->_var['child']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
      </li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 

    </ul>