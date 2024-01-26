import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState } from "react";
import OptionsRenderer from "./OptionsRenderer";
// Constants
import { TRANSLATIONS, LANGUAGE_OPTIONS } from "./traduccionTableGrid";

const TableEmpleados = ({ empleados, handleEliminarClick }) => {
  const [rowData, setRowData] = useState([]);

  useEffect(() => {
    setRowData(empleados);
  }, [empleados]);

  const colDefs = useMemo(() => [
    {
      headerName: "Cedula",
      field: "cedula",
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
    },
    {
      headerName: "Opciones",
      cellRenderer: OptionsRenderer,
      checkboxSelection: false,
      filter: false,
      suppressMenu: true,
      width: 150,
    },
    {
      headerName: "Nombre Completo",
      suppressMenu: true,
      valueGetter: (params) =>
        `${params.data.primerNombre} ${params.data.segundoNombre} ${params.data.primerApellido} ${params.data.segundoApellido}`,
    },
    {
      headerName: "Fecha de Nacimiento",
      field: "fechaNacimiento",
      filter: "agDateColumnFilter",
      suppressMenu: true,
    },
    { headerName: "Correo", field: "correo", suppressMenu: true },
    { headerName: "Genero", field: "genero", suppressMenu: true },
    {
      headerName: "Teléfono Personal",
      field: "telefonoPersonal",
      suppressMenu: true,
    },
    {
      headerName: "Teléfono Trabajo",
      field: "telefonoTrabajo",
      suppressMenu: true,
    },
    { headerName: "Etnia", field: "etnia", suppressMenu: true },
    { headerName: "Estado Civil", field: "estadoCivil", suppressMenu: true },
    { headerName: "Tipo de Sangre", field: "tipoSangre", suppressMenu: true },
    { headerName: "Nacionalidad", field: "nacionalidad", suppressMenu: true },
    // Agrega más columnas según sea necesario
  ]);

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
    <div className="ag-theme-quartz" style={{ width: "100%", height: "90%" }}>
      <AgGridReact
        localeText={TRANSLATIONS[LANGUAGE_OPTIONS.ES]}
        rowData={rowData}
        columnDefs={colDefs}
        defaultColDef={defaultColDef}
        frameworkComponents={{
          optionsRenderer: (props) => <OptionsRenderer {...props} />,
        }}
        pagination={true}
        rowSelection="multiple"
      />
    </div>
  );
};

export default TableEmpleados;
