import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS } from "./traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "./traduccionTableGrid";

const TableEmpleados = ({ empleados }) => {
  const [rowData, setRowData] = useState([]);

  // Column Definitions: Defines & controls grid columns.
  const [colDefs] = useState([
    {
      headerName: "Cedula",
      field: "cedula",
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
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

  const onFirstDataRendered = useCallback(
    (params) => {
      params.api.createRangeChart({
        chartContainer: document.querySelector("#myChart"), // Identificador del contenedor del gráfico
        cellRange: {
          rowStartIndex: 0,
          rowEndIndex: rowData.length - 1,
          columns: ["cedula", "edad"], // Ajusta las columnas según tus datos
        },
        chartType: "groupedColumn",
        aggFunc: "sum",
      });
    },
    [rowData]
  );

  return (
    <div className="h-full">
      <div
        className={"ag-theme-quartz"}
        style={{ width: "100%", height: "90%" }}
      >
        <AgGridReact
          localeText={TRANSLATIONS[LANGUAGE_OPTIONS.ES]}
          rowData={rowData}
          columnDefs={colDefs}
          defaultColDef={defaultColDef}
          pagination={true}
          rowSelection={"multiple"}
          onFirstDataRendered={onFirstDataRendered}
        />
      </div>
      <div id="myChart" className="ag-theme-quartz my-chart"></div>
    </div>
  );
};

export default TableEmpleados;
