<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de ordenes';
$config['recordAddTitle']=' Nuevo ordenes';
$config['recordEditTitle']=' Editar ordenes';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['_id']='_id';
$config['opmenu_id']='opmenu_id';
$config['cantidad']='cantidad';
$config['montotal']='montotal';
$config['observacion']='observacion';
$config['estado']='estado';
$config['mesas_id']='mesas_id';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by__id']= 1;
$config['search_by_opmenu_id']= 0;
$config['search_by_cantidad']= 0;
$config['search_by_montotal']= 0;
$config['search_by_observacion']= 0;
$config['search_by_estado']= 0;
$config['search_by_mesas_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show__id']= 1;
$config['show_opmenu_id']= 1;
$config['show_cantidad']= 1;
$config['show_montotal']= 1;
$config['show_observacion']= 1;
$config['show_estado']= 1;
$config['show_mesas_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['ordenes_flash_add_message']= 'The ordenes has been successfully added.';
$config['ordenes_flash_edit_message']= 'The ordenes has been successfully updated.';
$config['ordenes_flash_delete_message']= 'The ordenes has been successfully deleted';
$config['ordenes_flash_error_delete_message']= 'The ordenes hasn\'t been deletedd';
$config['ordenes_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file ordenes_settings.php */
/* Location: ./application/config/ordenes_settings.php */
