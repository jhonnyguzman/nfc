<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de mesas';
$config['recordAddTitle']=' Nuevo mesas';
$config['recordEditTitle']=' Editar mesas';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['_id']='Id';
$config['estado']='Estado';
$config['estado_descripcion']='Estadp';
$config['descripcion']='Descripci&oacute;n';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by__id']= 1;
$config['search_by_estado']= 0;
$config['search_by_estado_descripcion']= 0;
$config['search_by_descripcion']= 1;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show__id']= 1;
$config['show_estado']= 1;
$config['show_estado_descripcion']= 1;
$config['show_descripcion']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 15;

/* Config flash messages */

$config['mesas_flash_add_message']= 'The mesas has been successfully added.';
$config['mesas_flash_edit_message']= 'The mesas has been successfully updated.';
$config['mesas_flash_delete_message']= 'The mesas has been successfully deleted';
$config['mesas_flash_error_delete_message']= 'The mesas hasn\'t been deletedd';
$config['mesas_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file mesas_settings.php */
/* Location: ./application/config/mesas_settings.php */
