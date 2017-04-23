<?php
/* Smarty version 3.1.30, created on 2017-04-16 12:43:41
  from "C:\wamp64\www\micro_blog_Smarty\vue\form_ins.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f366fd1fe951_12064497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93f4afe4567dc479f870551c7ec382595c777b33' => 
    array (
      0 => 'C:\\wamp64\\www\\micro_blog_Smarty\\vue\\form_ins.tpl',
      1 => 1485881538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./bas.tpl' => 1,
  ),
),false)) {
function content_58f366fd1fe951_12064497 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id ="style" class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
					<h3 class="panel-title">Veuillez vous inscrire  <small>c'est gratuit!</small></h3>
			 	</div>
				<div class="panel-body">
		    		<form role="form" action="validInscription.php" method="post">
		    			<div class="row">
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group">
									<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Votre nom">
			   					</div>
			    			</div>
			    			<div class="col-xs-6 col-sm-6 col-md-6">
			   					<div class="form-group">
			   						<input type="text" name="pseudo" id="pseudo" class="form-control input-sm" placeholder="Votre pseudo">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Addresse email">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="mot de passe">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm mot de pass">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" name="submit" value="Inscription" class="btn btn-info btn-block">
			    		</div>
			    	</form>
			    </div>
	    	</div>
    	</div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:./bas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
