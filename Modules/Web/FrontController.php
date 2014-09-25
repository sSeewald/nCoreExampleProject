<?php

namespace Modules\Web;

use Modules\Web\Forms\ContactType;
use Modules\Web\Forms\SubscribeType;
use nCore\Core\Controller\GenericController;
use nCore\Core\View\ViewSegment;

class FrontController extends GenericController
{


    public function init()
    {
    }

    public function indexAction($param1 = '', $param2 = '')
    {
        $this->View->addSegment('content', new ViewSegment('front', array(), __DIR__ . DIRECTORY_SEPARATOR . 'Views'));
        return $this->render();
    }

}
 