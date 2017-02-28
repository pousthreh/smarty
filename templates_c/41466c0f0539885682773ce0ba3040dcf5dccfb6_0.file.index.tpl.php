<?php
/* Smarty version 3.1.30, created on 2017-02-28 14:31:26
  from "C:\wamp\www\micro_blog_Smarty\vue\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b57bae9a9fb6_97896437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41466c0f0539885682773ce0ba3040dcf5dccfb6' => 
    array (
      0 => 'C:\\wamp\\www\\micro_blog_Smarty\\vue\\index.tpl',
      1 => 1485874386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b57bae9a9fb6_97896437 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">              
    <form method="post" action="message.php"><?php echo '<?php ';?>if (isset($_COOKIE['psudo'])){ <?php echo '?>';?>
        <div class="col-sm-10">  
            <div class="form-group">
               
                <textarea id="message" name="message" class="form-control"
				placeholder="Message"><?php echo '<?php ';?>if (isset($message)) { echo $var['contenu']; } <?php echo '?>';?></textarea>
            </div>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
        </div>                        
    </form><?php echo '<?php ';?>} <?php echo '?>';?>
</div><?php }
}
