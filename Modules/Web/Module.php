<?php

namespace Modules\Web;

use nCore\Core\Controller\Event\ControllerEvent;
use nCore\Core\Module\GenericModule;

class Module extends GenericModule
{

    public function init()
    {

    }

    /**
     * Global Meta, Styles and Javascript added through the onControllerInit Event registered in the module config.
     *
     * The onControllerInit Event will match any called controller instance for the current request.
     *
     * @param ControllerEvent $event
     * @return bool
     */
    public function onControllerInit(ControllerEvent $event)
    {
        /**
         * This is an Example:
         * Just uncomment it and remove the declarations from the Config.xml <View><Resources>...</Resources></View>
         */
        /*$controller = $event->getController();

        $controller->getView()->resources->get('JS')
            ->add('js://vendor.js', array(), 'footer')
            ->add('js://app.js', array(), 'footer');

        $controller->getView()->resources->get('CSS')
            ->add('css://default.css');

        $controller->getView()->resources->get('META')
            ->add('meta', array('attributes' => array('charset' => strtolower($controller->Router->Locale->getCharset()))))
            ->add('title', array('content' => 'Example Module'))
            ->add('meta', array('attributes' => array('name' => 'ncore', 'content' => 'v_3_4')))
            ->add('meta', array('attributes' => array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')));*/


    }

}
