<?php /* Smarty version Smarty-3.1.16, created on 2016-09-26 16:19:15
         compiled from "../invtipofact/view/Data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187783551657e98eb4a11464-61984762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b95d3d2d362ac2f0d88dc0c4f476a777a8fe55ae' => 
    array (
      0 => '../invtipofact/view/Data.tpl',
      1 => 1474924748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187783551657e98eb4a11464-61984762',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57e98eb4a1d4e9_98994621',
  'variables' => 
  array (
    'NAV_MENU' => 0,
    'ACTION' => 0,
    'ID' => 0,
    'DATA' => 0,
    'BTN_ACTION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e98eb4a1d4e9_98994621')) {function content_57e98eb4a1d4e9_98994621($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['NAV_MENU']->value;?>

	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>Información Tipo de Factura</h2>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id="frmData" action="processData.php" method="POST">
					<input type="hidden" id="action" name="action" value="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
">						
 			 	<fieldset>
					<div class="control-group" id="boxid" >
						<label class="control-label" for="disabledInput">ID Tipo Factura*</label>
						<div class="controls">
							<input class="input-xlarge " name="fId" id="fId" type="text" style="text-transform:uppercase" placeholder="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
" maxlength="15" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['ACTION']->value==2) {?> readonly="true"<?php }?> >
						</div>
					</div>						
					<div class="control-group" id="boxdescripcion" >
						<label class="control-label" for="focusedInput">Descripción</label>
						<div class="controls">
							<input class="input-xlarge focused" name ="fdescripcion" id="fdescripcion" maxlength="100"  type="text" value="<?php echo $_smarty_tpl->tpl_vars['DATA']->value[0]['descripcion'];?>
">
					    </div>
					</div>
					<div class="control-group" id="boxsiglas" >
						<label class="control-label" for="focusedInput">Siglas*</label>
						<div class="controls">
							<input class="input-xlarge focused" name ="fsiglas" id="fsiglas" maxlength="50" type="text" value="<?php echo $_smarty_tpl->tpl_vars['DATA']->value[0]['siglas'];?>
">
						</div>
				 	</div>
				 	</div>
 					<div class="modal-footer">
						<button id=btnSubFrmData type="submit" name="enviar" class="btn btn-large btn-primary pull-right"><?php echo $_smarty_tpl->tpl_vars['BTN_ACTION']->value;?>
</button>
						<a href="index.php" class="btn btn-large pull-right" data-dismiss="modal">Cerrar</a>
						<div id="message-fields-obl"></div> 
					</div> 					
				</fieldset>
		  </form>			
		    </div>				
		</div>		
	</div>

<script type="text/javascript">
$(document).ready(function(){
	// Si la action es igual a 3 significa que es un borrado
	// Si la action es igual a 4 significa que es solo visualizar
	// se buscar desabilitar todos los campos y que solo pueda seleccionar los botones de accion.
	var newAction = document.getElementById('action'); 
	if (newAction.value == "3" || newAction.value == "4"){
		$("#frmData :input").attr('readonly', true);
	}else{
		if (newAction.value == "1"){
		   $("#boxid").hide();
			$("#fdescripcion").focus();
			
		}else{
			$("#fvalor").focus();
		}
	}
});

$(function(){
	
    $('#frmData').validate({ 
        submitHandler: function (form) {             
            $("#message-fields-obl").css("display","none");
            form.submit();            
        }
    });
    $("#fnombre").rules('add', {
        required: function(){$("#boxnombre").removeClass("error"); return true;},
        messages: {
            required:  function(){
                               $("#boxnombre").addClass("error");
                               $("#message-fields-obl").html("<div class='alert alert-error pull-right' style=''><strong><span class='icon icon-red icon-alert'/></span> Nombre es Requerido</strong></div>");
                            }
        }
    });
    
    $("#fvalor").rules('add', {
        required: function(){$("#boxvalor").removeClass("error"); return true;},
        messages: {
            required:  function(){
                               $("#boxvalor").addClass("error");
                               $("#message-fields-obl").html("<div class='alert alert-error pull-right' style=''><strong><span class='icon icon-red icon-alert'/></span> Valor es Requerido</strong></div>");
                            }
        }
    });
});
</script>
	<?php }} ?>
