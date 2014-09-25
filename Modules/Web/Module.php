<?php

namespace Modules\Web;

use nCore\Core\Controller\Event\ControllerEvent;
use nCore\Core\Module\GenericModule;
use nCore\Core\Router\Event\RouteEvent;
use nCore\Core\Router\Event\RouterEvent;
use nCore\Core\Router\Route;

class Module extends GenericModule
{
    protected $version = '1.0';

    protected $weight = -100;


    public function init()
    {

    }

    /**
     * Global Meta, Styles and Javascript
     * Using onControllerInit Event will match any called Controller instance for the current request
     *
     * @param ControllerEvent $event
     * @return bool
     */
    public function onControllerInit(ControllerEvent $event)
    {
        $controller = $event->getController();

        $controller->getView()->resources->get('JS')
            ->add('js://app.js', array(), 'footer');

        $controller->getView()->resources->get('CSS')
            ->add('css://default.css');

        $controller->getView()->resources->get('META')
            ->add('meta', array('attributes' => array('charset' => strtolower($controller->router->Locale->getCharset()))))
            ->add('title', array('content' => 'Example Module'))
            ->add('meta', array('attributes' => array('name' => 'ncore', 'content' => 'v_3_4')))
            ->add('meta', array('attributes' => array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')));


    }

}
