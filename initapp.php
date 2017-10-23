<?php

/**
 * Initialisations de l'application Silex + Twig
 */

/**
 * Application Silex
 * @var Silex\Application $app
 */
$app = new Silex\Application ();

$app ['debug'] = true;

// Initialisations pour moteur de templates Twig
$app->register ( new Silex\Provider\TwigServiceProvider (), array (
    'twig.path' => __DIR__ . '/templates',
    'twig.options' => array (
        'debug' => true
    )
) );

// for asset() in twig templates
$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1',
    'assets.version_format' => '%s?version=%s',
    'assets.named_packages' => array(
        'css' => array('version' => 'css2', 'base_path' => '/whatever-makes-sense'),
        'images' => array('base_urls' => array('https://img.example.com')),
    ),
));

// Session (pour flashbags)
$app->register(new Silex\Provider\SessionServiceProvider(), array(
  'session.storage.save_path' => __DIR__.'/var'
));

// Formulaires
$app->register(new Silex\Provider\FormServiceProvider());

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    $twig->addExtension(new \Twig_Extension_Debug());
    return $twig;
});

// Ajout de la fonction 'path' dans les templates Twig
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    $twig->addFunction(new \Twig_SimpleFunction('path', function (...$url) use ($app) {
        return call_user_func_array(array(
            $app['url_generator'],
            'generate'
        ), $url);
    }));
    return $twig;
});

 return $app;

