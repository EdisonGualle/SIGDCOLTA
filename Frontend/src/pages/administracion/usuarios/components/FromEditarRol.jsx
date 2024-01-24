import React from "react";

const FormEditarRol = ({ roles }) => {
  return (
    <div className="max-w-screen-md mx-auto p-4">
      <form >
        <div className="mb-4">
          <label
            htmlFor="descripcion"
            className="block text-sm font-medium text-gray-600"
          >
            Roles
          </label>
          <select
            className="mt-1 p-2 w-full border border-gray-300 rounded-md"
            name="direcciones"
            id="direcciones"
            defaultValue={undefined}
          >
            <option value="" hidden>
              Seleccionar un rol
            </option>
            {roles.map((rol) => {
              return (
                <option key={rol.id} value={rol.id}>
                  {rol.name}
                </option>
              );
            })}
          </select>
        </div>
      </form>
    </div>
  );
};

export default FormEditarRol;
