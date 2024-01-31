import React from "react";

import CardSettings from "./components/Cards/CardSettings";

export default function DatosPersonales({empleado}) {
  return (
    <>
      <div className="flex flex-wrap md:ml-64">
        <div className="w-full">
          <CardSettings empleado={empleado}/>
        </div>
        
      </div>
    </>
  );
}
