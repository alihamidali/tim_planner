<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class AppCustomAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;

    public const BUSINESS_LOGIN_ROUTE = 'business_login';
    public const TRAVELLER_LOGIN_ROUTE = 'traveller_login';

    private $urlGenerator;
    private $csrfTokenManager;

    public function __construct(UrlGeneratorInterface $urlGenerator, CsrfTokenManagerInterface $csrfTokenManager)
    {
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
    }

    public function supports(Request $request)
    {
        return (
            self::BUSINESS_LOGIN_ROUTE === $request->attributes->get('_route') && $request->isMethod('POST')
            ) || (
                self::TRAVELLER_LOGIN_ROUTE === $request->attributes->get('_route') && $request->isMethod('POST')
            );
    }

    public function getCredentials(Request $request)
    {
        $credentials = [
            'userName' => $request->request->get('userName'),
            'password' => $request->request->get('password'),
            'csrf_token' => $request->request->get('_csrf_token'),
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['userName']
        );

        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $token = new CsrfToken('authenticate', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }

        // Load / create our user however you need.
        // You can do this by calling the user provider, or with custom logic here.
        $user = $userProvider->loadUserByUsername($credentials['userName']);
        if (!$user) {
            // fail authentication with a custom error
            throw new CustomUserMessageAuthenticationException('User Name could not be found.');
        }

        return $user;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return true;
        // Check the user's password or other credentials and return true or false
        // If there are no credentials to check, you can just return true
        throw new \Exception('TODO: check the credentials inside '.__FILE__);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        if (self::BUSINESS_LOGIN_ROUTE === $request->attributes->get('_route')) {
            return new RedirectResponse($this->urlGenerator->generate('business_dashboard'));
        } else {
            return new RedirectResponse($this->urlGenerator->generate('traveller_dashboard'));
        }
//        throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl()
    {
        return $this->urlGenerator->generate(self::BUSINESS_LOGIN_ROUTE);
    }
}
