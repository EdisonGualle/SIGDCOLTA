import React from "react";
import TableEmpleados from "../../../empleados/components/TableEmpleados";
import useEmpleados from "../../../../../hooks/useEmpleados";

// components

export default function CardHabilidades() {
  const { empleados } = useEmpleados();

  return (
    <>
      <div className="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg px-4">
        <div className="px-6">
          <div className="flex flex-wrap justify-center">
            {/* Foto */}
            <div className=" px-4 flex justify-start">
              <div className="relative">
                <img
                  style={{ width: "300px", height: "200px" }}
                  alt="..."
                  src={
                    "https://www.eltiempo.com/files/article_main_1200/uploads/2023/06/30/649eef5c5a7bc.png"
                  }
                  className=" max-w-100 rounded-3xl shadow-xl"
                />
              </div>
            </div>
            {/* dots de foto */}
            <div className=" px-4 text-center mt-1">
              <div className="flex justify-center py-1 lg:pt-4 pt-8">
                <div className="mr-4 p-3 text-center">
                  <span className="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                    22
                  </span>
                  <span className="text-sm text-blueGray-400">Friends</span>
                </div>
                <div className="mr-4 p-3 text-center">
                  <span className="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                    10
                  </span>
                  <span className="text-sm text-blueGray-400">Photos</span>
                </div>
                <div className="lg:mr-4 p-3 text-center">
                  <span className="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                    89
                  </span>
                  <span className="text-sm text-blueGray-400">Comments</span>
                </div>
              </div>
              <div className="text-center mt-1">
                <h3 className="text-xl font-semibold leading-normal text-blueGray-700 mb-1">
                  Mia Kalifa
                </h3>
                <div className="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                  <i className="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>{" "}
                  Riobamba, Ecuador
                </div>
                <div className="mb-2 text-blueGray-600 mt-10">
                  <i className="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                  Nombre de cargo - Unidad de servicio
                </div>
                <div className="mb-2 text-blueGray-600">
                  <i className="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                  Descripcion del cargo
                </div>
              </div>
            </div>
          </div>
          <hr className="my-5"></hr>
          {/* Table Instruccion Formal */}
          <div className="w-full h-screen lg:w-12/12 shadow-2xl ">
            <h1 className="text-xl font-bold">Instruccion Formal</h1>
            <TableEmpleados empleados={empleados} />
          </div>
          <hr className="my-5"></hr>
          {/* Table experiencia laboral */}
          <div className="w-full h-screen lg:w-12/12 shadow-2xl">
            <h1 className="text-xl font-bold">Instruccion Formal</h1>

            <TableEmpleados empleados={empleados} />
          </div>
          <hr className="my-5"></hr>
          {/* Table Referencia Laboral */}

          <div className="w-full h-screen lg:w-12/12 shadow-2xl">
            <h1 className="text-xl font-bold">Instruccion Formal</h1>

            <TableEmpleados empleados={empleados} />
          </div>
        </div>
      </div>
    </>
  );
}
