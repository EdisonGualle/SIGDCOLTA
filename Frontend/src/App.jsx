// App.jsx
import React from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import LayoutEmpleado from "./Pages/Layouts/LayoutEmpleado";
import LayoutAuth from "./Pages/Layouts/LayoutAuth";
import Home from "./Pages/Home";
import Login from "./Pages/Login";
import EmpleadosProvider from "./Providers/EmpleadoProvider";
import AuthProvider from "./Providers/AuthProvider";
import PrivateRoute from "./Pages/Components/PrivateRoute";

function App() {
  return (
    <Router>
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
        <Route path="/" element={<LayoutAuth />}>
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
    </Router>
  );
}

export default App;
