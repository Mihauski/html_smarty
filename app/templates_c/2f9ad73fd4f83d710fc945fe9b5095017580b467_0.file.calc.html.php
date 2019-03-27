<?php
/* Smarty version 3.1.33, created on 2019-03-19 19:04:55
  from 'C:\xampp\htdocs\PHP\html_smarty\app\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c912f47213dd6_32614989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f9ad73fd4f83d710fc945fe9b5095017580b467' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\html_smarty\\app\\calc.html',
      1 => 1553018693,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c912f47213dd6_32614989 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19771362435c912f471e6fd7_74180497', 'desc');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17194691455c912f471e8898_26214094', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/index.html");
}
/* {block 'desc'} */
class Block_19771362435c912f471e6fd7_74180497 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'desc' => 
  array (
    0 => 'Block_19771362435c912f471e6fd7_74180497',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<p>Jest to prosty kalkulator arytmetyczny, umożliwiający dodawanie, odejmowanie, mnożenie oraz dzielenie.</p>
<?php
}
}
/* {/block 'desc'} */
/* {block 'content'} */
class Block_17194691455c912f471e8898_26214094 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17194691455c912f471e8898_26214094',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php#calc" method="post" id="calc">
	<fieldset>
		<label for="x">Pierwsza liczba</label>
		<input id="x" type="text" placeholder="wartość x" name="x" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['x'];?>
">
		<label for="op">Operacja</label>
		<div class="select-wrapper">
		<select id="op" name="op">

<?php if (isset($_smarty_tpl->tpl_vars['form']->value['op_name'])) {?>
<option value="<?php echo $_smarty_tpl->tpl_vars['form']->value['op'];?>
">ponownie: <?php echo $_smarty_tpl->tpl_vars['form']->value['op_name'];?>
</option>
<option value="" disabled="true">---</option>
<?php }?>
			<option value="plus">(+) dodaj</option>
			<option value="minus">(-) odejmij</option>
			<option value="times">(*) pomnóż</option>
			<option value="div">(/) podziel</option>
		</select>
	</div>
					
		<label for="y">Druga liczba</label>
		<input id="y" type="text" placeholder="wartość y" name="y" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['y'];?>
">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

<?php if (isset($_smarty_tpl->tpl_vars['messages']->value)) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol id="message">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if (isset($_smarty_tpl->tpl_vars['infos']->value)) {?>
	<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?> 
		<h4>Informacje: </h4>
		<ol id="info">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if (isset($_smarty_tpl->tpl_vars['result']->value)) {?>
<div class="result_success">
	Wynik: <?php echo $_smarty_tpl->tpl_vars['result']->value;?>

	</div>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
