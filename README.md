A PHP SDK for Shopware 5 REST API
-----------------

Code Information:  
[![Build Status](https://travis-ci.org/neta-io/shopware-sdk.png?branch=master)](https://travis-ci.org/neta-io/shopware-sdk)
[![Code Coverage Scrutinizer](https://scrutinizer-ci.com/g/neta-io/shopware-sdk/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/neta-io/shopware-sdk/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/neta-io/shopware-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/neta-io/shopware-sdk/?branch=master)
[![StyleCI](https://styleci.io/repos/147497159/shield)](https://styleci.io/repos/147497159)

Package Information:  
[![Latest Stable Version](https://poser.pugx.org/neta-io/shopware-sdk/v/stable)](https://packagist.org/packages/neta-io/shopware-sdk)
[![Total Downloads](https://poser.pugx.org/neta-io/shopware-sdk/downloads)](https://packagist.org/packages/neta-io/shopware-sdk)
[![License](https://poser.pugx.org/neta-io/shopware-sdk/license)](https://packagist.org/packages/neta-io/shopware-sdk)

## Requirement
PHP >= 7.1

## Installing

```bash
composer require neta-io/shopware-sdk
```

## Code Docs
See [API Docs](http://neta-io.github.io/shopware-sdk/)

## Examples
```php
<?php
    require 'vendor/autoload.php';
    
    // Create a new client
    $client = new ShopwareClient('http://shopware.dev/api/', 'user', 'api_key');

    /**
     * set custom options for guzzle
     * the official guzzle documentation contains a list of valid options (http://docs.guzzlephp.org/en/latest/request-options.html) 
     */  
    //$client = new ShopwareClient('http://shopware.dev/api/', 'user', 'api_key', ['cert' => ['/path/server.pem']]);
    
    // Fetch all articles
    $articles = $client->getArticleQuery()->findAll();
    
    // Fetch one article by id
    $article = $client->getArticleQuery()->findOne(1);
    $article->getName();
    $article->getDescription();
    $article->get('mainDetail.id'); // Nested fields
    $article->get('customField');
    
    // Create an article
    $article = new Article();
    $article->setName("John product doe");
    $article->setDescription("Lorem ipsum");
    // ... <- more setters are required
    $client->getArticleQuery()->create($article);
   
    
    // Update article
    $article->setName("John product doe");
    $updatedArticle = $client->getArticleQuery()->update($article);
    
    // Update multiple articles
    $articleOne = $client->getArticleQuery()->findOne(1);
    $articleOne->setName("John product doe");
    $articleTwo = $client->getArticleQuery()->findOne(2);
    $articleTwo->setName("John product doe 2");
        
    $articles = $client->getArticleQuery()->updateBatch([$articleOne, $articleTwo]);
    
    // Delete an article
    $client->getArticleQuery()->delete(1);
    
    // Delete multiple articles at once
    $client->getArticleQuery()->deleteBatch([1, 2, 3]);
    
    // Find article by parameters
    $client->getArticleQuery()->findByParams([
        'limit' => 10,
        'start' => 20,
        'sort' => [
            [
                'property' => 'name',
                'direction' => \Neta\Shopware\SDK\Util\Constants::ORDER_ASC
            ]
        ],
        'filter' => [
            [
                'property' => 'name',
                'expression' => 'LIKE',
                'value' => '%' . $term . '%'
            ],
            [
                'operator' => 'AND',
                'property' => 'number',
                'expression' => '>',
                'value' => '500'
            ]
        ]
    ]);
?>
```

## Issues/Features proposals

[Here](https://github.com/neta-io/shopware-sdk/issues) is the issue tracker.

## Contributing
* Write some code
* Write some tests
* Make a pull request

## License

[MIT](LICENSE)

## TODO
- [ ] More tests
- [ ] Generate docs
- [ ] Fluent query builder
- [ ] out-of-the-box pagination

## Credits

This package has been forked from:
[portrino GmbH](https://github.com/portrino/shopware-sdk) 
[leadcommerce](https://github.com/LeadCommerceDE/shopware-sdk) 

Originally authored by 
- [Alexander Mahrt](https://github.com/cyruxx)
- [Jochen Niebuhr](https://github.com/jniebuhr)
