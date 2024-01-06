<?php

namespace Spatie\Permission\Exceptions;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UnauthorizedException extends HttpException
{
    public static function forRoles(array $roles): void
    {
        static::throwSimpleException('El usuario no tiene los roles adecuados.');
    }

    public static function forPermissions(array $permissions): void
    {
        static::throwSimpleException('El usuario no tiene los permisos adecuados.');
    }

    public static function forRolesOrPermissions(array $rolesOrPermissions): void
    {
        static::throwSimpleException('El usuario no tiene ninguno de los derechos de acceso necesarios.');
    }

    public static function missingTraitHasRoles(Authorizable $user): void
    {
        static::throwSimpleException('La clase Authorizable debe usar el rasgo Spatie\Permission\Traits\HasRoles.');
    }

    public static function notLoggedIn(): void
    {
        static::throwSimpleException('El usuario no está autenticado.');
    }

    protected static function throwSimpleException(string $message): void
    {
        throw new static(403, $message, null, []);
    }
}
