<?php 

class WT_Main{
	protected static $__instance=null;
	
	protected function __construct(){
		add_action('admin_init',array($this,'adminInit'));
		add_action('admin_menu',array($this,'addMenu'));
		add_action('wp_enqueue_scripts',array($this,'loadScripts'));
		add_filter('wp_footer',array($this,'renderTime'));
	}
	
	public static function init(){
		if(self::$__instance===null){
			self::$__instance=new self();
		}
		return self::$__instance;
	}
	
	public function adminInit(){
		register_setting('wt-settings','_wt_time_1');
		register_setting('wt-settings','_wt_time_2');
		register_setting('wt-settings','_wt_time_3');
		register_setting('wt-settings','_wt_time_4');
	}
	
	public function addMenu(){
		add_options_page(__('World Time'),__('World Time'),'manage_options','wt-settings',array($this,'optionsPage'));
	}
	
	public function optionsPage(){
		if(!current_user_can('manage_options')){
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		ob_start();
		require dirname(dirname(__FILE__)).'/tpl/admin.php';
		$html=ob_get_contents();
		ob_clean();
		echo $html;
	}
	
	public function getTimezones($opt){
		$tz_list=DateTimeZone::listIdentifiers();
		$current=get_option('_wt_time_'.$opt,'');
		$options=array();
		foreach($tz_list as $tz){
			$options[]='<option value="'.$tz.'"'.($tz==$current?' selected="selected"':'').'>'.$tz.'</option>';
		}
		return implode("\n",$options);
	}
	
	public function loadScripts(){
		wp_enqueue_style('world-time',plugins_url('css/world-time.css',dirname(__FILE__)));
		wp_enqueue_script('jquery');
		wp_enqueue_script('word-time',plugins_url('js/world-time.js',dirname(__FILE__)));
	}
	
	public function renderTime(){
		$current=date_default_timezone_get();
		$html='<div class="world-time-container">';
		for($i=1;$i<=4;$i++){
			$tz=get_option('_wt_time_'.$i,$current);
			if(trim($tz)==''){
				$tz=$current;
			}
			$_tz=new DateTimeZone($tz);
			$time=new DateTime('now',$_tz);
			$offset=$_tz->getOffset($time);
			$_hours=round(abs($offset)/3600);
			$_minutes=round((abs($offset)-$_hours*3600)/60);
			$_offset=($offset<0?'-':'+').$_hours.':'.$_minutes;
			$html.='<span class="world-time-'.$i.'"><strong>'.$tz.' : </strong><span data-offset="'.$_offset.'">'.$time->format('H:i:s').'</span></span>';
		}
		$html.='</div>';
		echo $html;
	}
	
}