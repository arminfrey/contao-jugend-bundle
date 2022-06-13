<?php

declare(strict_types=1);

/*
 * This file is part of Jungbuettel.
 * 
 * (c) Armin Frey 2022 <webmaster@krettenweiber.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/freyar/contao-jugend-bundle
 */

namespace Freyar\ContaoJugendBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class FreyarContaoJugendBundle
 */
class FreyarContaoJugendBundle extends Bundle
{
	/**
	 * {@inheritdoc}
	 */
	public function build(ContainerBuilder $container): void
	{
		parent::build($container);
		
	}
}
