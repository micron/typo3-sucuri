<?php

namespace Kreativrudel\Sucuri\Controller;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Core\Http\HtmlResponse;
use TYPO3\CMS\Core\Http\JsonResponse;

class CacheController {

    private const API_URL = 'https://waf.sucuri.net/api?v2';

    public function clearAction() : ResponseInterface
    {
        $requestFactory = GeneralUtility::makeInstance(RequestFactory::class);
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
        $configuration = $extensionConfiguration->get('sucuri');

        $options = [
            'form_params' => [
                'k' => $configuration['apiKey'],
                's' => $configuration['apiSecret'],
                'a' => 'clear_cache'
            ]
        ];

        $response = $requestFactory->request(
            self::API_URL,
            'POST',
            $options
        );
        if ($response->getHeaderLine('Content-Type') !== 'application/json') {
            throw new \RuntimeException(
                'The request did not return JSON data'
            );
        }
        $responseDecoded = json_decode($response->getBody()->getContents(), true);
        if ($responseDecoded['action'] === 'none') {
            $logger = GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__);
            $logger->error('Sucuri: ' . $responseDecoded['messages'][0]);
        }




        return new JsonResponse($responseDecoded);
    }

}
