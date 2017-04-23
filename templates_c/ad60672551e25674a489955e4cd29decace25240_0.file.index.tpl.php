<?php
/* Smarty version 3.1.30, created on 2017-04-17 12:23:43
  from "C:\wamp64\www\micro_blog_Smarty\vue\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f4b3cf67bb45_75248197',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad60672551e25674a489955e4cd29decace25240' => 
    array (
      0 => 'C:\\wamp64\\www\\micro_blog_Smarty\\vue\\index.tpl',
      1 => 1492429197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f4b3cf67bb45_75248197 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp64\\www\\micro_blog_Smarty\\vendor\\smarty\\plugins\\modifier.date_format.php';
if (isset($_smarty_tpl->tpl_vars['connecte']->value) && $_smarty_tpl->tpl_vars['connecte']->value == true) {?>
  <p>
    <div class="row">
      <!--affichage du div pour envoiyer a la base (lesmessage "contenu")-->
      <form method="post"
      <?php if (isset($_smarty_tpl->tpl_vars['linkId']->value) && $_smarty_tpl->tpl_vars['linkId']->value == 'false') {?>
        action="message.php"
      <?php }?>>
          <div class="col-sm-10">
              <div class="form-group">
                  <textarea id="message" name="message" class="form-control" placeholder="Message"><?php if (isset($_smarty_tpl->tpl_vars['tab']->value)) {
echo $_smarty_tpl->tpl_vars['tab']->value;
}?></textarea>
              </div>
          </div>
          <div class="col-sm-2">
              <button type="submit" class="btn btn-success btn-lg">
                  <!-- differenciation de l'envoi-->
                <?php if (isset($_smarty_tpl->tpl_vars['linkId']->value) && $_smarty_tpl->tpl_vars['linkId']->value == 'false') {?>
                  Envoyer
                <?php } else { ?>
                  Modifier
                <?php }?>
              </button>
          </div>
      </form>
    </div>
  </p>
<?php }
if (isset($_smarty_tpl->tpl_vars['lesContenus']->value) && !empty($_smarty_tpl->tpl_vars['lesContenus']->value)) {?>
  <!-- 1er boucle pour les elements de la base -->
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lesContenus']->value, 'con', false, 'IdTab');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['IdTab']->value => $_smarty_tpl->tpl_vars['con']->value) {
?>
    <!-- affichage de la base-->
    <blockquote>
      <b><?php echo $_smarty_tpl->tpl_vars['con']->value;?>
</b> , <i>auteur : </i> <?php echo $_smarty_tpl->tpl_vars['con']->value;?>
 <br>le : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['con']->value,"%A, %B %e, %Y");?>


      <!-- Si user connecte alors on afficher les boutons de suppression de modification !-->
      <?php if (isset($_smarty_tpl->tpl_vars['connecte']->value) && $_smarty_tpl->tpl_vars['connecte']->value == 1) {?>
          <a href="index.php?idDel=<?php echo $_smarty_tpl->tpl_vars['IdTab']->value+1;?>
" class="bout"><button class="btn btn-danger btn-sm">Del</button></a>
          <a href="index.php?id=<?php echo $_smarty_tpl->tpl_vars['IdTab']->value+1;?>
" class="bout"><button class="btn btn-default btn-sm">Edit</button></a>
      <?php }?>
    </blockquote>
  <?php
}
} else {
?>

    Aucun élément n'a été trouvé dans la recherche
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }?>

<!-- pagination -->
<div id="pagination">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li>
        <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['prec']->value;?>
" aria-label="prec">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php
$_smarty_tpl->tpl_vars['page'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int) ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pagination']->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0) {
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++) {
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration == 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration == $_smarty_tpl->tpl_vars['page']->total;?>
        <li><a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
      <?php }
}
?>

      <li>
        <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['suiv']->value;?>
" aria-label="suiv">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
<?php }
}
