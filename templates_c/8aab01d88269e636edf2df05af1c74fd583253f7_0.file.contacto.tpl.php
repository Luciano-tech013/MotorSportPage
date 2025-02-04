<?php
/* Smarty version 4.2.1, created on 2024-12-19 18:59:35
  from 'F:\software development\xampp\htdocs\motorsportpage\app\Templates\contacto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_67645f070ea510_24927315',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8aab01d88269e636edf2df05af1c74fd583253f7' => 
    array (
      0 => 'F:\\software development\\xampp\\htdocs\\motorsportpage\\app\\Templates\\contacto.tpl',
      1 => 1732989091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/header.tpl' => 1,
    'file:app/templates/footer.tpl' => 1,
  ),
),false)) {
function content_67645f070ea510_24927315 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="text-center shadow p-3 mb-5 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
<div class="text-center">
    <ul class="list-group p-4">
        <li class="list-group-item badge text-bg-danger">INSTAGRAM</li>
        <li class="list-group-item badge text-bg-info">FACEBOOK</li>
        <li class="list-group-item badge text-bg-primary">GitHub</li>
    </ul>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:app/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
