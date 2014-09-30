<?php

namespace Modules\Dev;

use nCore\Core\Controller\Event\ControllerEvent;
use nCore\Core\Module\GenericModule;

class Module extends GenericModule
{

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
            ->add('//localhost:9001/livereload.js', array('external' => true));

    }

}
