<?php /* Smarty version Smarty-3.1.16, created on 2016-10-24 14:01:24
         compiled from "../invformapago/view/Data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134460773657ea9cf354a996-50505841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7da258778cd47c7d2ec08592eef5c4bd333d7f7a' => 
    array (
      0 => '../invformapago/view/Data.tpl',
      1 => 1476217344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134460773657ea9cf354a996-50505841',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57ea9cf3553ac5_86251260',
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
<?php if ($_valid && !is_callable('content_57ea9cf3553ac5_86251260')) {function content_57ea9cf3553ac5_86251260($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['NAV_MENU']->value;?>

	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>Información Forma de Pago</h2>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id="frmData" action="processData.php" method="POST">
					<input type="hidden" id="action" name="action" value="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
">						
 			 	<fieldset>
					<div class="control-group" id="boxid" >
						<label class="control-label" for="disabledInput">ID Tipo Factura*</label>
						<div class="controls">
							<input class="input-xlarge " name="fId" id="fId" type="text" style="text-transform:uppercase" placeholder="Digite ID (Use Mayuscula)" maxlength="15" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['ACTION']->value==2) {?> readonly="true"<?php }?> >
						</div>
					</div>						
					<div class="control-group" id="boxdesccorta" >
						<label class="control-label" for="focusedInput">Descripción Corta</label>
						<div class="controls">
							<input class="input-xlarge focused" name ="fdesccorta" id="fdesccorta" maxlength="100"  type="text" value="<?php echo $_smarty_tpl->tpl_vars['DATA']->value[0]['descCorta'];?>
">
					    </div>
					</div>
					<div class="control-group" id="boxdesclarga" >
						<label class="control-label" for="focusedInput">Descripción Larga</label>
						<div class="controls">
							<input class="input-xlarge focused" name ="fdesclarga" id="fdesclarga" maxlength="100"  type="text" value="<?php echo $_smarty_tpl->tpl_vars['DATA']->value[0]['descLarga'];?>
">
					    </div>
					</div>
					<div class="control-group" id="boxdescripcion" >
						<label class="control-label" for="focusedInput">No.Posicion</label>
						<div class="controls">
							<input class="input-xlarge focused" name ="fposlista" id="fposlista" maxlength="100"  type="text" value="<?php echo $_smarty_tpl->tpl_vars['DATA']->value[0]['posLista'];?>
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
		   //$("#boxid").hide();
		   //$("#fdescripcion").focus();
		   $("#fboxid").focus();
			
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
