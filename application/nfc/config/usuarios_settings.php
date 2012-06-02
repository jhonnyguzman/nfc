<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']='Usuarios';
$config['recordAddTitle']='Nuevo usuario';
$config['recordEditTitle']='Editar usuario';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['_id']='Id';
$config['username']='Nombre de usuario';
$config['password']='Contraseña';
$config['nombre']='Nombre';
$config['apellido']='Apellido';
$config['email']='Email';
$config['direccion']='Direccion';
$config['telefono']='Telefono';
$config['estado']='Estado';
$config['estado_descripcion']='Estado';
$config['legajo']='Legajo';
$config['perfiles_id']='Perfil';
$config['perfiles_descripcion']='Perfil';
$config['activationcode']='Codigo de activación';
$config['tokenforgotpasswd']='Token';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado';

/* Config fields for search */

$config['search_by__id']= 0;
$config['search_by_username']= 1;
$config['search_by_password']= 0;
$config['search_by_nombre']= 1;
$config['search_by_apellido']= 1;
$config['search_by_email']= 0;
$config['search_by_direccion']= 0;
$config['search_by_telefono']= 0;
$config['search_by_estado']= 0;
$config['search_by_legajo']= 0;
$config['search_by_perfiles_id']= 0;
$config['search_by_activationcode']= 0;
$config['search_by_tokenforgotpasswd']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show__id']= 1;
$config['show_username']= 1;
$config['show_password']= 1;
$config['show_nombre']= 0;
$config['show_apellido']= 0;
$config['show_email']= 1;
$config['show_direccion']= 0;
$config['show_telefono']= 0;
$config['show_estado']= 0;
$config['show_estado_descripcion']= 0;
$config['show_legajo']= 0;
$config['show_perfiles_id']= 0;
$config['show_perfiles_descripcion']= 1;
$config['show_activationcode']= 0;
$config['show_tokenforgotpasswd']= 0;
$config['show_created_at']= 0;
$config['show_updated_at']= 0;


/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['flash_add_message']= 'The usuarios has been successfully added.';
$config['flash_edit_message']= 'The usuarios has been successfully updated.';
$config['flash_delete_message']= 'The usuarios has been successfully deleted';
$config['flash_error_delete_message']= 'The usuarios hasn\'t been deletedd';
$config['flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file settings.php */
/* Location: ./application/config/settings.php */
