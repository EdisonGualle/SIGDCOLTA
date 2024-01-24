import React from "react";
const TotalEmpleadosCard = () => {
  return (
    <>
      <div className="w-full lg:w-6/12 mb-3 xl:w-4/12 px-4">
        <div className="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
          <div className="flex-auto p-4">
            <div className="flex flex-wrap">
              <div className="relative w-full pr-4 max-w-full flex-grow flex-1 text-center">
                <h5 className="text-blueGray-400 uppercase font-bold text-xl">
                  Total Empleados
                </h5>
                <span className="font-semibold text-5xl text-blueGray-700">
                  350
                </span>
              </div>
              <div className="relative w-auto pl-4 flex-initial">
                <div className="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-yellow-500">
                  <i class="fas fa-users " style={{ color: "white" }}></i>{" "}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default TotalEmpleadosCard;
