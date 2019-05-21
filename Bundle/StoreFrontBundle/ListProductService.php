<?php

namespace PaulPlentyBadges\Bundle\StoreFrontBundle;

use League\Flysystem\Exception;
use Shopware\Bundle\StoreFrontBundle\Service\ListProductServiceInterface;
use Shopware\Bundle\StoreFrontBundle\Struct;
use Doctrine\DBAL\Connection;
use Shopware_Components_Config;


class ListProductService implements ListProductServiceInterface
{

	/**
	 * @var ListProductServiceInterface
	 */
	private $service;

    /**
     * @var
     */
    private $connection;

    /**
     * @var
     */
    private $config;

	/**
	 * @param ListProductServiceInterface $service
	 */
	public function __construct(ListProductServiceInterface $service, Connection $connection, Shopware_Components_Config $config)
	{
		$this->service = $service;
        $this->connection = $connection;
        $this->config = $config;
	}

	/**
	 * @inheritdoc
	 */
	public function getList(array $numbers, Struct\ProductContextInterface $context)
	{
        $plentyFreeField = $this->config->get('paulPlentyFreeNr');
        $products = $this->service->getList($numbers, $context);

		/**@var $product Struct\ListProduct*/
		foreach ($products as $product) {
			$productId = $product->getId();

			try {
                $result = $this->getbadges($productId, $plentyFreeField);

                //add attribute
                $array['paul_plenty_badge'] = null;
                if($result[0]) {
                    $array['paul_plenty_badge'] = $result[0]['plenty_connector_free'.$plentyFreeField];
                }

                $array_struct = new Struct\Attribute($array);
                $product->addAttribute('paul_listing_badges', $array_struct);
            }catch(\Exception $e) {

            }

		}
		return $products;
	}


	/**
     * @inheritdoc
     */
    public function get($number, Struct\ProductContextInterface $context)
    {
        $products = $this->getList([$number], $context);
        return array_shift($products);
    }

    private function getbadges($articleId, $plentyFreeField)
    {

        try {
            $builder = $this->connection->createQueryBuilder();

            $builder->select('plenty_connector_free'.$plentyFreeField)
                ->from('s_articles_attributes', 'saa')
                ->where('saa.articledetailsID = ?')
                ->setParameter(0 ,$articleId);

            $stmt = $builder->execute();
            $badge = $stmt->fetchAll();
            return $badge;
        }catch(\Exception $e) {
            return null;
        }

    }

}
