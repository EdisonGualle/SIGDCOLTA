<?php
namespace App\Repositories;

use App\Models\Permiso;
use App\Repositories\PermisoRepositoryInterface;

class PermisoRepository implements PermisoRepositoryInterface
{
    public function all()
    {
        return Permiso::all();
    }

    public function find($id)
    {
        return Permiso::find($id);
    }

    public function create(array $data)
    {
        return Permiso::create($data);
    }

    public function update($id, array $data)
    {
        $permiso = Permiso::find($id);

        if ($permiso) {
            $permiso->update($data);
            return $permiso;
        }

        return null;
    }

    public function delete($id)
    {
        $permiso = Permiso::find($id);

        if ($permiso) {
            $permiso->delete();
            return true;
        }

        return false;
    }
}
