import useEmpleados from "../hooks/useEmpleados";
import TableEmpleados from "../components/TableEmpleados";

const Empleados = () => {
  const { empleados } = useEmpleados();

  return (
    <>
      <div className="uppercase  bg-white py-2 font-bold rounded-lg mb-1 p-10">
        <div className="flex justify-start mb-3">
          <h1 className="mx-10">
            Empleados Activos: <span className="text-blue-700">12</span>{" "}
          </h1>
          <h1 className="">
            Empleados Inactivos: <span className="text-red-700">12</span>
          </h1>
        </div>
        <div className="flex justify-end">
          <button className="bg-red-700 text-white mx-10 py-2 px-5 rounded-lg">
            Eliminar
          </button>

          <button className="bg-blue-700 text-white py-2  px-5 rounded-lg">
            Nuevo
          </button>
        </div>
      </div>

      <div className="h-full">
        <TableEmpleados empleados={empleados} />
      </div>
    </>
  );
};

export default Empleados;
