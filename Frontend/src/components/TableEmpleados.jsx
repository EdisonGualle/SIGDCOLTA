import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState } from "react";
import { TRANSLATIONS } from "../config/dataGridEs";
import { LANGUAGE_OPTIONS } from "../config/dataGridEs";

const TableEmpleados = ({ empleados }) => {
  const [rowData, setRowData] = useState([]);

  // Column Definitions: Defines & controls grid columns.
  const [colDefs] = useState([
    { headerName: "Cedula", field: "cedula" },
    {
      headerName: "Nombre Completo",
      valueGetter: params =>
        `${params.data.primerNombre} ${params.data.segundoNombre} ${params.data.primerApellido} ${params.data.segundoApellido}`,
    },
    { headerName: "Fecha de Nacimiento", field: "fechaNacimiento" },
    { headerName: "Genero", field: "genero" },
    { headerName: "Teléfono Personal", field: "telefonoPersonal" },
    { headerName: "Teléfono Trabajo", field: "telefonoTrabajo" },
    { headerName: "Correo", field: "correo" },
    { headerName: "Etnia", field: "etnia" },
    { headerName: "Estado Civil", field: "estadoCivil" },
    { headerName: "Tipo de Sangre", field: "tipoSangre" },
    { headerName: "Nacionalidad", field: "nacionalidad" },
    // Agrega más columnas según sea necesario
  ]);

  // Fetch data & update rowData state
  useEffect(() => {
    setRowData(empleados);
  }, [empleados]);

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
      />
    </div>
  );
};

export default TableEmpleados;
