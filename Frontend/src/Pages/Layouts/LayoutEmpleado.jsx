
import React from "react";
import { Outlet } from "react-router-dom";
import Header from "../Components/Header";
import Footer from "../Components/Footer";

const LayoutEmpleado = () => {
  return (
    <div>
      <Header/>

      <Outlet />

      <Footer />
    </div>
  );
};

export default LayoutEmpleado;
