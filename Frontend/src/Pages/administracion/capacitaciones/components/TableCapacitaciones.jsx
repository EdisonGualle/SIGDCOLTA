/*import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";

const TableCapacitaciones = ({ capacitaciones }) => {
  const [rowData, setRowData] = useState([]);

  // Column Definitions: Defines & controls grid columns.
  const [colDefs] = useState([
    { headerName: "Cedula", field: "cedula" },
    {
      headerName: "Nombre Completo",
      valueGetter: (params) =>
        `${params.data.primerNombre} ${params.data.segundoNombre} ${params.data.primerApellido} ${params.data.segundoApellido}`,
    },
    { headerName: "Capacitación", field: "nombre" },
    { headerName: "Descripción", field: "descripcion" },
    { headerName: "Tipo de Evento", field: "tipoEvento" },
    { headerName: "Institución", field: "institucion" },
    { headerName: "Cantidad de Horas", field: "cantidadHoras" },
    { headerName: "Fecha", field: "fecha" },
    // Agrega más columnas según sea necesario
  ]);

  // Fetch data & update rowData state
  useEffect(() => {
    setRowData(capacitaciones);
  }, [capacitaciones]);

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
        chartContainer: document.querySelector("#myChart"),
        cellRange: {
          rowStartIndex: 0,
          rowEndIndex: rowData.length - 1,
          columns: ["nombre", "descripcion"], // Ajusta las columnas según tus datos
        },
        chartType: "groupedColumn",
        aggFunc: "sum",
      });
    },
    [rowData]
  );

  return (
    <div className="h-full">
      <div className={"ag-theme-quartz"} style={{ width: "100%", height: "90%" }}>
        <AgGridReact
          localeText={TRANSLATIONS[LANGUAGE_OPTIONS.ES]}
          rowData={rowData}
          columnDefs={colDefs}
          defaultColDef={defaultColDef}
          pagination={true}
          onFirstDataRendered={onFirstDataRendered}
          rowSelection={"multiple"}
        />
      </div>
      <div id="myChart" className="ag-theme-quartz my-chart"></div>
    </div>
  );
};

export default TableCapacitaciones;*/

// TableCapacitaciones.jsx
import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState } from "react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";
import { RiEyeLine, RiEditLine, RiDeleteBinLine } from 'react-icons/ri';
import OptionsRenderer from "./OptionsRenderer";


const TableCapacitaciones = ({ capacitaciones }) => {
  const [rowData, setRowData] = useState([]);


  // Definir funciones de manejo para los botones
  const handleVerClick = (capacitacion) => {
    // Lógica para manejar el clic en "Ver"
    console.log("Ver", capacitacion);
  };

  const handleEditarClick = (capacitacion) => {
    // Lógica para manejar el clic en "Editar"
    console.log("Editar", capacitacion);
  };

  const handleEliminarClick = (capacitacion) => {
    // Lógica para manejar el clic en "Eliminar"
    console.log("Eliminar", capacitacion);
  };

  /*const estadoCellStyle = (params) => {
    let backgroundColor = "";
 
    switch (params.value) {
      case "activo":
        backgroundColor = "#bbf7d0"; // Puedes cambiar esto al color que desees para el estado activo
        break;
      case "inactivo":
        backgroundColor = "#fecaca"; // Puedes cambiar esto al color que desees para el estado inactivo
        break;
      case "pendiente":
        backgroundColor = "#fef9c3"; // Puedes cambiar esto al color que desees para el estado pendiente
        break;
      default:
        break;
    }
 
    return { backgroundColor };
  };*/

  // Register the framework component
  const frameworkComponents = {
    accionesRenderer: (params) => (
      <div>
        <button onClick={() => handleVerClick(params.data)}>
          <RiEyeLine />
        </button>
        <button onClick={() => handleEditarClick(params.data)}>
          <RiEditLine />
        </button>
        <button onClick={() => handleEliminarClick(params.data)}>
          <RiDeleteBinLine />
        </button>
      </div>
    ),
  };

  // Column Definitions: Defines & controls grid columns.
  const [colDefs] = useState([
    {
      headerName: "Cédula",
      field: "cedula",
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
      width: 150,
    },
    {
      headerName: "Nombre Completo",
      valueGetter: (params) =>
        `${params.data.primerNombre} ${params.data.segundoNombre} ${params.data.primerApellido} ${params.data.segundoApellido}`,
    },
    { headerName: "Capacitación", field: "nombre", suppressMenu: true },
    { headerName: "Descripción", field: "descripcion", suppressMenu: true },
    /*{
      headerName: "Estado",
      field: "estado",
      suppressMenu: true,
      cellStyle: estadoCellStyle, // Aplicar el estilo condicional
    },*/
    { headerName: "Tipo de Evento", field: "tipoEvento", suppressMenu: true },
    { headerName: "Institución", field: "institucion", suppressMenu: true },
    { headerName: "Cantidad de Horas", field: "cantidadHoras" },
    { headerName: "Fecha", field: "fecha", filter: "agDateColumnFilter", suppressMenu: true },
    {
      headerName: "Acciones",
      minWidth: 150,
      cellRenderer: OptionsRenderer,
      editable: false,
      colId: "acciones",
      checkboxSelection: false,
      filter: false,
      pinned: "right",  // esta a a la derecha
    },

    // Puedes agregar más columnas según tus necesidades
  ]);

  // Fetch data & update rowData state
  useEffect(() => {
    setRowData(capacitaciones);
  }, [capacitaciones]);

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
        frameworkComponents={frameworkComponents}
        pagination={true}
        rowSelection={"multiple"}
        domLayout='autoHeight'
      />
    </div>
  );
};
export default TableCapacitaciones;


































