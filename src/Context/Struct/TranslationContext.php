<?php declare(strict_types=1);
/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

namespace Shopware\Context\Struct;

use Shopware\Framework\Struct\Struct;
use Shopware\Shop\Struct\ShopBasicStruct;

class TranslationContext extends Struct
{
    /**
     * @var string|null
     */
    protected $fallbackUuid;

    /**
     * @var bool
     */
    protected $isDefaultShop;

    /**
     * @var string
     */
    protected $shopUuid;

    public function __construct(string $shopUuid, bool $isDefaultShop, ?string $fallbackUuid)
    {
        $this->fallbackUuid = $fallbackUuid;
        $this->isDefaultShop = $isDefaultShop;
        $this->shopUuid = $shopUuid;
    }

    public function getFallbackUuid(): ? string
    {
        return $this->fallbackUuid;
    }

    public function isDefaultShop(): bool
    {
        return $this->isDefaultShop;
    }

    public static function createFromShop(ShopBasicStruct $shop): TranslationContext
    {
        return new self(
            $shop->getUuid(),
            $shop->getIsDefault(),
            $shop->getParentUuid()
        );
    }

    public function getShopUuid(): string
    {
        return $this->shopUuid;
    }
}