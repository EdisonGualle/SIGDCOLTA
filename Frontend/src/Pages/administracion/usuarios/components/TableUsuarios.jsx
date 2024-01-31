// TableUsuarios.jsx
import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState } from "react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";
import { RiEyeLine, RiEditLine, RiDeleteBinLine } from 'react-icons/ri';
import OptionsRenderer from "./OptionRenderer";

const TableUsuarios = ({ usuarios }) => {
  const [rowData, setRowData] = useState([]);

   // Definir funciones de manejo para los botones
   const handleVerClick = (usuario) => {
    // Lógica para manejar el clic en "Ver"
    console.log("Ver", usuario);
  };

  const handleEditarClick = (usuario) => {
    // Lógica para manejar el clic en "Editar"
    console.log("Editar", usuario);
  };

  const handleEliminarClick = (usuario) => {
    // Lógica para manejar el clic en "Eliminar"
    console.log("Eliminar", usuario);
  };


  const estadoCellStyle = (params) => {
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
  };

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
      headerName: "Usuario",
      field: "usuario",
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
      width: 150,
    },
    {
      headerName: "Nombre Completo",
      suppressMenu: true,
      valueGetter: (params) =>
        `${params.data.empleado.primer_nombre} ${params.data.empleado.segundo_nombre} ${params.data.empleado.primer_apellido} ${params.data.empleado.segundo_apellido}`,
    },
    { headerName: "Correo", field: "correo", suppressMenu: true },
    { headerName: "Rol", field: "rol", suppressMenu: true },
    {
      headerName: "Estado",
      field: "estado",
      suppressMenu: true,
      cellStyle: estadoCellStyle, // Aplicar el estilo condicional
    },
    { headerName: "Intentos Fallidos", field: "intentos_fallidos", suppressMenu: true },
    { headerName: "Bloqueado Hasta", field: "bloqueado_hasta", suppressMenu: true },
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
        frameworkComponents={frameworkComponents}
        pagination={true}
        rowSelection={"multiple"}
        domLayout='autoHeight'
      />
    </div>
  );
};

export default TableUsuarios;
