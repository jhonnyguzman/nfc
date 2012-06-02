<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de Controller';
$config['recordAddTitle']=' Nuevo Controller';
$config['recordEditTitle']=' Editar Controller';

/* Config labels of the form fields */

$config['_id']='id';
$config['descripcion']='descripcion';
$config['estado']='estado';
$config['parent']='parent';
$config['iconpath']='iconpath';
$config['created_at']='created_at';
$config['updated_at']='updated_at';
$config['sisvinculos_link']='Link';

/* Config fields for search */

$config['search_by__id']= 1;
$config['search_by_descripcion']= 0;
$config['search_by_estado']= 0;
$config['search_by_parent']= 0;
$config['search_by_iconpath']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show__id']= 1;
$config['show_descripcion']= 1;
$config['show_estado']= 1;
$config['show_parent']= 1;
$config['show_iconpath']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;
$config['show_sisvinculos_link']= 1;

/* Config params of pagination */

$config['pag_perpage']= 20;

/* Config flash messages */

$config['flash_add_message']= 'The sismenu has been successfully added.';
$config['flash_edit_message']= 'The sismenu has been successfully updated.';
$config['flash_delete_message']= 'The sismenu has been successfully deleted';
$config['flash_error_delete_message']= 'The sismenu hasn\'t been deletedd';
$config['flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file settings.php */
/* Location: ./application/config/settings.php */
