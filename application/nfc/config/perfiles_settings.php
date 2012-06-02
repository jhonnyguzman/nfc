<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']='Perfiles';
$config['recordAddTitle']=' Nuevo Perfil';
$config['recordEditTitle']=' Editar Perfil';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['_id']='Id';
$config['descripcion']='Descripci&oacute;n';
$config['estado']='Estado';
$config['estado_descripcion']='Estado';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by__id']= 0;
$config['search_by_descripcion']= 1;
$config['search_by_estado']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show__id']= 0;
$config['show_descripcion']= 1;
$config['show_estado']= 0;
$config['show_estado_descripcion']= 1;
$config['show_created_at']= 0;
$config['show_updated_at']= 0;


/* Config params of pagination */

$config['pag_perpage']= 10;

/* Config flash messages */

$config['flash_add_message']= 'The perfiles has been successfully added.';
$config['flash_edit_message']= 'The perfiles has been successfully updated.';
$config['flash_delete_message']= 'The perfiles has been successfully deleted';
$config['flash_error_delete_message']= 'The perfiles hasn\'t been deletedd';
$config['flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file settings.php */
/* Location: ./application/config/settings.php */
