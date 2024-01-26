import React from "react";

import CardProfile from "./components/Cards/CardProfile";
import CardSettings from "./components/Cards/CardSettings";
import TableEmpleados from "../empleados/components/TableEmpleados";
import useEmpleados from "../../../hooks/useEmpleados";

const Asistencia = () => {
  const { empleados } = useEmpleados();
  console.log("empleados", empleados);
  return (
    <>
      <div className="flex flex-wrap">
        {/*   <div className="flex flex-wrap">
       <div className="w-full lg:w-7/12 ">
          <CardSettings />
        </div>
        <div className="w-full lg:w-5/12 px-2">
          <CardProfile />
        </div> */}
        <div className="w-full h-screen lg:w-12/12 ">
          <TableEmpleados empleados={empleados} />
        </div>
      </div>
    </>
  );
};

export default Asistencia;
