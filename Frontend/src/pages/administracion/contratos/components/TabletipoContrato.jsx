import React, { useEffect, useState, useMemo } from "react";
import { AgGridReact } from "ag-grid-react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";
import axios from "axios";
import Swal from 'sweetalert2';
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css";

const TableTipoContrato = ({ tiposContrato }) => {
  const [rowData, setRowData] = useState([]);

  const [colDefs] = useState([
    { headerName: "ID", field: "idTipoContrato",
    checkboxSelection: true,
    headerCheckboxSelection: true,
    suppressMenu: true, },
    { headerName: "Nombre", field: "nombre",  },
    {
      headerName: "Opciones",
      cellRenderer: OptionsRenderer,
      checkboxSelection: false,
      filter: false,
      suppressMenu: true,
      width: 150,
    },
    { headerName: "Descripción", field: "descripcion" },
    { headerName: "Clausulas", field: "clausulas" },
    { headerName: "Duración (Meses)", field: "duracionMeses" },
    // Agrega más columnas según sea necesario
  ]);

  // Fetch data & update rowData state
  useEffect(() => {
    if (Array.isArray(tiposContrato)) {
      setRowData(tiposContrato);
    }
  }, [tiposContrato]);
  
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
    <div className="h-full">
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
    </div>
  );
};
const OptionsRenderer = (props) => {
  const { data } = props.node;
  const idTipoContrato = data.idTipoContrato;
  const handleEliminarClick = async () => {
    // Mostrar SweetAlert2 para confirmar la eliminación
    const confirmacion = await Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción no se puede revertir',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar evaluación'
    });

    if (confirmacion.isConfirmed) {
      try {
        const token = localStorage.getItem("token");
        if (!token) {
          // Maneja la situación donde el token no está disponible en localStorage
          return;
        }

        const config = {
          headers: {
            Authorization: `Bearer ${token}`
          }
        };

        const response = await axios.delete(`http://127.0.0.1:8000/api/administrador/tipos-contrato/${idTipoContrato}`, config);
        console.log(`Tipo Contrato con id ${idTipoContrato} eliminado`);

        // Mostrar SweetAlert2 con mensaje de éxito
        Swal.fire(
          '¡Eliminada!',
          'El Tipo de Contrato ha sido eliminada.',
          'success'
        ).then(() => {
          window.location.reload();
        });

        if (response.data && response.data.message) {
          console.log(response.data.message);
        }
      } catch (error) {
        console.error(`Error al eliminar Tipo de COntrato con id ${idTipoContrato}:`, error);
        // Mostrar SweetAlert2 con mensaje de error
        Swal.fire(
          'Error',
          'Hubo un error al intentar eliminar El Tipo de Contrato',
          'error'
        );
      }
    }
  };




  return (
    <div>
      {/* <Tippy placement="left" content="Ver Perfil del empleado">
        <button data-tippy-content="Ver" title="Ver">
          <i className="fas fa-eye mr-2 text-indigo-600"></i>
        </button>
      </Tippy> */}

      <Tippy placement="left" content="Editar Tipo de Contrato">
        <button>
          <i className="fas fa-edit mr-2 text-lime-800"></i>
        </button>
      </Tippy>

      <Tippy placement="left" content="Eliminar Tipo de Contrato">
        <button onClick={handleEliminarClick}>
          <i className="fas fa-trash-alt mr-2 text-red-600"></i>
        </button>
      </Tippy>
    </div>
  );
};

export default TableTipoContrato;
