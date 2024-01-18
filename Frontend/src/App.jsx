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
import ForgetPassword from "./Pages/ForgetPassword";
import LayoutHome from "./Pages/Layouts/LayoutHome";
function App() {
  return (
    <Router>
      <Routes>
      <Route path="/" element={<LayoutHome/>}>
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
          <Route path="/olvide-contraseña" element={<ForgetPassword />} />
        </Route>
      </Routes>
    </Router>
  );
}

export default App;
