<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ $title }} - {{ Lang::get('app.app_name') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- ===================== TOUCH ICONS ===================== -->
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">

    <!-- ===================== MASTER CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">

    <!-- ===================== ICONS CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/icon/fugue.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/icon/elusive.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/icon/font-awesome.min.css') }}">

    <!-- ===================== SITE CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/default.responsive.min.css') }}">

    <!-- ===================== PLUGINS CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/plugins/uniform.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/plugins/jquery.validation.engine.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/plugins/jquery.stepy.css') }}">

    <!-- ===================== JQUERY UI CSS ===================== -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jui/jquery.ui.min.css') }}">
	
	<style type="text/css">
		#login-content .login-area {
			display: block;
			margin: auto;
		}
	</style>

    <script src="{{ URL::asset('js/vendors/modernizr-2.6.2.min.js') }}"></script>
</head>
<body class="body5">