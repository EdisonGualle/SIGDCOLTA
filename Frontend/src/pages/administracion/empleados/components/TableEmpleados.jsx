import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS } from "./traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "./traduccionTableGrid";
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css"; // optional

const TableEmpleados = ({ empleados }) => {
  const [rowData, setRowData] = useState([]);
  const [modalVerOpen, setModalVerOpen] = useState(false);
  const handleNuevoClick = () => {
    setModalVerOpen(true);
  };
  
  const handleCloseModal = () => {
    setModalOpen(false);
  };
  // Fetch data & update rowData state
  useEffect(() => {
    setRowData(empleados);
  }, [empleados]);

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
      headerName: "Opciones",
      cellRenderer: OptionsRenderer,
      checkboxSelection: false, // Evita que la columna sea seleccionable
      filter: false, // Evita que la columna tenga funcionalidad de búsqueda
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

  // Definir el renderer personalizado para la columna de opciones
  const frameworkComponents = {
    optionsRenderer: OptionsRenderer,
  };
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
      />
    </div>
  );
};

// Nuevo componente para renderizar las opciones en la columna correspondiente
const OptionsRenderer = (props) => {
  const { data } = props.node;

  const handleVerClick = () => {
    // Lógica para ver el empleado
    console.log("Ver empleado:", data);
  };

  const handleEditarClick = () => {
    // Lógica para editar el empleado
    console.log("Editar empleado:", data);
  };

  const handleEliminarClick = () => {
    // Lógica para eliminar el empleado
    console.log("Eliminar empleado:", data);
  };

  return (
    <div>
      <Tippy placement="left" content="Ver Perfil del empleado">
        <button data-tippy-content="Ver" title="Ver">
          <i className="fas fa-eye mr-2 text-indigo-600"></i>
        </button>
      </Tippy>

      <Tippy placement="left" content="Editar informacion del empleado">
        <button>
          <i className="fas fa-edit mr-2 text-lime-800"></i>
        </button>
      </Tippy>

      <Tippy placement="left" content="Eliminar Empleados">
        <button>
          <i className="fas fa-trash-alt mr-2 text-red-600"></i>
        </button>
      </Tippy>
    </div>
  );
};
export default TableEmpleados;
