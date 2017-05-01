<?php 



use Claws\Support\Theme;
use Claws\Support\Settings;
use Claws\Support\PostRegister;


//- Blade Helpers


function editorContent($data){
	return "<div class='ql-editor'>".$data."</div>";
}


function siteTitle(){
	return Settings::get('site_name');
}
