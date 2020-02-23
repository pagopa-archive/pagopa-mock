<?php
/* Smarty version 3.1.33, created on 2019-05-13 15:01:07
  from 'D:\OneDrive - Agid\Sviluppo\Web\Mock\views\template_base.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd96a93f2d077_91819351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '727d4d2431d6c6ce692e67bb00469f2f820d05c7' => 
    array (
      0 => 'D:\\OneDrive - Agid\\Sviluppo\\Web\\Mock\\views\\template_base.tpl',
      1 => 1557752463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/header_base.tpl' => 1,
  ),
),false)) {
function content_5cd96a93f2d077_91819351 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="en">
<head>

    <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>

</head>
<body>

<?php $_smarty_tpl->_subTemplateRender("file:views/header_base.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo $_smarty_tpl->tpl_vars['page_content']->value;?>


</body>
</html><?php }
}
