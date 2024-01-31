import React from "react";
import CardAsistencia from "./components/Cards/CardAsistencia";
const Asistencia = () => {
  return (
    <>
      <div className="flex flex-wrap md:ml-64">
        <div className="w-full lg:w-12/12 ">
          <CardAsistencia />
        </div>
      </div>
    </>
  );
};

export default Asistencia;
