import React from "react";

import CardHabilidades from "./components/Cards/CardHabilidades";
const Habilidades = () => {
  return (
    <>
      <div className="flex flex-wrap md:ml-64">
        <div className="w-full lg:w-12/12 ">
          <CardHabilidades />
        </div>
      </div>
    </>
  );
};

export default Habilidades;
