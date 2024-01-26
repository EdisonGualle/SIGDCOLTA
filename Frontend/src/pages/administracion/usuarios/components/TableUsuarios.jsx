// TableUsuarios.jsx
import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState } from "react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";

const TableUsuarios = ({ usuarios }) => {
  const [rowData, setRowData] = useState([]);

  // Column Definitions: Defines & controls grid columns.
  const [colDefs] = useState([
    {
      headerName: "Usuario",
      field: "usuario",
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
    },
    {
        headerName: "Nombre Completo",
        suppressMenu: true,
        valueGetter: (params) =>
          `${params.data.empleado.primer_nombre} ${params.data.empleado.segundo_nombre} ${params.data.empleado.primer_apellido} ${params.data.empleado.segundo_apellido}`,
      },
    { headerName: "Correo", field: "correo", suppressMenu: true },
    { headerName: "Rol", field: "rol", suppressMenu: true },
    { headerName: "Estado", field: "estado", suppressMenu: true },
    { headerName: "Intentos Fallidos", field: "intentos_fallidos", suppressMenu: true },
    { headerName: "Bloqueado Hasta", field: "bloqueado_hasta", suppressMenu: true },

    // Puedes agregar más columnas según tus necesidades
  ]);

  // Fetch data & update rowData state
  useEffect(() => {
    setRowData(usuarios);
  }, [usuarios]);

  // Apply settings across all columns
  const defaultColDef = useMemo(
    () => ({
      filter: "agTextColumnFilter",
      filterParams: {
        filterOptions: ["contains"],
        defaultFilterOption: "contains",
        suppressAndOrCondition: true,
      },
      floatingFilter: true,
    }),
    []
  );


  return (
    <div className={"ag-theme-quartz"} style={{ width: "100%", height: "90%" }}>
      <AgGridReact
        localeText={TRANSLATIONS[LANGUAGE_OPTIONS.ES]}
        rowData={rowData}
        columnDefs={colDefs}
        defaultColDef={defaultColDef}
        pagination={true}
        rowSelection={"multiple"}
      />
    </div>
  );
};

export default TableUsuarios;
