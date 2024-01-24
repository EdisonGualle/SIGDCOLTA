import { BrowserRouter, Route, Routes } from "react-router-dom";
import { AuthProvider } from "./providers/AuthProvider";
import AuthLayout from "./pages/layouts/AuthLayout";
import HomeLayout from "./pages/layouts/HomeLayout";
import EmpleadosLayout from "./pages/layouts/EmpleadosLayout";
import AdministradorLayout from "./pages/layouts/AdministradorLayout";
import Home from "./pages/Home";
import Login from "./pages/auth/Login";
import HomeEmpleados from "./pages/empleados/Home";
import DashboardAdministrador from "./pages/administracion/Dashboard";
import IndexEmpleadosAdministrador from "./pages/administracion/empleados/Index";
import IndexPermisosAdministrador from "./pages/administracion/permisos/Index";
import { EmpleadosProvider } from "./providers/EmpleadosProvider";
import NotFound from "./pages/NotFound";

import IndexDireccionesAdministrador from "./pages/administracion/posicionLaboral/direcciones/Index";
import { DireccionesProvider } from "./providers/DireccionesProvider";

import IndexPosicionesLaboralesAdministrador from "./pages/administracion/posicionLaboral";
import { PosicionesLaboralesProvider } from "./providers/PosicionesLaborales";

import IndexUnidadesAdministrador from "./pages/administracion/posicionLaboral/unidades";
import { UnidadesProvider } from "./providers/UnidadesProvider";

import IndexContratosAdministrador from "./pages/administracion/contratos/Index";
import { ContratosProvider } from "./providers/ContratosProvider";

import IndextipoContratosAdministrador from "./pages/administracion/contratos/IndextipoContrato";
import { TiposContratoProvider } from "./providers/tipoContratosProvider";

import IndexAgregarContratosAdministrador from "./pages/administracion/contratos/IndexAgregarContrato";
import { AgregarContratoProvider } from "./providers/AsignarContratosProvider";



import IndexCargosAdministrador from "./pages/administracion/posicionLaboral/cargos";
import { CargosProvider } from "./providers/CargosProvider";

import IndexJerarquiaCargosAdministrador from "./pages/administracion/posicionLaboral/jerarquiaCargos";
import { JerarquiaCargosProvider } from "./providers/JerarquiaCargosProvider";
import Dashboard from "./pages/administracion/dashboard/Dashboard";

import IndexUsuariosAdministrador from "./pages/administracion/usuarios";
import { UsuariosProvider } from "./providers/UsuariosProvider";

function App() {
  return (
    <BrowserRouter>
      <AuthProvider>
        <EmpleadosProvider>
          <PosicionesLaboralesProvider>
            <DireccionesProvider>
              <UnidadesProvider>
                <ContratosProvider >
                  <TiposContratoProvider>
                    <AgregarContratoProvider>
                      <UsuariosProvider>
                        <PosicionesLaboralesProvider>
                          <DireccionesProvider>
                            <UnidadesProvider>
                              <CargosProvider>
                                <JerarquiaCargosProvider>

                                  <Routes>
                                    {/* RUTAS PAcdRA PAGINA DE INICIO SISTEMA */}
                                    <Route path="/" element={<HomeLayout />}>
                                      <Route index element={<Home />} />
                                      <Route path="*" element={<NotFound />} />
                                    </Route>

                                    {/* RUTAS PARA LOGEO ETC */}
                                    <Route path="/" element={<AuthLayout />}>
                                      <Route path="login" element={<Login />} />
                                    </Route>

                                    {/* RUTAS DE EMPLEADOS REQUIEREN AUTENTICACION */}
                                    <Route path="/empleados" element={<EmpleadosLayout />}>
                                      <Route index element={<HomeEmpleados />} />
                                    </Route>

                                    {/* RUTAS DEL ADMINISTRADOR REQUIEREN AUTENTICACION */}
                                    <Route path="/administracion" element={<AdministradorLayout />}>
                                      <Route index element={<DashboardAdministrador />} />
                                      <Route path="empleados" element={<IndexEmpleadosAdministrador />} />
                                      <Route path="permisos" element={<IndexPermisosAdministrador />} />
                                      {/* Modulo Usuarios */}
                                      <Route path="usuarios" element={<IndexUsuariosAdministrador />} />


                                      <Route path="posiciones-laborales" element={<IndexPosicionesLaboralesAdministrador />} />
                                      <Route path="direcciones" element={<IndexDireccionesAdministrador />} />
                                      <Route path="unidades" element={<IndexUnidadesAdministrador />} />
                                      <Route path="contratos" element={<IndexContratosAdministrador />} />
                                      <Route path="tipos-contratos" element={<IndextipoContratosAdministrador />} />
                                      <Route path="asignar-contratos" element={<IndexAgregarContratosAdministrador />} />

                                      {/* Modulo Posiciones Laborales */}
                                      <Route path="posiciones-laborales" element={<IndexPosicionesLaboralesAdministrador />} />
                                      <Route path="direcciones" element={<IndexDireccionesAdministrador />} />
                                      <Route path="unidades" element={<IndexUnidadesAdministrador />} />
                                      <Route path="cargos" element={<IndexCargosAdministrador />} />
                                      <Route path="jerarquia-cargos" element={<IndexJerarquiaCargosAdministrador />} />

                                    </Route>
                                  </Routes>
                                </JerarquiaCargosProvider>
                              </CargosProvider>
                            </UnidadesProvider>
                          </DireccionesProvider>
                        </PosicionesLaboralesProvider>
                      </UsuariosProvider>
                    </AgregarContratoProvider>
                  </TiposContratoProvider>
                </ContratosProvider>
              </UnidadesProvider>
            </DireccionesProvider>
          </PosicionesLaboralesProvider>
        </EmpleadosProvider>
      </AuthProvider>
    </BrowserRouter >
  );
}

export default App;
