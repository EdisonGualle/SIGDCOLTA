import { useState } from "react";
import EmpleadosProvider from "./Providers/EmpleadoProvider";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Home from "./Pages/Home";
import LayoutEmpleado from "./Pages/Layouts/LayoutEmpleado";
import LayoutAuth from "./Pages/Layouts/LayoutAuth";
import Login from "./Pages/Login";
import AuthProvider from "./Providers/AuthProvider";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<LayoutEmpleado />}>
          <Route
            index
            element={
              <EmpleadosProvider>
                <Home />
              </EmpleadosProvider>
            }
          />

          <Route
            path="/empleados"
            element={
              <EmpleadosProvider>
                <Home />
              </EmpleadosProvider>
            }
          />
        </Route>
        <Route path="/" element={<LayoutAuth/>}>
          <Route
            path="/Ingresar"
            element={
              <AuthProvider>
                <Login />
              </AuthProvider>
            }
          />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
