import useEmpleados from "../hooks/useEmpleados";
import TableEmpleados from "../components/TableEmpleados";

const Empleados = () => {
  const { empleados } = useEmpleados(); 

  return (
    <TableEmpleados empleados={empleados}/>
  );
};

export default Empleados;
