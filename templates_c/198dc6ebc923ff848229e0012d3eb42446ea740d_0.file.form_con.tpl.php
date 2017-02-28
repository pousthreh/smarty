<?php
/* Smarty version 3.1.30, created on 2017-02-28 14:16:28
  from "C:\wamp\www\micro_blog_Smarty\vue\form_con.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b5782c327a88_02507050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '198dc6ebc923ff848229e0012d3eb42446ea740d' => 
    array (
      0 => 'C:\\wamp\\www\\micro_blog_Smarty\\vue\\form_con.tpl',
      1 => 1485881577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./bas.tpl' => 1,
  ),
),false)) {
function content_58b5782c327a88_02507050 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Connexion au site</h3>
			 	</div>
			  	<div class="panel-body">
				<div id="notif"></div>
			    	<form accept-charset="UTF-8" action="maconnexion.php" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" id="name" placeholder="Votre pseudo" name="pseudo" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" id="password" name="password" type="password" >
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" id="envoyer" name="submit" type="submit" value="se connecter">
			    	</fieldset>
			      	</form>
                      <hr/>
                    <center><h4>OR</h4></center>
                    <input class="btn btn-lg btn-facebook btn-block" type="submit" value="Login via facebook">
			    </div>
			</div>
		</div>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:./bas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
