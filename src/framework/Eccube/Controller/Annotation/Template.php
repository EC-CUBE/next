<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eccube\Controller\Annotation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as BaseTemplate;

/**
 * @Annotation
 */
#[\Attribute(\Attribute::TARGET_METHOD)]
class Template extends BaseTemplate
{
}
