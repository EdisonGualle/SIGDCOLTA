import React from "react";

// components
/* 
import CardSettings from "components/Cards/CardSettings.js";
import CardProfile from "components/Cards/CardProfile.js";
 */
import CardProfile from "./components/Cards/CardProfile";
import CardSettings from "./components/Cards/CardSettings";

export default function DatosPersonales() {
  return (
    <>
      <div className="flex flex-wrap">
        <div className="w-full lg:w-7/12 ">
          <CardSettings />
        </div>
        <div className="w-full lg:w-5/12 px-2">
          <CardProfile />
        </div>
      </div>
      asd
    </>
  );
}
