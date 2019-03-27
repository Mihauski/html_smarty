<?php
/* Smarty version 3.1.33, created on 2019-03-19 19:13:54
  from 'C:\xampp\htdocs\PHP\html_smarty\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c91316288f132_46264165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '121ca1c5257ac2bed99b74cbad6a52702fef6ce9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\html_smarty\\templates\\index.html',
      1 => 1553019219,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c91316288f132_46264165 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "PHPage by Mihauski" : $tmp);?>
</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/main.css" />
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><strong><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
">PHPage</a></strong> by Mihauski</h1>
				<nav id="nav">
					<ul>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php#calc">Kalkulator prosty</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/credit.php#credit">Kalkulator kredytowy</a></li>
						<!-- <li><a href="<?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value['loggedin'])) {
echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/security/logout.php<?php } else {
echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/security/login.php<?php }?>"><?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value['loggedin'])) {?>Wyloguj<?php } else { ?>Zaloguj<?php }?></a></li> -->
					</ul>
				</nav>
			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Banner -->
			<section id="banner">
				<h2>PHPage</h2>
				<p>Ta prosta strona zawiera w sobie kalkulator arytmetyczny <br /> oraz kalkulator kredytowy.</p>
				<ul class="actions">
					<li><a href="#three" class="button special big">Przejdź dalej</a></li>
				</ul>
			</section>

			<!-- Three -->
				<section id="three" class="wrapper style1">
					<div class="container">
						<header class="">
							<h2><?php echo (($tmp = @$_smarty_tpl->tpl_vars['heading']->value)===null||$tmp==='' ? "Domyślna treść nagłówka" : $tmp);?>
</h2>
						</header>
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1276426335c91316288b590_80769732', 'content');
?>

							</div>
							<div class="6u 12u$(medium)">
								<p><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11346434795c91316288cca6_97151369', 'desc');
?>
</p>
							</div>
						</div>
						</div>
					</div>
				</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<!--<ul class="icons">
						<li><a href="#" class="icon fa-facebook"></a></li>
						<li><a href="#" class="icon fa-twitter"></a></li>
						<li><a href="#" class="icon fa-instagram"></a></li>
					</ul>-->
					<ul class="copyright">
						<li>&copy; 2019</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
						<li>Modified by Michał Michalski</li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/skel.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/js/main.js"><?php echo '</script'; ?>
>

	</body>
</html><?php }
/* {block 'content'} */
class Block_1276426335c91316288b590_80769732 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1276426335c91316288b590_80769732',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'desc'} */
class Block_11346434795c91316288cca6_97151369 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'desc' => 
  array (
    0 => 'Block_11346434795c91316288cca6_97151369',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Domyślna treść bloku opisu...<?php
}
}
/* {/block 'desc'} */
}
