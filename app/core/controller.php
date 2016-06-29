<?php
Class Controller
{
	protected function model($model)
	{
		require_once __DIR__.'/../models/'.$model.'.php';
		return new $model();
	}

	protected function view($view,$data= array(),$layout = true)
	{
		if($layout==false)
		{
			ob_start();
			require_once __DIR__.'/../views/'.$view.'.php';
			return ob_get_clean();
		}
		require_once __DIR__.'/../views/'.$view.'.php';
	}
}