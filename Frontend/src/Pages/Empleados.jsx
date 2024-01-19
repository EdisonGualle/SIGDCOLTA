import React from "react";
import {
  CDataTable,
  CBadge,
} from "@coreui/react";
import useEmpleados from "../hooks/useEmpleados";

const Empleados = () => {
  const { empleados } = useEmpleados();

  const fields = [
    { key: 'nombre', label: 'Nombre', _style: { width: '30%' } },
    { key: 'puesto', label: 'Puesto', _style: { width: '20%' } },
    { key: 'salario', label: 'Salario', _style: { width: '20%' } },
    { key: 'estatus', label: 'Estatus', _style: { width: '20%' } },
  ];

  const getBadge = (estatus) => {
    switch (estatus) {
      case 'Activo': return 'success';
      case 'Inactivo': return 'danger';
      default: return 'primary';
    }
  }

  return (
    <>
      <CDataTable
        items={empleados}
        fields={fields}
        hover
        striped
        bordered
        size="sm"
        itemsPerPage={10}
        pagination
        scopedSlots={{
          'estatus':
            (item) => (
              <td>
                <CBadge color={getBadge(item.estatus)}>
                  {item.estatus}
                </CBadge>
              </td>
            )
        }}
      />
    </>
  );
};

export default Empleados;
