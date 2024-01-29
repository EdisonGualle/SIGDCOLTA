import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS } from "../../components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../components/traduccionTableGrid"
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css"; // optional

const TableSinEvaluaciones = ({ sinevaluaciones }) => {
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
    setRowData(sinevaluaciones);
  }, [sinevaluaciones]);

  // Column Definitions: Defines & controls grid columns.
  const [colDefs] = useState([
    {
      headerName: "ID", field: "idEmpleado",
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
    },
    {
      headerName: "Cédula",
      field: "cedula",
    },
    {
      headerName: "Nombre Completo",
      valueGetter: function(params) {
        return params.data.primerNombre + ' ' + 
               params.data.segundoNombre + ' ' + 
               params.data.primerApellido + ' ' + 
               params.data.segundoApellido;
      },
    },
    {
      headerName: "Fecha de Nacimiento",
      field: "fechaNacimiento",
    },
    {
      headerName: "Teléfono Personal",
      field: "telefonoPersonal",
    },
    {
      headerName: "Teléfono de Trabajo",
      field: "telefonoTrabajo",
    },
    {
      headerName: "Correo",
      field: "correo",
    },
    {
      headerName: "Tipo de Sangre",
      field: "tipoSangre",
    },
    {
      headerName: "Nacionalidad",
      field: "nacionalidad",
    },
    {
      headerName: "ID Cargo",
      field: "idCargo",
    },
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
  // const frameworkComponents = {
  //   optionsRenderer: OptionsRenderer,
  // };
  return (
    <div className={"ag-theme-quartz"} style={{ width: "100%", height: "90%" }}>
      <AgGridReact
        localeText={TRANSLATIONS[LANGUAGE_OPTIONS.ES]}
        rowData={rowData}
        columnDefs={colDefs}
        defaultColDef={defaultColDef}
        // frameworkComponents={frameworkComponents}
        pagination={true}
        rowSelection={"multiple"}
      />
    </div>
  );
};
// const EstadoEvaluacionRenderer = (props) => {
//   const { value } = props;

  // Determina qué icono mostrar según el estado de la evaluación
//   const getIconByState = (estado) => {
//     switch (estado) {
//       case 'Aprobada':
//         return <i className="fas fa-check-circle text-green-500"></i>;
//       case 'Pendiente':
//         return <i className="fas fa-clock text-yellow-500"></i>;
//       case 'Rechazada':
//         return <i className="fas fa-times-circle text-red-500"></i>;
//       default:
//         return null;
//     }
//   };

//   return (
//     <div>
//       {getIconByState(value)}&nbsp;
//       <span>{value}</span>
      
//     </div>
//   );
// };

// Nuevo componente para renderizar las opciones en la columna correspondiente
// const OptionsRenderer = (props) => {
//   const { data } = props.node;



//   const handleVerClick = () => {
//     // Lógica para ver el empleado
//     console.log("Ver empleado:", data);
//   };

//   const handleEditarClick = () => {
//     // Lógica para editar el empleado
//     console.log("Editar evaluacion:", data);
//   };

//   const handleEliminarClick = () => {
//     // Lógica para eliminar el empleado
//     console.log("Eliminar empleado:", data);
//   };



//   return (
//     <div>
//       <Tippy placement="left" content="Ver Perfil del empleado">
//         <button data-tippy-content="Ver" title="Ver">
//           <i className="fas fa-eye mr-2 text-indigo-600"></i>
//         </button>
//       </Tippy>

//       <Tippy placement="left" content="Editar Evaluacion">
//         <button>
//           <i className="fas fa-edit mr-2 text-lime-800"></i>
//         </button>
//       </Tippy>

//       <Tippy placement="left" content="Eliminar Evaluacion">
//         <button>
//           <i className="fas fa-trash-alt mr-2 text-red-600"></i>
//         </button>
//       </Tippy>
     

//     </div>
//   );
// };
export default TableSinEvaluaciones;
