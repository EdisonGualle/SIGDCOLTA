import React, { useEffect, useState, useMemo } from "react";
import { AgGridReact } from "ag-grid-react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";

const TableAgregarContrato = ({ tiposContrato }) => {
  const [rowData, setRowData] = useState([]);
  const [totalEmpleados, setTotalEmpleados] = useState(0);

  // Column Definitions
  const [colDefs] = useState([
    {
      headerName: "ID", field: "idEmpleado",
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
    },
    { headerName: "Cedula", field: "cedula" },
    { headerName: "Primer Nombre", field: "primerNombre" },
    { headerName: "Segundo Nombre", field: "segundoNombre" },
    { headerName: "Primer Apellido", field: "primerApellido" },
    { headerName: "Segundo Apellido", field: "segundoApellido" },
    { headerName: "Fecha de Nacimiento", field: "fechaNacimiento" },
    { headerName: "Género", field: "genero" },
    { headerName: "Teléfono Personal", field: "telefonoPersonal" },
    { headerName: "Teléfono de Trabajo", field: "telefonoTrabajo" },
    { headerName: "Correo", field: "correo" },
    { headerName: "Etnia", field: "etnia" },
    { headerName: "Estado Civil", field: "estadoCivil" },
    { headerName: "Tipo de Sangre", field: "tipoSangre" },
    { headerName: "Nacionalidad", field: "nacionalidad" },
    { headerName: "ID Provincia", field: "id_provincia" },
    { headerName: "ID Cantón", field: "id_canton" },
    { headerName: "ID Cargo", field: "idCargo" },
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
        />
      </div>
    </div>
  );
};

export default TableAgregarContrato;
