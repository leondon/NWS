<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$views = array ('cn1', 'cn2','cn3', 'cn4', 'jp1', 'jp2','jp3', 'jp4','jp5', 'en1','en2', 'en3','en4');
$view = (! empty ( $view ) && in_array ( $view, $views )) ? $view : 'cn1';
if (file_exists ( ADMIN_ROOT . 'admin_' . $do . '_' . $view . '.php' )) {
	require_once ADMIN_ROOT . 'admin_' . $do . '_' . $view . '.php';
} else {
	kekezu::admin_show_msg ( $_lang['404_page'],'',3,'','warning');
}