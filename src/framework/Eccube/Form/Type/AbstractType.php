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

namespace Eccube\Form\Type;

use Eccube\Form\Form;
use Eccube\Form\FormBuilder;
use Eccube\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Util\StringUtil;

abstract class AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
    }

    public function buildView(FormView $view, Form $form, array $options)
    {
        // TODO: Implement buildView() method.
    }

    public function finishView(FormView $view, Form $form, array $options)
    {
        // TODO: Implement finishView() method.
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // TODO: Implement configureOptions() method.
    }

    public function getBlockPrefix()
    {
        return StringUtil::fqcnToBlockPrefix(static::class) ?: '';
    }

    public function getParent()
    {
        return FormType::class;
    }
}
