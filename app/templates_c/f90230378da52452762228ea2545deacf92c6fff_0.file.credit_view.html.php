<?php
/* Smarty version 3.1.33, created on 2019-03-19 18:49:19
  from 'C:\xampp\htdocs\PHP\html_smarty\app\credit_view.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c912b9f627495_28977275',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f90230378da52452762228ea2545deacf92c6fff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\html_smarty\\app\\credit_view.html',
      1 => 1553017754,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c912b9f627495_28977275 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!-- rozszerzamy plik podstawowy -->


<!-- blok z opisem, też wchodzi w treść ale dla wygody wydzielony -->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3160377905c912b9f5fdec9_28283109', 'desc');
?>



<!-- główny blok z treścią -->
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15218772045c912b9f5ff6b8_43319003', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/index.html");
}
/* {block 'desc'} */
class Block_3160377905c912b9f5fdec9_28283109 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'desc' => 
  array (
    0 => 'Block_3160377905c912b9f5fdec9_28283109',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<p>Jest to prosty kalkulator kredytowy dla oprocentowania rocznego. Oblicza on ratę miesięczną oraz całkowity koszt kredytu na podstawie kwoty kredytu, długości trwania kredytu w latach (możliwe podanie liczby zmiennoprzecinkowej, np. 0.25) oraz oprocentowania (również umożliwiono podanie kwoty zmiennoprzecinkowej).</p>
	<p>Rata miesięczna kredytu jest wyliczana ze wzoru matematycznego: <strong>R = [K * q^n * (q-1)] / (q^n - 1)</strong></p> 
	<p>Współczynnik q wyliczany jest ze wzoru <strong>q = 1 + (1/12) * (p/100)</strong></p>
	<p class="desc"><i>K - kwota pożyczki; q - współczynnik procentowy; p - oprocentowanie (%); n - liczba miesięcy (rat)</i></p>
<?php
}
}
/* {/block 'desc'} */
/* {block 'content'} */
class Block_15218772045c912b9f5ff6b8_43319003 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15218772045c912b9f5ff6b8_43319003',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/credit.php#credit" method="post" id="credit">
	<label for="kwota">Kwota kredytu:</label>
	<input autocomplete="off" id="kr_kwota" type="text" name="kwota" value="<?php if (isset($_smarty_tpl->tpl_vars['kwota']->value)) {
echo $_smarty_tpl->tpl_vars['kwota']->value;
}?>" placeholder="Kwota w zł"><br/>
	<label for="dlugosc">Na ile lat?</label>
	<input autocomplete="off" id="dlugosc" type="text" name="ileLat" value="<?php if (isset($_smarty_tpl->tpl_vars['ileLat']->value)) {
echo $_smarty_tpl->tpl_vars['ileLat']->value;
}?>" placeholder="Długość w latach"><br/>
	<label for="oprocentowanie">Oprocentowanie:</label>
	<input placeholder="Wartość w %" autocomplete="off" id="oprocentowanie" type="text" name="oprocentowanie" value="<?php if (isset($_smarty_tpl->tpl_vars['oprocentowanie']->value)) {
echo $_smarty_tpl->tpl_vars['oprocentowanie']->value;
}?>"><br/>

	<input type="checkbox" id="copy" value="tak" name="liczKredyt" <?php if (isset($_smarty_tpl->tpl_vars['liczKredyt']->value) || $_smarty_tpl->tpl_vars['liczKredyt']->value == true) {?>checked<?php }?> required><label for="copy">Wiem, że dane są tylko poglądowe</label><br/>
	<input type="submit" value="Oblicz" />
</form><div class="messages">
		<?php if (isset($_smarty_tpl->tpl_vars['messages']->value)) {?>
		<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
			<h4>Znaleziono błędy!</h4>
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
		<?php }?>
	<?php }?>

		<?php if (isset($_smarty_tpl->tpl_vars['infos']->value)) {?>
		<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?>
			<h4>Znaleziono błędy!</h4>
			<ol id="info">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
					<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ol>
		<?php }?>
	<?php }?>

		<?php if (isset($_smarty_tpl->tpl_vars['rataKredytu']->value)) {?>
		<div class="result_success">
			Rata miesięczna kredytu: <?php echo $_smarty_tpl->tpl_vars['rataKredytu']->value;?>
<br/>Całkowity koszt: <?php echo $_smarty_tpl->tpl_vars['calkowityKoszt']->value;?>

		</div>
	<?php }?>
</div>

<?php
}
}
/* {/block 'content'} */
}
