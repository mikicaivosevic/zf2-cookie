<?php
namespace ZfCookie\Plugin;

use Zend\Http\Header\SetCookie;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class CookiePlugin extends AbstractPlugin
{
    /** @var  Request $request */
    private $request;

    /** @var  Response $response */
    private $response;

    /**
     * CookiePlugin constructor.
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param $key
     * @param null $value
     * @param null $expire
     * @return SetCookie
     */
    public function __invoke($key, $value = null, $expire = null)
    {
        if (!$value) {
            return $this->request->getHeaders()->get('Cookie')->{$key};
        }
        $cookie = new SetCookie($key, $value, $expire);
        $headers = $this->response->getHeaders();
        $headers->addHeader($cookie);
        return true;
    }
}