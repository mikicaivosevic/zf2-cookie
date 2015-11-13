<?php
namespace ZfCookie\Factory;

use Zend\Http\Request;
use Zend\Http\Response;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfCookie\Plugin\CookiePlugin;

class CookiePluginFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var ServiceLocatorInterface $sm */
        $sm = $serviceLocator->getServiceLocator();
        /** @var Request $request */
        $request = $sm->get('Request');
        /** @var Response $response */
        $response = $sm->get('Response');

        return new CookiePlugin($request, $response);
    }

}