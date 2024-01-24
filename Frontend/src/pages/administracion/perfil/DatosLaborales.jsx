import React from "react";

import CardProfile from "./components/Cards/CardProfile";
import CardDatosLaborales from "./components/Cards/CardDatosLaborales";
const DatosLaborales = () => {
  return (
    <div className="flex flex-wrap">
      <div className="w-full lg:w-7/12 ">
        <CardDatosLaborales />
      </div>
      <div className="w-full lg:w-5/12 px-2">
        <CardProfile />
      </div>
    </div>
  );
};

export default DatosLaborales;
