<?php

namespace Modules\Web;

use nCore\Core\Controller\GenericController;
use nCore\Core\View\ViewSegment;

class FrontController extends GenericController
{


    /**
     * Add some initialization to the controller (define global properties for the controller ... ).
     */
    public function init()
    {
    }

    /**
     * The index action
     *
     * See: Config.xml for more details
     * <Router>
     *      <Routes>
     *          <Route name="Front" path="/" controller="FrontController:index">
     *              <options>
     *                  <_query>true</_query>
     *                  <_i18n und="true"/>
     *                  <!--
     *                      To force https add the scheme to options
     *                      <_scheme>https</_scheme>
     *                  -->
     *              </options>
     *              <schemes>
     *                  <scheme>https</scheme>
     *                  <scheme>http</scheme>
     *                  <!-- Set allowed schemes -->
     *              </schemes>
     *              <methods>
     *                  <method>GET</method>
     *                  <!-- Add more methods (POST...) -->
     *              </methods>
     *          </Route>
     *          ...
     *      </Routes>
     * </Router>
     *
     * @return string
     */
    public function indexAction()
    {
        $this->View->addSegment('content', new ViewSegment('front', array(), __DIR__ . DIRECTORY_SEPARATOR . 'Views'));
        return $this->render();
    }

}
 