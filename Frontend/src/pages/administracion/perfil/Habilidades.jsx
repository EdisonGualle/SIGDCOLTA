import React from "react";
import CardProfile from "./components/Cards/CardProfile";
import CardHabilidades from "./components/Cards/CardHabilidades";
const Habilidades = () => {
  return (
    <>
      <div className="flex flex-wrap">
        <div className="w-full lg:w-12/12 ">
          <CardHabilidades />
        </div>
      </div>
    </>
  );
};

export default Habilidades;
