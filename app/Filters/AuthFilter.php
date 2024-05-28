<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the session service
        $session = Services::session();

        // Get the user type from session
        $userType = $session->get('user_type');

        // If user is not logged in or user type is not allowed
        if ($userType === null || !in_array((int)$userType, array_map('intval', $arguments))) {
            // Redirect to an error page or show a 403 forbidden error
            return redirect()->to('http://localhost/Translizer/public/oops');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here if needed
    }
}
