<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de sisvinculos';
$config['recordAddTitle']=' Nuevo sisvinculos';
$config['recordEditTitle']=' Editar sisvinculos';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['_id']='id';
$config['sismenu_id']='sismenu_id';
$config['link']='link';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by__id']= 1;
$config['search_by_sismenu_id']= 0;
$config['search_by_link']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show__id']= 1;
$config['show_sismenu_id']= 1;
$config['show_link']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['flash_add_message']= 'The sisvinculos has been successfully added.';
$config['flash_edit_message']= 'The sisvinculos has been successfully updated.';
$config['flash_delete_message']= 'The sisvinculos has been successfully deleted';
$config['flash_error_delete_message']= 'The sisvinculos hasn\'t been deletedd';
$config['flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file settings.php */
/* Location: ./application/config/settings.php */
