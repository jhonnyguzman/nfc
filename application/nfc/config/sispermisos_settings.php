<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de sispermisos';
$config['recordAddTitle']=' Nuevo permiso';
$config['recordEditTitle']=' Editar permiso';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['_id']='Id';
$config['tabla']='Tabla';
$config['flag_read']='¿Puede leer?';
$config['flag_insert']='¿Puede insertar?';
$config['flag_update']='¿Puede modificar?';
$config['flag_delete']='¿Puede eliminar?';
$config['perfiles_id']='Perfil';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado';

/* Config fields for search */

$config['search_by__id']= 1;
$config['search_by_tabla']= 0;
$config['search_by_flag_read']= 0;
$config['search_by_flag_insert']= 0;
$config['search_by_flag_update']= 0;
$config['search_by_flag_delete']= 0;
$config['search_by_perfiles_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show__id']= 1;
$config['show_tabla']= 1;
$config['show_flag_read']= 1;
$config['show_flag_insert']= 1;
$config['show_flag_update']= 1;
$config['show_flag_delete']= 1;
$config['show_perfiles_id']= 1;
$config['show_created_at']= 0;
$config['show_updated_at']= 0;


/* Config params of pagination */

$config['pag_perpage']= 20;

/* Config flash messages */

$config['flash_add_message']= 'The sispermisos has been successfully added.';
$config['flash_edit_message']= 'The sispermisos has been successfully updated.';
$config['flash_delete_message']= 'The sispermisos has been successfully deleted';
$config['flash_error_delete_message']= 'The sispermisos hasn\'t been deletedd';
$config['flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file settings.php */
/* Location: ./application/config/settings.php */
