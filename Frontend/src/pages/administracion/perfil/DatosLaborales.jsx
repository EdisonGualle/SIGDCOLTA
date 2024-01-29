import React from "react";

import CardProfile from "./components/Cards/CardProfile";
import CardDatosLaborales from "./components/Cards/CardDatosLaborales";
const DatosLaborales = () => {
  return (
    <div className="flex flex-wrap md:ml-64">
      <div className="w-full h-full ">
        <CardDatosLaborales />
      </div>
    </div>
  );
};

export default DatosLaborales;
