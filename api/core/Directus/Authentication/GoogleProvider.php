<?php

/**
 * Directus – <http://getdirectus.com>
 *
 * @link      The canonical repository – <https://github.com/directus/directus>
 * @copyright Copyright 2006-2016 RANGER Studio, LLC – <http://rangerstudio.com>
 * @license   GNU General Public License (v3) – <http://www.gnu.org/copyleft/gpl.html>
 */

namespace Directus\Authentication;

use League\OAuth2\Client\Provider\Google;

/**
 * Google Social Login provider
 *
 * @author Welling Guzmán <welling@rngr.org>
 */
class GoogleProvider extends TwoSocialProvider
{
    /**
     * @var Google
     */
    protected $provider = null;

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'google';
    }

    /**
     * Creates the Google provider oAuth client
     *
     * @return Google
     */
    protected function createProvider()
    {
        $this->provider = new Google([
            'clientId'          => $this->config->get('client_id'),
            'clientSecret'      => $this->config->get('client_secret'),
            'redirectUri'       => $this->config->get('redirect_url'),
            'hostedDomain'      => $this->config->get('hosted_domain'),
        ]);

        return $this->provider;
    }
}
