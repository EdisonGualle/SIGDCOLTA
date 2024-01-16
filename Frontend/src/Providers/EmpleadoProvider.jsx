import React from "react";
import EmpleadosContext from "../Context/EmpleadosContext";
import axios from "axios";
const API_URL = "http://localhost:8000/api";

const EmpleadosProvider = ({ children }) => {
  const [empleados, setEmpleados] = React.useState([]);

  React.useEffect(() => {
    // Fetch data when component mounts
    axios
      .get(`${API_URL}/empleados`)
      .then((res) => {
        setEmpleados(res.data.data);
      })
      .catch((err) => console.error(err));
  }, []);

  const createEmpleado = (empleado) => {
    axios
      .post(`${API_URL}/empleados`, empleado)
      .then((res) => {
        setEmpleados([...empleados, res.data]);
      })
      .catch((err) => console.error(err));
  };

  const updateEmpleado = (id, empleado) => {
    axios
      .put(`${API_URL}/empleado/${id}`, empleado)
      .then((res) => {
        setEmpleados(empleados.map((em) => (em.id === id ? res.data : em)));
      })
      .catch((err) => console.error(err));
  };

  const deleteEmpleado = (id) => {
    axios
      .delete(`${API_URL}/empleado/${id}`)
      .then(() => {
        setEmpleados(empleados.filter((em) => em.id !== id));
      })
      .catch((err) => console.error(err));
  };

  const contextValue = {
    empleados,
    createEmpleado,
    updateEmpleado,
    deleteEmpleado,
  };

  return (
    <EmpleadosContext.Provider value={contextValue}>
      {children}
    </EmpleadosContext.Provider>
  );
};

export default EmpleadosProvider;
