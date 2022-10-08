<?php
/* Smarty version 4.2.1, created on 2022-10-07 22:10:08
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\detalle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634087a05bb839_75232699',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b98c6394db136c0f5d9f145924a9870d2281e4dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\detalle.tpl',
      1 => 1665171887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
    'file:app/Templates/footer.tpl' => 1,
  ),
),false)) {
function content_634087a05bb839_75232699 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/Templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
?>
        <div class="container text-center">
            <img width="140" src="" alt="Imagen de <?php echo $_smarty_tpl->tpl_vars['auto']->value->nombre;?>
">
        </div>
        <p class="fs-5 pt-4 m-4"><?php echo $_smarty_tpl->tpl_vars['auto']->value->descripcion;?>
</p>
        <a class="btn btn-primary m-4" href='home'>Volver</a>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:app/Templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
