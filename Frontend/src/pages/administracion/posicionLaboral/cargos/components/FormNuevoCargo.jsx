import React from "react";

const FormNuevoCargo = ({ unidades }) => {
    return (
        <div className="max-w-screen-md mx-auto p-4">
            <form className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                {/* Columna 1 */}
                <div className="mb-4">
                    <label
                        htmlFor="nombre"
                        className="block text-sm font-medium text-gray-600"
                    >
                        Nombre del Cargo
                    </label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        className="mt-1 p-2 w-full border border-gray-300 rounded-md"
                    />
                </div>

                <div className="mb-4">
                    <label
                        htmlFor="descripcion"
                        className="block text-sm font-medium text-gray-600"
                    >
                        Descripción del Cargo
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        className="mt-1 p-2 w-full border border-gray-300 rounded-md"
                    ></textarea>
                </div>

                <div className="mb-4">
                    <label
                        htmlFor="unidadPerteneciente"
                        className="block text-sm font-medium text-gray-600"
                    >
                        Unidad Perteneciente
                    </label>
                    <select
                        className="mt-1 p-2 w-full border border-gray-300 rounded-md"
                        name="unidadPerteneciente"
                        id="unidadPerteneciente"
                        defaultValue={undefined}
                    >
                        <option value="" hidden>
                            Seleccionar Unidad
                        </option>
                        {unidades.map((unidad) => {
                            return (
                                <option key={unidad.id} value={unidad.id}>
                                    {unidad.nombre}
                                </option>
                            );
                        })}
                    </select>
                </div>
            </form>
        </div>
    );
};

export default FormNuevoCargo;
