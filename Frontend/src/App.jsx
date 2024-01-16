import { useState } from "react";
import EmpleadosProvider from "./Providers/EmpleadoProvider";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Home from "./Pages/Home";
import LayoutEmpleado from "./Pages/Layouts/LayoutEmpleado";

function App() {
  return (
    <EmpleadosProvider>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<LayoutEmpleado />}>
            <Route index element={<Home />} />
          </Route>
        </Routes>
      </BrowserRouter>
    </EmpleadosProvider>
  );
}

export default App;
