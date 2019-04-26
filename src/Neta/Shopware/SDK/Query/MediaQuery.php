<?php

namespace Neta\Shopware\SDK\Query;

use Neta\Shopware\SDK\Util\Constants;

/**
 * Class MediaQuery
 *
 * @author    Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
class MediaQuery extends Base
{
    /**
     * @var array
     */
    protected $methodsAllowed = [
        Constants::METHOD_CREATE,
        Constants::METHOD_GET,
        Constants::METHOD_GET_BATCH,
        Constants::METHOD_UPDATE,
        Constants::METHOD_DELETE,
    ];

    /**
     * @return mixed
     */
    protected function getClass()
    {
        return 'Neta\\Shopware\\SDK\\Entity\\Media';
    }

    /**
     * Gets the query path to look for entities.
     * E.G: 'variants' or 'articles'
     *
     * @return string
     */
    protected function getQueryPath()
    {
        return 'media';
    }
}
