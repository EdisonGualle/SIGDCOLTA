import React from "react";
import CardProfile from "./components/Cards/CardProfile";
import CardHabilidades from "./components/Cards/CardHabilidades";
const Habilidades = () => {
  return (
    <>
      <div className="flex flex-wrap">
        <div className="w-full lg:w-7/12 ">
          <CardHabilidades />
        </div>
        <div className="w-full lg:w-5/12 px-2">
          <CardProfile />
        </div>
      </div>
    </>
  );
};

export default Habilidades;
