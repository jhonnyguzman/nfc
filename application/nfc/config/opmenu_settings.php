<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']='Opciones de men&uacute;';
$config['recordAddTitle']='Nueva opci&oacute;n de menu';
$config['recordEditTitle']='Editar opci&oacute;n de menu';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['_id']='Id';
$config['nombre']='Nombre';
$config['descripcion']='Descripci&oacute;n';
$config['precio']='Precio';
$config['categorias_id']='Categoria';
$config['categoria_descripcion']='Categoria';
$config['thumb']='Im&aacute;gen';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by__id']= 1;
$config['search_by_nombre']= 0;
$config['search_by_descripcion']= 0;
$config['search_by_precio']= 0;
$config['search_by_categorias_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show__id']= 1;
$config['show_nombre']= 1;
$config['show_descripcion']= 1;
$config['show_precio']= 1;
$config['show_categorias_id']= 1;
$config['show_categoria_descripcion']= 1;
$config['show_thumb']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 10;

/* Config flash messages */

$config['opmenu_flash_add_message']= 'The opmenu has been successfully added.';
$config['opmenu_flash_edit_message']= 'The opmenu has been successfully updated.';
$config['opmenu_flash_delete_message']= 'The opmenu has been successfully deleted';
$config['opmenu_flash_error_delete_message']= 'The opmenu hasn\'t been deletedd';
$config['opmenu_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file opmenu_settings.php */
/* Location: ./application/config/opmenu_settings.php */
