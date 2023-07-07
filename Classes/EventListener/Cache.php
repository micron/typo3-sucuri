<?php
namespace Kreativrudel\Sucuri\EventListener;

use TYPO3\CMS\Backend\Backend\Event\ModifyClearCacheActionsEvent;
use TYPO3\CMS\Backend\Routing\UriBuilder;

class Cache {

    /**
     * @var UriBuilder
     * @inject
     */
    protected UriBuilder $uriBuilder;
    public function __construct(UriBuilder $uriBuilder)
    {
        $this->uriBuilder = $uriBuilder;
    }
    public function __invoke(ModifyClearCacheActionsEvent $event) : void
    {

        $event->addCacheAction([
            'id' => 'sucuri',
            'title' => 'LLL:EXT:sucuri/Resources/Private/Language/locallang_be.xlf:cache_title',
            'description' => 'LLL:EXT:sucuri/Resources/Private/Language/locallang_be.xlf:cache_description',
            'href' => $this->uriBuilder->buildUriFromRoute('sucuri_cache_clear'),
            'iconIdentifier' => 'actions-barcode',
        ]);
        $event->addCacheActionIdentifier('sucuri');
    }

}
