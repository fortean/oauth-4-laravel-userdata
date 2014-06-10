<?php namespace Fortean\OAuthUserData;

/**
 * @author     Bruce Walter <walter@fortean.com>
 * @copyright  Copyright (c) 2014
 * @license    http://www.opensource.org/licenses/mit-license.html MIT License
 */

use \OAuth\UserData\ExtractorFactory;
use \OAuth\Common\Service\AbstractService;

class OAuthUserData {

    /**
     * @var ExtractorFactory
     */
    private $_extractorFactory;

    /**
     * Constructor
     *
     * @param ExtractorFactory $extractorFactory - (Dependency injection) If not provided, an ExtractorFactory instance will be constructed.
     */
    public function __construct(ExtractorFactory $extractorFactory = null)
    {
        if (null === $extractorFactory) {
            // Create the service factory
            $extractorFactory = new ExtractorFactory();
        }
        $this->_extractorFactory = $extractorFactory;
    }

    /**
     * @param  \OAuth\Common\Service\AbstractService
     * @return \OAuth\UserData\Extractor\Extractor
     */
    public function service(AbstractService $service)
    {
        // Return the service extractor object
        return $this->_extractorFactory->get($service);
    }

}