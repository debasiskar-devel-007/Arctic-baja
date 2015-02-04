<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
    'defaultController'=>'product',

	// preloading 'log' component
	'preload'=>array('log','bootstrap','image'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'ext.x-editable.*',
        'ext.yii-mail.YiiMailMessage',
        'application.extensions.image.*',
        'application.components.*',
        'application.extensions.phpass.PasswordHash',  
        'application.modules.product.models.Product', 
        'application.modules.product.models.TransactionOrderDetails', 
        'application.modules.blog.models.Blog',
         'application.extensions.helpers.*',    
         'application.extensions.galleria.*',    
        'application.models.Country', 
        'application.models.AffiliatePerClick', 
        	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
                  'generatorPaths' => array(
          'bootstrap.gii'
       ),
			'class'=>'system.gii.GiiModule',
			'password'=>'P@ssword1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1',$_SERVER['REMOTE_ADDR'],'::1'),
		),
        
        'product','user','blog','cms','landing_page_manager','Contactus','gallery','aboutus',
		
	),

	// application components
	'components'=>array(
    
        'phpThumb'=>array(
            'class'=>'ext.EPhpThumb.EPhpThumb',
        ),
        
                /*    This is for epdf extension for converting a html to pdf */
        'ePdf' => array(
            'class'         => 'ext.yii-pdf.EYiiPdf',
            'params'        => array(
                'mpdf'     => array(
                    'librarySourcePath' => 'application.vendors.mpdf.*',
                    'constants'         => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                    /*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                    'mode'              => '', //  This parameter specifies the mode of the new document.
                    'format'            => 'A4', // format A4, A5, ...
                    'default_font_size' => 0, // Sets the default document font size in points (pt)
                    'default_font'      => '', // Sets the default font-family for the new document.
                    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                    'mgr'               => 15, // margin_right
                    'mgt'               => 16, // margin_top
                    'mgb'               => 16, // margin_bottom
                    'mgh'               => 9, // margin_header
                    'mgf'               => 9, // margin_footer
                    'orientation'       => 'P', // landscape or portrait orientation
                    )*/
                ),
                'HTML2PDF' => array(
                    'librarySourcePath' => 'application.vendors.html2pdf.*',
                    'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                    /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                    'orientation' => 'P', // landscape or portrait orientation
                    'format'      => 'A4', // format A4, A5, ...
                    'language'    => 'en', // language: fr, en, it ...
                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                    'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                    )*/
                )
            ),
        ),

        
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType'=>'smtp',
            'transportOptions'=>array(
                'host'=>'smtp.gmail.com',
                'username'=>'itplcc40@gmail.com',
                'password'=>'itplcc123456',
                'port'=>465,
                'encryption'=>'ssl',
            ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false
        ),
        
        //'assetManager'=>array(
         //   'class'=>'application.components.SafeModeAssetManager',
        //),
        
         'bootstrap' => array(
        'class' => 'ext.bootstrap.components.Bootstrap',
        'responsiveCss' => true,
            ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
             'showScriptName'=>false,
			'rules'=>array(

                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                'register' => 'user/default/register/role/user',
                'login' => 'user/default/login',
                'profile'=>'user/default/profile',
                'select-activities' => 'user/default/activities',
                'experience'=>'user/default/experience',
                array(
                    'class' => 'application.components.OurUrlRule',
                    'connectionID' => 'db',
                ),
                ''

			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database

        // This is for influxhostserver
        /*
                'db'=>array(
                    'connectionString' => 'mysql:host=50.31.146.74;dbname=influxho_ecom_demo',
                    'emulatePrepare' => true,
                    'username' => 'influxho_ecom',
                    'password' => 'Password@1',
                    'charset' => 'utf8',
                ),
                */
// This is for localhost

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=torqkdtv_datatorqkd',
            'emulatePrepare' => true,
            'username' => 'torqkdtv_torqkd',
            'password' => 'torqkd',
            'charset' => 'utf8',
        ),

// This is for valescere
        /*
                'db'=>array(
                    'connectionString' => 'mysql:host=localhost;dbname=valescer_maindb',
                    'emulatePrepare' => true,
                    'username' => 'valescer_user',
                    'password' => 'pass@123',
                    'charset' => 'utf8',
                ),
                */
        
        'editable' => array(
            'class'     => 'ext.editable.EditableConfig',
            'form'      => 'bootstrap',        //form style: 'bootstrap', 'jqueryui', 'plain' 
            'mode'      => 'popup',            //mode: 'popup' or 'inline'  
            'defaults'  => array(              //default settings for all editable elements
               'emptytext' => 'Click to edit'
            )
            ),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
        'site_url'=>'Ecommerce',
          'phpass'=>array(
            'iteration_count_log2'=>8,
            'portable_hashes'=>false,
        ),
	),
    
    
);
