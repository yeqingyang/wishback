<?php
/***************************************************************************
 * 
 * Copyright (c) 2010 babeltime.com, Inc. All Rights Reserved
 * $Id$
 * 
 **************************************************************************/

/**
 * @file $HeadURL$
 * 
 * @author $Author$(liupengzhan@babeltime.com)
 *         @date $Date$
 * @version $Revision$
 *          @brief
 *         
 *         
 */
try {
    
    // Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/',
        '../lib/',
        '../def/'
    ))->register();
    
    // Create a DI
    $di = new Phalcon\DI\FactoryDefault();
    
    // Set the database service
    $di->set('db', function ()
    {
        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => "192.168.1.41",
            "username" => "root",
            "password" => "123456",
            "dbname" => "friends_bill",
            "charset" => "utf8"
        ));
    });
    
    // Setting up the view component
    $di->set('view', function ()
    {
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        $view->registerEngines(array(
            ".volt" => 'Phalcon\Mvc\View\Engine\Volt',
            ".phtml" => 'Phalcon\Mvc\View\Engine\Php',
            ".php" => 'Phalcon\Mvc\View\Engine\Php'
        ));
        return $view;
    });
    
    $di->set('url', function ()
    {
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/');
        return $url;
    });
    
    /**
     * Setting up volt
     */
    $di->set('volt', function ($view, $di)
    {
        
        $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
        
        $volt->setOptions(array(
            "compiledPath" => "../cache/volt/"
        ));
        
        $compiler = $volt->getCompiler();
        $compiler->addFunction('is_a', 'is_a');
        
        return $volt;
    }, true);
    
    $di->set('session', function ()
    {
        $session = new Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
    });
    /**
     * Register the flash service with custom CSS classes
     */
    $di->set('flash', function ()
    {
        return new Phalcon\Flash\Session(array(
            'error' => 'alert alert-error',
            'success' => 'alert alert-success',
            'notice' => 'alert alert-info'
        ));
    });
    
    /**
     * Register a user component
     */
//     $di->set('elements', function ()
//     {
//         return new Elements();
//     });
    Logger::init("../log/fb.log", 1);
    Logger::info('start');
    // Handle the request
    $application = new \Phalcon\Mvc\Application();
    $application->setDI($di);
    echo $application->handle()->getContent();
} catch (\Phalcon\Exception $e) {
    echo "PhalconException: ", $e->getMessage();
}

/* vim: set ts=4 sw=4 sts=4 tw=100 noet: */