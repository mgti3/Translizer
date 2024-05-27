<?php 
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CIAuth;


class AuthFilter implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null) {
        $session = $session->get('user_type');
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        if ($arguments && !in_array($session->get('user_type'), $arguments)) {
            return redirect()->to('/unauthorized');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // Do something here if needed
    }
}
