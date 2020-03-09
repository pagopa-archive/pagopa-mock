<?php
/* Smarty version 3.1.33, created on 2019-06-04 14:54:42
  from '/var/www/html/moc/cdi/views/masterPrettyPrint.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf66a120eff67_65052040',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c80b2be170ba988b390d96e35ab1d38ebf88cad' => 
    array (
      0 => '/var/www/html/moc/cdi/views/masterPrettyPrint.tpl',
      1 => 1559204677,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf66a120eff67_65052040 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Include required JS files -->
<?php echo '<script'; ?>
 type="text/javascript" src="views/SyntaxHighlighter/shCore.js"><?php echo '</script'; ?>
>

<!--
    At least one brush, here we choose JS. You need to include a brush for every
    language you want to highlight
-->
<?php echo '<script'; ?>
 type="text/javascript" src="views/SyntaxHighlighter/shBrushXml.js"><?php echo '</script'; ?>
>

<!-- Include *at least* the core style and default theme -->
<link href="views/SyntaxHighlighter/shCore.css" rel="stylesheet" type="text/css" />
<link href="views/SyntaxHighlighter/shThemeDefault.css" rel="stylesheet" type="text/css" />
<link href="views/SyntaxHighlighter/prettycode.css" rel="stylesheet" type="text/css" />


<!-- Finally, to actually run the highlighter, you need to include this JS on your page -->
<?php echo '<script'; ?>
 type="text/javascript">
    SyntaxHighlighter.all()
<?php echo '</script'; ?>
><?php }
}
