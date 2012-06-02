<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de Categorias';
$config['recordAddTitle']=' Nuevo categoria';
$config['recordEditTitle']=' Editar categoria';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['_id']='Id';
$config['descripcion']='Descripci&oacute;n';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by__id']= 1;
$config['search_by_descripcion']= 1;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show__id']= 1;
$config['show_descripcion']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 18;

/* Config flash messages */

$config['categorias_flash_add_message']= 'The categorias has been successfully added.';
$config['categorias_flash_edit_message']= 'The categorias has been successfully updated.';
$config['categorias_flash_delete_message']= 'The categorias has been successfully deleted';
$config['categorias_flash_error_delete_message']= 'The categorias hasn\'t been deletedd';
$config['categorias_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file categorias_settings.php */
/* Location: ./application/config/categorias_settings.php */
