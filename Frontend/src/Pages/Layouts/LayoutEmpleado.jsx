import React from "react";
import Header from "../Components/Header";
import Footer from "../Components/Footer";

const LayoutEmpleado = ({ children }) => {
  return (
    <div>
      <Header />
      {children}
      <Footer />
    </div>
  );
};

export default LayoutEmpleado;
