import React, { useState, useEffect, createContext } from "react";
import { useNavigate } from "react-router-dom";
import clienteAxios from "../config/clienteAxios";
import useAuth from "../hooks/useAuth";

const EmpleadosContext = createContext();

const EmpleadosProvider = ({ children }) => {
  const [empleados, setEmpleados] = useState([]);
  const [datosBancarios, setDatosBancarios] = useState();
  const [cargando, setCargando] = useState(false);
  const [alerta, setAlerta] = useState({});
  const [empleado, setEmpleado] = useState({});
  const [modalEliminarEmpleado, setModalEliminarEmpleado] = useState(false);

  const navigate = useNavigate();
  const { auth } = useAuth();

  useEffect(() => {
    const obtenerEmpleados = async () => {
      try {
        const token = localStorage.getItem("token");
        if (!token) return;

        const config = {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        };
        const { data } = await clienteAxios("/empleados", config);
        setEmpleados(data.data);
      } catch (error) {
        console.log(error);
      }
    };
    obtenerEmpleados();
  }, [auth]);

  const validarCedulas = async (cedula) => {
    const cedulaExistente = empleados.some(
      (empleado) => empleado.cedula === cedula
    );
    return cedulaExistente;
  };

  const validarCorreo= async (correo) => {
    const correoExistente = empleados.some(
      (empleado) => empleado.correo === correo
    );
    // Retorna false si la cédula ya existe en un empleado
    return correoExistente;
  };
  const getDatosBancarios = async () => {
    try {
      const token = localStorage.getItem("token");
      if (!token) return;

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };
      const { data } = await clienteAxios("/datos-bancarios", config);
      setDatosBancarios(data.data);
    } catch (error) {
      console.log(error);
    }
  };

  const agregarEmpleado = async (nuevoEmpleado) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) return;

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      const { data } = await clienteAxios.post(
        "/empleados",
        nuevoEmpleado,
        config
      );
      if (!data.original.errors) {
        setAlerta({
          error: false,
          mensaje: "Empleado agregado correctamente",
        });
      } else {
        setAlerta({
          mensajes: data.original.errors,
          error: true,
        });
      }
    } catch (error) {
      setAlerta({
        mensaje: error.data.original.errors,
        error: true,
      });
    }
  };

  const actualizarEmpleado = async (id, nuevoEmpleado) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) return;

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      const { data } = await clienteAxios.put(
        `/empleados/${id}`,
        nuevoEmpleado,
        config
      );
      setEmpleados(empleados.map((e) => (e._id === id ? data.data : e)));
      setAlerta({
        tipo: "success",
        mensaje: "Empleado actualizado correctamente",
      });
    } catch (error) {
      console.log(error);
      setAlerta({ tipo: "error", mensaje: "Error al actualizar empleado" });
    }
  };

  const eliminarEmpleado = async (id) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) return;

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      await clienteAxios.delete(`/empleados/${id}`, config);
      setEmpleados(empleados.filter((empleado) => empleado.idEmpleado !== id));
      setAlerta({
        tipo: "success",
        mensaje: "Empleado eliminado correctamente",
      });
    } catch (error) {
      console.log(error);
      setAlerta({ tipo: "error", mensaje: "Error al eliminar empleado" });
    }
  };

  const contextValue = {
    empleados,
    agregarEmpleado,
    actualizarEmpleado,
    eliminarEmpleado,
    validarCedulas,
    datosBancarios,
    getDatosBancarios,
    validarCorreo,
    alerta,
  };

  return (
    <EmpleadosContext.Provider value={contextValue}>
      {children}
    </EmpleadosContext.Provider>
  );
};

export { EmpleadosProvider };

export default EmpleadosContext;
