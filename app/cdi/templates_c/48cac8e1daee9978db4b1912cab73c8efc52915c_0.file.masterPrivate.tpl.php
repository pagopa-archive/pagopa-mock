<?php
/* Smarty version 3.1.33, created on 2019-05-13 15:51:26
  from 'D:\OneDrive - Agid\Sviluppo\Web\Mock\views\masterPrivate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd9765eab9bf5_28873609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48cac8e1daee9978db4b1912cab73c8efc52915c' => 
    array (
      0 => 'D:\\OneDrive - Agid\\Sviluppo\\Web\\Mock\\views\\masterPrivate.tpl',
      1 => 1557755482,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/header.tpl' => 1,
    'file:views/footer.tpl' => 1,
  ),
),false)) {
function content_5cd9765eab9bf5_28873609 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Mock del Nodo dei Pagamenti SPC">
  <meta name="author" content="pagoPA">

  <!-- CSS -->
  <link rel="stylesheet" href="views/bootstrap-italia/css/bootstrap-italia.min.css">
  <link rel="stylesheet" href="views/bootstrap-italia/css/comuni.min.css">
  <link rel="stylesheet" href="views/bootstrap-italia/css/comuni-print.min.css">

  <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>

</head>
<body>

  <?php $_smarty_tpl->_subTemplateRender("file:views/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <main>

    <div class="container">
      <div class="row">
        <div class="col my-5">

          <!-- MAIN CONTENT
          ================================================== -->
          <?php echo $_smarty_tpl->tpl_vars['page_content']->value;?>

          <!-- / MAIN CONTENT
          ================================================== -->

        </div>
      </div>
    </div>

  </main>

  <?php $_smarty_tpl->_subTemplateRender("file:views/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
