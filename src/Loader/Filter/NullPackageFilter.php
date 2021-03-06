<?php

declare(strict_types=1);

namespace Icanhazstring\Composer\Unused\Loader\Filter;

use Composer\Package\Link;
use Composer\Repository\RepositoryInterface;

class NullPackageFilter implements FilterInterface
{
    /** @var RepositoryInterface */
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function match(Link $item): bool
    {
        return $this->repository->findPackage($item->getTarget(), $item->getConstraint() ?? '') === null;
    }

    public function getReason(): string
    {
        return 'Unable to locate package';
    }
}
