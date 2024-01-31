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

  const validarCedulas = (cedula) => {
    let cedulaExistente = empleados.some(
      (empleado) => empleado.cedula === cedula
    );
    return cedulaExistente;
  };

  const validarCorreo = (correo) => {
    let correoExistente = empleados.some(
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
      if (!token) {
        setAlerta({
          mensaje: "Token not available. Please log in.",
          error: true,
        });
        return;
      }

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      const response = await clienteAxios.post(
        "/empleados",
        nuevoEmpleado,
        config
      );
      const { data } = response;

      if (!data.original.successful) {
        // Si la solicitud no fue exitosa, mostrar mensajes de error
        const errors = data.original.errors;
        Object.keys(errors).forEach((campo) => {
          const mensajesError = errors[campo].join(", ");
          setAlerta({
            tipo: "error",
            mensaje: `Error al agregar el empleado: ${mensajesError}`,
          });
        });
      } else {
        // La solicitud fue exitosa, actualiza el estado de los empleados
        setEmpleados((empleadosActuales) => [
          ...empleadosActuales,
          nuevoEmpleado,
        ]);

        setAlerta({
          tipo: "success",
          mensaje: "Empleado agregado exitosamente",
        });

        navigate("/administracion/empleados");
      }
    } catch (error) {
      console.error("Error al agregar empleado:", error);
    }
  };

  const agregarusuario = async (nuevoUsuario) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) {
        setAlerta({
          mensaje: "Token not available. Please log in.",
          error: true,
        });
        return;
      }

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      const response = await clienteAxios.post(
        "/administrador/usuarios",
        nuevoUsuario,
        config
      );
      const { data } = response;
      return;
    } catch (error) {
      console.error("Error al agregar usuario:", error);
    }
  };
  const actualizarEmpleado = async (idEmpleado, nuevoEmpleado) => {
    try {
      const token = localStorage.getItem("token");
      if (!token) return;

      const config = {
        headers: {
          "Content-Type": "application/json",
          Authorization: `Bearer ${token}`,
        },
      };

      const response = await clienteAxios.put(
        `/empleados/${idEmpleado}`,
        nuevoEmpleado,
        config
      );

      if (response.status === 200) {
        setAlerta({
          tipo: "success",
          mensaje: "Empleado actualizado correctamente",
        });

        // Actualizar el estado de empleados después de la actualización exitosa
        const nuevosEmpleados = empleados.map((empleado) => {
          if (empleado.idEmpleado === idEmpleado) {
            return { ...empleado, ...nuevoEmpleado };
          }
          return empleado;
        });

        setEmpleados(nuevosEmpleados);
      } else {
        setAlerta({ tipo: "error", mensaje: "Error al actualizar empleado" });
      }
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
